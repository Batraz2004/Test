<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Cart;


class OrdersController extends Controller
{
    public function completeById(Request $request)
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
            return redirect()->route('cartGetShow');
        }
        return redirect()->route('cartGetShow');
        
    }
    public function orderGetShow()
    {
        $userId = Auth::id();
        $orderItems = Orders::Where('user_id',$userId)
            ->get()
            ->toArray();

        return view('orders.list',compact('orderItems'));
    }
}
