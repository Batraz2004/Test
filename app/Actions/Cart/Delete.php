<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Delete
{
    public function __invoke($itemId)
    {
        Cart::where('id',$itemId)->delete();
    }
}