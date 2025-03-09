<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Cart;
use App\Enums\OrderStatuses;
use App\Actions\Orders\Get;
use App\Actions\Orders\Complete;
use App\Actions\Orders\Edit;
use App\Actions\Orders\Delete;



class OrdersController extends Controller
{
    public function completeById(Request $request)
    {
        $completeOrder = new Complete;
        $completeOrder($request);
        return redirect()->route('orderGetShow');
        
    }

    public function orderGetShow()
    {
        $orderItemsGet = new Get();
        $orderItems = $orderItemsGet();

        $statuses = [OrderStatuses::INPROCESS->value,
            OrderStatuses::CANCELLED->value,
            OrderStatuses::ACCEPTED->value];

        return view('orders.list',compact('orderItems','statuses'));
    }

    public function orderItemEdit(Request $request)
    {
        $orderItemEdit = new Edit;
        $orderItem = $orderItemEdit($request);
        
        return redirect()->route('orderGetShow');
    }

    public function orderItemDelete(Request $request)
    {
        $orderItemDelete = new Delete;
        $orderItemDelete($request);
        return redirect()->route('orderGetShow');
    }
}
