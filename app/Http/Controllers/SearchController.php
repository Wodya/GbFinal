<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ISearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchStep1(Request $request,  ISearchService $searchService, string $search)
    {
        $products = $searchService->searchStep1($search);
        return view('search_step1',['products' => $products]);
    }
    public function searchStep2(Request $request,  ISearchService $searchService, string $productId)
    {
        $product = $searchService->getProduct($productId);
        $offers = $searchService->searchStep2($productId);
        $user = $searchService->getUser(Auth()->user()->id);
        return view('search_step2',['offers' => $offers, 'product' => $product, 'user' => $user]);
    }
    public function changeQuantity(Request $request,  ISearchService $searchService, string $offerId, int $quantity) : int
    {
        return $searchService->changeQuantity($offerId, $quantity);
    }
}
