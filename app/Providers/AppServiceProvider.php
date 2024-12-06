<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\CategoryComposer;
use App\Http\Composers\CommentComposer;
use App\Http\Composers\RoleComposer;
use Illuminate\Support\Facades\Blade;

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
        View::composer(['partials.sidebar','list.categories'], CategoryComposer::class);
        View::composer('list.roles', RoleComposer::class);
        View::composer('partials.sidebar', CommentComposer::class);
        // View::composer('partials.sidebar', CommentComposer::class);

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
        
    }
}
