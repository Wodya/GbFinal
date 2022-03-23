<?php

namespace App\Providers;

use App\Services\BasketService;
use App\Services\CommonService;
use App\Services\IBasketService;
use App\Services\ICommonService;
use App\Services\ISearchService;
use App\Services\SearchService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( ICommonService::class,function (){
            return new CommonService();
        });
        $this->app->bind( IBasketService::class,function (){
            return new BasketService();
        });
        $this->app->bind( ISearchService::class,function (){
            return new SearchService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
