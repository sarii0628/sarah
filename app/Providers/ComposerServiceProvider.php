<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

use App\Category;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('components.sidebar', function($view)
        {
            $view->categories = Category::all();
        });
    }
}
