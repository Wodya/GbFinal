<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ISearchService
{
    public function searchStep1(string $search) : Collection;
    public function searchStep2(int $productId) : array;
    public function getProduct(int $productId) : Product;
    public function getUser(int $userId) : User;
    public function changeQuantity(int $offerId, int $quantity) : int;
    public function getBasket() : array;
    public function deletePosition(int $offerId) : void;
}
