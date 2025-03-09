<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getListShow()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('active',true)
            ->Where('user_id',$userId)
            ->get()
            ->toArray();

        return view('cart.list',compact('cartItems'));
    }
}
