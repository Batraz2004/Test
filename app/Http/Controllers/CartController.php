<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Goods;

class CartController extends Controller
{
    public function cartGetShow()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('active',true)
            ->Where('user_id',$userId)
            ->get()
            ->toArray();

        return view('cart.list',compact('cartItems'));
    }

    public function addToCart(Request $request)
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
            return redirect()->route('cartGetShow');
        }
        return redirect()->route('category');
    }

    public function cartEdit(Request $request)
    {
        $itemId = $request->itemId;

        switch($request->submit)
        {
            case "detail-id":
                $good = Goods::where('id',$request->goodsId)
                    ->with('category')
                    ->get()
                    ->toArray()[0];

                return view("goods.detail",compact('good'));
                break;
            case "edit-id":
                return view("goods.createForm",["goodId" => $goodId]);
                break;
            case "delete-id":
                Cart::where('id',$itemId)->delete();
                return redirect()->route('cartGetShow');
                break;
            default:
                return redirect()->route('category');
                break;
        }
    }
}
