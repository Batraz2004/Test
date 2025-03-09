<?php

namespace App\Actions\Orders;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class Get
{
    public function __invoke()
    {
        $userId = Auth::id();
        $orderItems = Orders::Where('user_id',$userId)
            ->get()
            ->toArray();
        return $orderItems;
    }
}