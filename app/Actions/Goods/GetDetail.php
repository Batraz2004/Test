<?php

namespace App\Actions\Goods;

use App\Models\Cart;
use App\Models\Goods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GetDetail
{
    public function __invoke(Request $request)
    {
        $goodId = $request->goodsId;
        $good = Goods::where('id',$goodId)
                    ->with('category')
                    ->get()
                    ->toArray()[0];
        return($good);
    }
}