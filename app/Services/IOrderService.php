<?php

namespace App\Services;

use Nette\Utils\DateTime;

interface IOrderService
{
    public function getMyOrders() : array;
    public function getMyAllOrders(DateTime $dateFrom, ?DateTime $dateTo) : array;
    public function getOrders() : array;
    public function getAllOrders(DateTime $dateFrom, ?DateTime $dateTo) : array;
    public function changeOrderState(int $orderSpcId, int $quantity, int $oldStateId, int $newStateId);
}
