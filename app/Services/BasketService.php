<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\OrderHead;
use App\Models\OrderSpc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class BasketService implements IBasketService
{
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
    public function deletePosition(int $offerId) : void
    {
        $basket = Basket::where("user_id", Auth::user()->id)->where("offer_id", $offerId)->first();
        $basket?->delete();
    }
    public function makeOrder(string $orderNumber): void
    {
        try {
            DB::beginTransaction();
            $order = new OrderHead();
            $order->user_id = Auth::user()->id;
            $order->create_date = DB::raw('NOW()');
            $order->state_id = 10;
            $order->order_number = $orderNumber;
            $order->is_finish = false;

            $order->save();
            $basketsDb = Basket::with('offer')->where("user_id", Auth::user()->id)->get();
            foreach($basketsDb as $basketDb){
                OrderSpc::insert(['order_head_id' => $order->id, 'product_id' => $basketDb->offer->product_id, 'supplier_id' => $basketDb->offer->supplier_id,
                    'period_min' => $basketDb->offer->period_min, 'period_max' => $basketDb->offer->period_max,
                    'price' => $basketDb->offer->price, 'quantity' => $basketDb->quantity]);
                $basketDb->delete();
            }
            DB::commit();
        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
        }
    }
}
