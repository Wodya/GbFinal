<?php

namespace App\Http\Controllers;

use App\Services\IBasketService;
use App\Services\ICommonService;
use App\Services\ISearchService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(Request $request,  IBasketService $basketService, ICommonService $commonService)
    {
        $offers = $basketService->getBasket();
        $user = $commonService->getUser(Auth()->user()->id);
        return view('basket',['offers' => $offers, 'user' => $user]);
    }
    public function changeQuantity(Request $request,  IBasketService $basketService, ICommonService $commonService, string $offerId, int $quantity) : int
    {
        return $basketService->changeQuantity($offerId, $quantity);
    }
    public function deletePosition(Request $request,  IBasketService $basketService, string $offerId)
    {
        $basketService->deletePosition($offerId);
    }
    public function makeOrder(Request $request,  IBasketService $basketService, string $orderNumber)
    {
        $basketService->makeOrder($orderNumber);
    }
}
