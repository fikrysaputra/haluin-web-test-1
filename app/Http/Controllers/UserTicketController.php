<?php

namespace App\Http\Controllers;

use App\Models\UserTickets;
use App\Models\Tickets;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class UserTicketController extends Controller
{
    public function __construct()
    {
        // Semua method kecuali guest harus login
        $this->middleware('auth')->except(['showFormGuest', 'storeGuest']);
    }

    /**
     * Dashboard: lihat tiket user
     * Admin diarahkan ke view user saja sementara
     */
    public function myTickets()
    {
        $userTicket = UserTickets::with('ticket.event')  // Pastikan 'ticket' adalah relasi yang benar
            ->where('user_id', Auth::id())
            ->get();

        return view('dashboard', compact('userTicket'));
    }


    /**
     * Tampilkan form checkout untuk user login
     */
    public function showForm(Request $request, $ticketId)
    {
        $ticket = Tickets::with('event')->findOrFail($ticketId);
        $event = $ticket->event;
        $quantity = $request->input('quantity', 1);

        return view('akun.checkout', compact('ticket', 'event', 'quantity'));
    }

    /**
     * Proses pembelian tiket langsung (user login)
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $ticket = \App\Models\Tickets::findOrFail($request->ticket_id);

        // Check the ticket quantity and adjust if necessary
        if ($ticket->quota < $request->quantity) {
            return back()->with('error', 'Quota tiket tidak cukup.');
        }

        // Reduce ticket quota
        $ticket->quota -= $request->quantity;
        $ticket->save();

        // Calculate total price
        $totalPrice = $request->quantity * $ticket->price;

        // Save purchase data in UserTickets
        $userTicket = \App\Models\UserTickets::create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'quantity' => $request->quantity,
            'qr_code' => 'TICKET-' . strtoupper(uniqid() . '-' . time()),
            'status' => 'active',
            'purchased_at' => now(),
            'total_price' => $totalPrice  // Make sure total_price is saved
        ]);

        // Midtrans Configuration
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Set true for production
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data for Midtrans transaction
        $params = [
            'transaction_details' => [
                'order_id' => 'TICKET-' . strtoupper(uniqid()),
                'gross_amount' => $totalPrice,  // Ensure gross_amount is a number (totalPrice)
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        // Create transaction on Midtrans
        try {
            $snapUrl = Snap::createTransaction($params)->redirect_url;
            return redirect($snapUrl);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses transaksi: ' . $e->getMessage());
        }
    }


    /**
     * Callback dari Midtrans untuk verifikasi pembayaran
     */
    public function midtransCallback(Request $request)
    {
        $orderId = $request->order_id;
        $transactionStatus = $request->transaction_status;
        
        // Cari tiket berdasarkan order_id
        $userTicket = UserTickets::where('order_id', $orderId)->first();

        if (!$userTicket) {
            return redirect()->route('user.ticket')->with('error', 'Transaksi tidak ditemukan.');
        }

        // Update status berdasarkan transaksi Midtrans
        if ($transactionStatus == 'settlement') {
            $userTicket->update([
                'status' => 'paid',
            ]);
            return redirect()->route('user.ticket')->with('success', 'Pembelian berhasil!');
        } elseif ($transactionStatus == 'expire') {
            $userTicket->update([
                'status' => 'expired',
            ]);
            return redirect()->route('user.ticket')->with('error', 'Pembayaran gagal, transaksi kedaluwarsa.');
        } else {
            return redirect()->route('user.ticket')->with('error', 'Pembayaran gagal, coba lagi.');
        }
    }

    /**
     * Hapus tiket dibeli (dinonaktifkan sementara)
     */
    public function destroy($id)
    {
        return back()->with('error', 'Tiket yang sudah dibeli tidak bisa dibatalkan.');
    }

    /**
     * Form beli tiket guest
     */
    public function showFormGuest($ticketId)
    {
        $ticket = Tickets::with('event')->findOrFail($ticketId);
        $event = $ticket->event;

        return view('akun.formbelitiketguest', compact('ticket', 'event'));
    }

    /**
     * Proses beli tiket guest
     */
    public function storeGuest(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nohp' => 'required|string|max:20',
            'ticket_id' => 'required|exists:ticket,id',
            'quantity' => 'required|integer|min:1',
            'pembayaran' => 'required|string',
        ]);

        $ticket = Tickets::findOrFail($request->ticket_id);

        if ($ticket->quota < $request->quantity) {
            return back()->with('error', 'Tiket tidak cukup.');
        }

        $ticket->decrement('quota', $request->quantity);

        UserTickets::create([
            'user_id' => null,
            'ticket_id' => $ticket->id,
            'quantity' => $request->quantity,
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'purchased_at' => now(),
            'qr_code' => 'TICKET-' . strtoupper(uniqid() . '-' . time()),
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Tiket berhasil dibeli! QR code akan dikirim ke email dan whatsapp Anda!');
    }

    /**
     * Tampilkan konfirmasi sebelum transaksi
     */
    public function confirm(Request $request, $id)
    {
        // Ambil tiket berdasarkan ID
        $ticket = \App\Models\Tickets::findOrFail($id);
        $event = $ticket->event;

        // Ambil jumlah tiket yang ingin dibeli (default 1 jika tidak ada input)
        $quantity = $request->quantity ?? 1;

        // Kirimkan data ke view dengan compact()
        return view('layanan.eventorganizer.userkonfirmasibeli', compact('ticket', 'event', 'quantity'));
    }


}
