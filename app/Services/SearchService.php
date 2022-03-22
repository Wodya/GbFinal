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
    public function getUser(int $userId): User
    {
        return User::where("id", $userId)->with("distributionPoint")->with("transportCompany")->first();
    }

    public function changeQuantity(int $offerId, int $quantity): int
    {
        $basket = Basket::where("user_id", Auth::user()->id)->where("offer_id", $offerId)->first();
        if($basket === null) {
            if($quantity === 0)
                return 0;
            $basket = ['user_id' => Auth::user()->id, 'offer_id' => $offerId, 'quantity' => $quantity];
            Basket::insert($basket);
            return $quantity;
        } else {
            $basket->quantity += $quantity;
            if ($basket->quantity <= 0)
                $basket->delete();
            else
                $basket->save();
        }
        return $basket->quantity;
    }
    public function getBasket(): array
    {
        $basketsDb = Basket::with('offer')->with('offer.product')->with('offer.product.brand')->where("user_id", Auth::user()->id)->get();
        $offers = [];
        foreach ($basketsDb as $basketDb) {
            $offer = ['offerId' => $basketDb->offer->id, 'productId' => $basketDb->offer->product_id, 'supplierId' => $basketDb->offer->supplier_id, 'code' => $basketDb->offer->product->code,
                'period' => $basketDb->offer->period_min ."-" . $basketDb->offer->period_max, 'successPercent' => $basketDb->offer->supplier->success_percent,
                'isLiquidity' => $basketDb->offer->product->is_liquidity, 'isDealer' => $basketDb->offer->supplier->is_dialer, 'quantity' => $basketDb->offer->quantity,
                'price' => $basketDb->offer->price, 'basket_quantity' => $basketDb->quantity] ;
            $offer['name'] = $basketDb->offer->product->brand->name . ' ' . (($basketDb->offer->name??'') !== '' ? $basketDb->offer->name : $basketDb->offer->product->name);
            $offers[] = $offer;
        }
        return $offers;
    }
    public function deletePosition(int $offerId) : void
    {
        $basket = Basket::where("user_id", Auth::user()->id)->where("offer_id", $offerId)->first();
        $basket?->delete();
    }
}
