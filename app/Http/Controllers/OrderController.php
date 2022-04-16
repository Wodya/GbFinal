<?php

namespace App\Http\Controllers;

use App\Services\IBasketService;
use App\Services\ICommonService;
use App\Services\IOrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class OrderController extends Controller
{
    public function myOrders(Request $request,  IOrderService $orderService, ICommonService $commonService) : View
    {
        $orders = $orderService->getMyOrders();
        $user = $commonService->getUser(Auth()->user()->id);
        return view('orders',['orderList' => $orders['orderList'], 'ordersDb' => $orders['ordersDb'], 'user' => $user, 'modeId' => 1, 'dateFrom' => null, 'dateTo' => null]);
    }
    public function myAllOrders(Request $request,  IOrderService $orderService, ICommonService $commonService, ?string $dateFrom = null, ?string $dateTo = null) : View
    {
        if($dateFrom === null){
            $date = new DateTime();
            $date->modify("-1 month");

            $dateFrom = $date->format('d.m.Y');
        }

        $orders = $orderService->getMyAllOrders(DateTime::createFromFormat('d.m.Y',$dateFrom) , $dateTo!==null ? DateTime::createFromFormat('d.m.Y',$dateTo) : null);
        $user = $commonService->getUser(Auth()->user()->id);
        return view('orders',['orderList' => $orders['orderList'], 'ordersDb' => $orders['ordersDb'], 'user' => $user, 'modeId' => 2, 'dateFrom' => $dateFrom, 'dateTo' => $dateTo!==null ? $dateTo : null ]);
    }
}
