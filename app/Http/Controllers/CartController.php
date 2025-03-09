<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Goods;

class CartController extends Controller
{
    public function getListShow()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('active',true)
            ->Where('user_id',$userId)
            ->get()
            ->toArray();

        return view('cart.list',compact('cartItems'));
    }

    public function cartEdit(Request $request)
    {
        $itemId = $request->itemId;

        switch($request->submit)
        {
            case "complete-order":
                // $userId = Auth::id();
                // $good = Goods::find($goodId);

                // $cart = new Cart();
                // $cart->user_id = $userId;
                // $cart->goods_id = $good->id;
                // $cart->name = $good->name;
                // $cart->description = $good->description;
                // $cart->price = $good->price;
                // $cart->quantity += isset($request->quantity) ? $request->quantity : 1;
                // $cart->total_price = $good->price * $cart->quantity;
     
                // $cart->save();
                // return redirect()->route('category');
                break;
            case "detail-id":
                    $good = Goods::find($request->goodsId)->toArray();
                    return view("goods.detail",compact('good'));
                    break;
            case "edit-id":
                return view("goods.createForm",["goodId" => $goodId]);
                break;
            case "delete-id":
                Cart::where('id',$itemId)->delete();
                return redirect()->route('cartListShow');
                break;
            default:
                return redirect()->route('category');
                break;
        }
    }
}
