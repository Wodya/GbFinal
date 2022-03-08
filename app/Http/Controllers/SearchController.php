<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ISearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchStep1(Request $request,  ISearchService $searchService, string $search)
    {
//        $products = [
//          ["brand" => "Брэнд 1", "article" => "Артикул 1" . $search, "name" => "Насос топливный"],
//          ["brand" => "Брэнд 2", "article" => "Артикул 2", "name" => "Насос топливный 234"],
//          ["brand" => "Брэнд 3", "article" => "Артикул 3", "name" => "Насос топливный test"]
//        ];

        $products = $searchService->searchStep1($search);
        return view('search_step1',['products' => $products]);
    }
}
