<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Add this for pagination

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
        // Use Bootstrap 5 for pagination links
        Paginator::useBootstrapFive();

        // Retrieve the latest article name and share it across all views
        $lastPostedArticle = Article::latest()->value('name');

        view()->composer('*', function ($view) use ($lastPostedArticle) {
            $view->with('lastPostedArticle', $lastPostedArticle);
        });
    }
}
