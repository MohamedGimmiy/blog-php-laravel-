<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.sidebar', function($view)
        {
            $categories = Category::with('posts')->orderBy('title', 'asc')->get();
            return $view->with('categories',$categories);
        });
    }
}
