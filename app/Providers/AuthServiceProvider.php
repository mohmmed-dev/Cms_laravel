<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Permission;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
        Gate::define('add-post', function(User $user) {
            // return $user->hasAllow('add-post') && (auth()->user() || $user->isAdmin());
            return true;
        });
        Permission::whereIn('name' , ['update-post','delete-post'])->get()->map(function($per) {
            Gate::define($per->name, function(User $user ,Post $post) use ($per) {
            return $user->hasAllow($per->name) && ($user->id == $post->user_id || $user->isAdmin());
            });
        });

        Permission::whereIn('name' , ['update-user','delete-user','add-user'])->get()->map(function($per) {
            Gate::define($per->name, function(User $user) use ($per) {
            return $user->hasAllow($per->name) &&  $user->isAdmin();
            });
        });

        Gate::define('delete-comment', function(User $user,Comment $comment) {
        return $user->hasAllow('delete-comment') || ($user->id == $comment->user_id || $user->isAdmin());
        });
    }
}
