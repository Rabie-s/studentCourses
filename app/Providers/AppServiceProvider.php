<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
        Inertia::share([
            'categories'=>function(){
                return Category::select('id','title')->get();
            }
        ]);
    }
}
