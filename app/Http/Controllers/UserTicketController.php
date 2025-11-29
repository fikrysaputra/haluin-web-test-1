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
        $userTicket = UserTickets::with('ticket.event') 
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
     * Proses pembelian tiket langsung oleh user yang sudah login
     * 
     * Langkah-langkah utama:
     * 1. Validasi input user
     * 2. Cek ketersediaan kuota tiket
     * 3. Update kuota tiket di database
     * 4. Simpan data pembelian tiket ke tabel user_tickets
     * 5. Konfigurasi Midtrans untuk transaksi online
     * 6. Buat transaksi ke Midtrans dan redirect ke halaman pembayaran
     * 7. Tangani error bila transaksi gagal
     */

    public function store(Request $request)
    {
        // === (1) VALIDASI INPUT ===
        // Pastikan pengguna mengirimkan ID tiket yang valid dan jumlah tiket minimal 1
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',   // tiket harus ada di tabel tickets
            'quantity' => 'required|integer|min:1'         // jumlah minimal 1 tiket
        ]);

        // === (2) CEK KETERSEDIAAN KUOTA TIKET ===
        // Ambil data tiket berdasarkan ID
        $ticket = \App\Models\Tickets::findOrFail($request->ticket_id);

        // Jika kuota tiket tidak cukup, batalkan pembelian
        if ($ticket->quota < $request->quantity) {
            return back()->with('error', 'Quota tiket tidak cukup.');
        }

        // === (3) UPDATE KUOTA TIKET ===
        // Kurangi jumlah kuota sesuai tiket yang dibeli
        $ticket->quota -= $request->quantity;
        $ticket->save(); // simpan perubahan ke database

        // === (4) HITUNG TOTAL HARGA ===
        // Total = jumlah tiket × harga per tiket
        $totalPrice = $request->quantity * $ticket->price;

        // === (5) SIMPAN DATA PEMBELIAN KE DATABASE ===
        // Simpan detail pembelian ke tabel user_tickets
        $userTicket = \App\Models\UserTickets::create([
            'user_id' => auth()->id(),                            // ID user yang login
            'ticket_id' => $ticket->id,                           // ID tiket yang dibeli
            'quantity' => $request->quantity,                     // jumlah tiket
            'qr_code' => 'TICKET-' . strtoupper(uniqid() . '-' . time()), // kode unik QR
            'status' => 'active',                                 // status default "active"
            'purchased_at' => now(),                              // waktu pembelian
            'total_price' => $totalPrice                          // total harga
        ]);

        // === (6) KONFIGURASI MIDTRANS ===
        // Ambil kunci server Midtrans dari file .env
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        
        // Gunakan mode sandbox (false = testing, true = produksi)
        Config::$isProduction = false;
        
        // Sanitasi data transaksi untuk keamanan
        Config::$isSanitized = true;
        
        // Aktifkan keamanan 3DS untuk kartu kredit
        Config::$is3ds = true;

        // === (7) SIAPKAN DATA TRANSAKSI UNTUK MIDTRANS ===
        $params = [
            'transaction_details' => [
                'order_id' => 'TICKET-' . strtoupper(uniqid()), // ID unik untuk setiap transaksi
                'gross_amount' => $totalPrice,                  // total harga transaksi
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,           // nama pembeli
                'email' => auth()->user()->email,               // email pembeli
            ]
        ];

        // === (8) KIRIM TRANSAKSI KE MIDTRANS ===
        try {
            // Buat transaksi Snap dan dapatkan URL pembayaran
            $snapUrl = Snap::createTransaction($params)->redirect_url;

            // Redirect user ke halaman pembayaran Midtrans
            return redirect($snapUrl);
        } 
        catch (\Exception $e) {
            // === (9) TANGANI ERROR ===
            // Jika terjadi kesalahan (misal koneksi gagal atau key salah),
            // tampilkan pesan error ke user
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
