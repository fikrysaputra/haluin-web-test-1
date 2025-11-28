<?php

namespace App\Http\Controllers;

use App\Models\UserTicketHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTicketHistoryController extends Controller
{
    /**
     * Tampilkan riwayat tiket
     */
    public function index()
    {
        $user = Auth::user();

        // Semua user (termasuk admin sementara) diarahkan ke riwayat sendiri
        $history = UserTicketHistory::with('ticket.event')
                    ->where('user_id', $user->id)
                    ->orderBy('purchased_at', 'desc')
                    ->get();

        return view('user_ticket_history.index', compact('history'));
    }

    /**
     * Detail history, edit, update, destroy admin dihapus sementara
     * supaya tidak memanggil view yang belum ada
     */
}
