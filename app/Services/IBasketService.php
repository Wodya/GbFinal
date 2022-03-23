<?php

namespace App\Services;

interface IBasketService
{
    public function getBasket() : array;
    public function changeQuantity(int $offerId, int $quantity) : int;
    public function deletePosition(int $offerId) : void;
    public function makeOrder(string $orderNumber) : void;
}
