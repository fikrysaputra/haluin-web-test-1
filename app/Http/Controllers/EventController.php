<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Tampilkan semua event
     * - User biasa & Admin: lihat saja
     */
    public function index()
    {
        $events = Event::with('artists')->get();
        return view('layanan.eventorganizer.eventorganizer', compact('events'));
    }

    /**
     * Tampilkan detail satu event
     */
    public function show($id)
    {
        $events = Event::with(['artists', 'tickets'])->findOrFail($id);
        return view('layanan.eventorganizer.detailevent', compact('events'));
    }

    /**
     * Halaman welcome (guest atau user biasa)
     */
    public function welcome() 
    {
        $events = Event::with('artists')->get();
        return view('welcome', compact('events'));
    }

    /**
     * Fungsi create / store / edit / update / destroy admin
     * Dihapus sementara, belum ada blade admin
     */
}
