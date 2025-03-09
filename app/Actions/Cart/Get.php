<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Get
{
    public function __invoke()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('active',true)
            ->Where('user_id',$userId)
            ->get()
            ->toArray();
        return $cartItems;
    }
}