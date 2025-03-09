<?php

namespace App\Actions\Cart;

use App\Models\Goods;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GetDetail
{
    public function __invoke(Request $request)
    {
        $good = Goods::where('id',$request->goodsId)
                    ->with('category')
                    ->get()
                    ->toArray()[0];
                    
        return $good;
    }
}