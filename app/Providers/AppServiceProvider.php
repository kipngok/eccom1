<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Banner;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        $categories=Category::all();
        $popupBanner=Banner::where('location','=','Popup Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        View::share('globalCategories', $categories);
        View::share('popupBanner', $popupBanner);
    }
}
