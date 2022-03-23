<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\IBasketService;
use App\Services\ICommonService;
use App\Services\ISearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchStep1(Request $request,  ISearchService $searchService, string $search)
    {
        $products = $searchService->searchStep1($search);
        return view('search_step1',['products' => $products]);
    }
    public function searchStep2(Request $request,  ISearchService $searchService, ICommonService $commonService, string $productId)
    {
        $product = $searchService->getProduct($productId);
        $offers = $searchService->searchStep2($productId);
        $user = $commonService->getUser(Auth()->user()->id);
        return view('search_step2',['offers' => $offers, 'product' => $product, 'user' => $user]);
    }
    public function changeQuantity(Request $request,  IBasketService $basketService, string $offerId, int $quantity) : int
    {
        return $basketService->changeQuantity($offerId, $quantity);
    }
}
