<?php

namespace App\Services;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class SearchService implements ISearchService
{
    public function searchStep1(string $find) : Collection
    {
        return Product::with('brand')->where("code", $find)->get();
    }
}
