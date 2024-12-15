<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use App\Policies\NewsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // News::class => NewsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this -> registerPolicies();

        Gate::define('update', function(User $user, Comment $comment) {
            return $comment -> user -> is($user); 
        });

        // Gate::define('isAdmin', function(User $user) {
        //     return $user -> role === User::ROLE_ADMIN; 
        // });
    }
}
