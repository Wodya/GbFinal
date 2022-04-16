<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\OrderHead;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\DateTime;
use Ramsey\Collection\Collection;

class OrderService implements IOrderService
{
    public function getOrdersInternal($ordersDb) : array {
        $orders = [];
        foreach ($ordersDb as $orderDb) {
            $order = ['id' => $orderDb->id, 'createDate' => $orderDb->create_date, 'stateId' => $orderDb->state_id, 'stateName' => $orderDb->state->name, 'orderNumber' => $orderDb->order_number];
            $spcs = [];
            foreach ($orderDb->orderSpcs as $orderSpcDb) {
                $spc = ['id' => $orderSpcDb->id, 'productId' => $orderSpcDb->product_id, 'supplierId' => $orderSpcDb->supplier_id, 'supplierName' => $orderSpcDb->supplier->name,
                    'code' => $orderSpcDb->product->code, 'name' => $orderSpcDb->product->name,
                    'period' => $orderSpcDb->period_min . "-" . $orderSpcDb->period_max,
                    'isLiquidity' => $orderSpcDb->product->is_liquidity, 'isDealer' => $orderSpcDb->supplier->is_dialer, 'quantity' => $orderSpcDb->quantity,
                    'price' => $orderSpcDb->price];
                $orderStates = [];
                foreach ($orderSpcDb->orderStates as $orderStateDb) {
                    $orderStates[] = ['id' => $orderStateDb->id, 'stateId' => $orderStateDb->state_id, 'stateName' => $orderStateDb->state->name,
                        'quantity' => $orderStateDb->quantity, 'comment' => $orderStateDb->comment];
                }
                $spc['orderStates'] = $orderStates;
                $spcs[] = $spc;
            }
            $order['orderSpcs'] = $spcs;
            $orders[] = $order;
        }
        return $orders;
    }
    public function getMyOrders(): array
    {
      $ordersDb = OrderHead::with('orderSpcs')->with('state')->with('orderSpcs.product')->with('orderSpcs.product.brand')->
      with('orderSpcs.supplier')->with('orderSpcs.state')->with('orderSpcs.orderStates')->with('orderSpcs.orderStates.state')->
      where("user_id", Auth::user()->id)->where('is_finish', false)->orderBy('create_date','desc')->paginate(env('PAGE_ORDERS_PER_PAGE'));

      return ['orderList' => $this->getOrdersInternal($ordersDb), 'ordersDb' => $ordersDb];
    }

    public function getMyAllOrders(DateTime $dateFrom, ?DateTime $dateTo): array
    {
        $ordersDb = OrderHead::with('orderSpcs')->with('state')->with('orderSpcs.product')->with('orderSpcs.product.brand')->
        with('orderSpcs.supplier')->with('orderSpcs.state')->with('orderSpcs.orderStates')->with('orderSpcs.orderStates.state')->
        where("user_id", Auth::user()->id)->whereDate("create_date", '>=', $dateFrom)->whereDate("create_date", '>=', $dateFrom);
        if($dateTo !== null)
            $ordersDb = $ordersDb->whereDate("create_date", '<=', $dateTo);
        $ordersDb = $ordersDb->orderBy('create_date','desc')->paginate(env('PAGE_ORDERS_PER_PAGE'));

        return ['orderList' => $this->getOrdersInternal($ordersDb), 'ordersDb' => $ordersDb];
    }

    public function getOrders(): array
    {
      return [];
    }

    public function getArchiveOrders(DateTime $dateBegin, DateTime $dateTo): array
    {
      return [];
    }

    public function changeOrderState(int $offerId, int $quantity): array
    {
      return [];
    }
}
