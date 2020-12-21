<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-article', function(User $user, Article $article) {
            if($user->id == $article->user_id || $user->id == 1) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('update-comment', function(User $user, Comment $comment) {
            if($user->id == $comment->article->user_id || $user->id == 1) {
                return true;
            } else {
                return false;
            }
        });
    }
}
