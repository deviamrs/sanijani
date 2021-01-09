<?php

namespace App\Providers;

use App\Model\FaqCategory;
use App\Model\Location;
use App\Model\Other;
use App\Model\Page;
use App\Model\PracticeArea;
use App\Model\Service;
use App\Model\Setting;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('inc_front.header' , function ($view) {
          
            $view->with('page_name' , Page::select(['page_name'])->get())->with('services' , Service::select(['service_name' , 'slug'])->where('status' , 1)->get())->with('locations' , Location::select(['location_name' , 'slug'])->where('status' , 1)->get());

        });

        View::composer('inc_front.footer', function ($view) {
          
            $view->with('setting' , Setting::first())->with('pages_name' , Page::all())->with('locations' , Location::select(['location_name' , 'slug'])->where('status' , 1)->get());

        });
    }
}
