<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Goods;
use App\Actions\Cart\Add;
use App\Actions\Cart\Get;
use App\Actions\Cart\GetDetail;
use App\Actions\Cart\Delete;



class CartController extends Controller
{
    public function cartGetShow()
    {
        $cartItems = new Get;
        $cartItems = $cartItems();
        return view('cart.list',compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $goodAdd = new Add;
        $goodAdd($request);
        return redirect()->route('cartGetShow');
    }

    public function cartEdit(Request $request)
    {
        $itemId = $request->id;
        
        switch($request->submit)
        {
            case "detail-id":
                $goodDetail = new GetDetail();
                $good = $goodDetail($request);
                return view("goods.detail",compact('good'));
                break;
            case "edit-id":
                return view("goods.createForm",["goodId" => $goodId]);
                break;
            case "delete-id":
                $del = new Delete;
                $del($itemId);
                return redirect()->route('cartGetShow');
                break;
            default:
                return redirect()->route('category');
                break;
        }
    }
}
