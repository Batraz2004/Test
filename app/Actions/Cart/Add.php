<?php

namespace App\Actions\Cart;

use App\Models\Goods;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Add
{
    public function __invoke(Request $request)
    {
        $userId = Auth::id();
        $good = Goods::find($request->goodsId);
        
        if(!is_null($good) && count($good->toArray())>0)
        {
            $cart = Cart::where('goods_Id',$good->id)
                        ->where('user_Id',$userId)->first();//проверим может добавляли ли мы раньше товаров с тем же id

            if(empty($cart))
                $cart = new Cart;

            $cart->user_id = $userId;
            $cart->goods_id = $good->id;
            $cart->name = $good->name;
            $cart->description = $good->description;
            $cart->price = $good->price;
            $cart->quantity += isset($request->quantity) ? $request->quantity > 0 ? $request->quantity : 1 : 1;
            $cart->total_price = $good->price * $cart->quantity;
            $cart->save();
        }
    }
}