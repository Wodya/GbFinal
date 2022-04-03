<?php

namespace App\Http\Controllers;

use App\Services\IBasketService;
use App\Services\ICommonService;
use App\Services\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function myOrders(Request $request,  IOrderService $orderService, ICommonService $commonService)
    {
        $orderList = $orderService->getMyOrders();
        $user = $commonService->getUser(Auth()->user()->id);
        return view('orders',['orderList' => $orderList, 'user' => $user, 'modeId' => 1]);
    }
}
