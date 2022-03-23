<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class SearchService implements ISearchService
{
    public function searchStep1(string $search) : Collection
    {
        return Product::with('brand')->where("code", $search)->get();
    }
    public function searchStep2(int $productId) : array
    {
        $offersDb = Offer::with('supplier')->with('product')->with('product.brand')->where("product_id", $productId)->get();
        $offers = [];
        foreach ($offersDb as $offerDb) {
            $offer = ['offerId' => $offerDb->id, 'productId' => $offerDb->product_id, 'supplierId' => $offerDb->supplier_id, 'code' => $offerDb->product->code,
                'period' => $offerDb->period_min ."-" . $offerDb->period_max, 'successPercent' => $offerDb->supplier->success_percent,
                'isLiquidity' => $offerDb->product->is_liquidity, 'isDealer' => $offerDb->supplier->is_dialer, 'quantity' => $offerDb->quantity, 'price' => $offerDb->price] ;
            $offer['name'] = $offerDb->product->brand->name . ' ' . (($offerDb->name??'') !== '' ? $offerDb->name : $offerDb->product->name);

            $basket = Basket::where("user_id", Auth::user()->id)->where("offer_id", $offerDb->id)->first();
            $offer['basket_quantity'] = $basket ? $basket->quantity : 0;

            $offers[] = $offer;
        }
        return $offers;
    }

    public function getProduct(int $productId): Product
    {
        return Product::where("id", $productId)->with("brand")->first();
    }
}
