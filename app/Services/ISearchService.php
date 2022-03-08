<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface ISearchService
{
    public function searchStep1(string $find) : Collection;
}
