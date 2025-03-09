<?php

namespace App\Actions\Orders;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Delete
{
    public function __invoke(Request $request)
    {
        $orderItem = Orders::where('id',$request->id)
            ->delete();
    }
}