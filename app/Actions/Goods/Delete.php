<?php

namespace App\Actions\Goods;

use App\Models\Cart;
use App\Models\Goods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Delete
{
    public function __invoke($goodId)
    {
        $good = Goods::where('id',$goodId)
                    ->delete();
    }
}