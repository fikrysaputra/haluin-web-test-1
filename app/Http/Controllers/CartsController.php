<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cartItems = Cart::with('ticket.event')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, $ticketId) {
        $ticket = Ticket::findOrFail($ticketId);
        $quantity = $request->input('quantity', 1);

        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'ticket_id' => $ticketId],
            ['quantity' => $quantity]
        );

        return redirect()->back()->with('success', 'Tiket ditambahkan ke keranjang');
    }

    public function remove($id) {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Tiket dihapus dari keranjang');
    }
}
