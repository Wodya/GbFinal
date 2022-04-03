<?php

namespace App\Services;

use Nette\Utils\DateTime;

interface IOrderService
{
    public function getMyOrders() : array;
    public function getMyArchiveOrders(DateTime $dateBegin, DateTime $dateTo) : array;
    public function getOrders() : array;
    public function getArchiveOrders(DateTime $dateBegin, DateTime $dateTo) : array;
    public function changeOrderState(int $offerId, int $quantity) : array;
}
