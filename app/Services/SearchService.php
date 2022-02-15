<?php

namespace App\Services;

use App\Models\Offer;
use App\Models\Product;

class SearchService implements ISearchService
{
    public function searchStep1(string $find): array
    {
        return Product::with('brand')->where("code", $find)->get();
    }
}
