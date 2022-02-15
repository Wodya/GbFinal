<?php

namespace App\Services;

interface ISearchService
{
    public function searchStep1(string $find) : array;
}
