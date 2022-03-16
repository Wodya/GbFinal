<?php

namespace App\Services;

use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
            $offer = ['productId' => $offerDb->product_id, 'supplierId' => $offerDb->supplier_id, 'code' => $offerDb->code,
                'period' => $offerDb->period_min ."-" . $offerDb->period_max, 'successPercent' => $offerDb->supplier->success_percent,
                'isLiquidity' => $offerDb->product->is_liquidity, 'isDealer' => $offerDb->supplier->is_dialer, 'quantity' => $offerDb->quantity, 'price' => $offerDb->price] ;
            $offer['name'] = $offerDb->name !== '' ? $offerDb->name : $offerDb->product->name;
            $offers[] = $offer;
        }
        return $offers;
    }

    public function getProduct(int $productId): Product
    {
        return Product::where("id", $productId)->with("brand")->first();
    }
    public function getUser(int $userId): User
    {
        return User::where("id", $userId)->with("distributionPoint")->with("transportCompany")->first();
    }
}
