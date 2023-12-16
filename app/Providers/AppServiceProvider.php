<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

use App\View\Components\Alert;

use Illuminate\Support\Facades\View;

use App\Models\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('package-alert', Alert::class); 
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        View::share('instruct',  $instruct);
    }
}
