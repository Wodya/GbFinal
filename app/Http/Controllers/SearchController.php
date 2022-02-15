<?php

namespace App\Http\Controllers;

use App\Services\ISearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request,  ISearchService $searchService, string $find)
    {
        $products = $searchService->searchStep1($find);

        return view('test.index',['plantsList' => $plantList, 'tagsList'=>$tagsList, 'search'=>$search]);
    }
}
