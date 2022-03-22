<?php

namespace App\Http\Controllers;

use App\Services\ISearchService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(Request $request,  ISearchService $searchService)
    {
        $offers = $searchService->getBasket();
        $user = $searchService->getUser(Auth()->user()->id);
        return view('basket',['offers' => $offers, 'user' => $user]);
    }
    public function changeQuantity(Request $request,  ISearchService $searchService, string $offerId, int $quantity) : int
    {
        return $searchService->changeQuantity($offerId, $quantity);
    }
    public function deletePosition(Request $request,  ISearchService $searchService, string $offerId)
    {
        $searchService->deletePosition($offerId);
    }
}
