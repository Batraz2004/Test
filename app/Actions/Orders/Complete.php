<?php

namespace App\Actions\Orders;
use Illuminate\Http\Request;

use App\Models\Orders;
use App\Models\Goods;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class Complete
{
    public function __invoke(Request $request)
    {
        //товар
        $good = Goods::where('id',$request->goodsId)->first();
        $good->count -= $request->quantity;
        //формление
        $user_id = Auth::id();
        if($good->count > 0 && !empty($request->address))
        {
            $order = new Orders();
            $order->name = $request->name;
            $order->address = $request->address;

            $order->user_id = $user_id;
            $order->comment = $request->comment;
            $order->goods_id = $request->goodsId;
            $order->description = $request->description;
            $order->price = $request->price;
            $order->quantity = $request->quantity;
            $order->total_price = $request->quantity * $request->total_price;
            $order->user_name = Auth::user()->ToArray()['name'];
            $order->save();
            $good->save();
            $cartItem = Cart::where('id',$request->id)->delete();
        }
    }
}