<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_permission', function($user) {
            return $user->hasPermission('admin_permission');
        });

        Gate::define('add_user', function($user) {
            return $user->hasPermission('add_user');
        });
        Gate::define('edit_user', function($user) {
            return $user->hasPermission('edit_user');
        });
        Gate::define('delete_user', function($user) {
            return $user->hasPermission('delete_user');
        });
        Gate::define('add_post', function($user) {
            return $user->hasPermission('add_post');
        });
        Gate::define('edit_post', function($user) {
            return $user->hasPermission('edit_post');
        });
        Gate::define('delete_post', function($user) {
            return $user->hasPermission('delete_post');
        });
        Gate::define('add_comment', function($user) {
            return $user->hasPermission('add_comment');
        });
        Gate::define('delete_comment', function($user) {
            return $user->hasPermission('delete_comment');
        });
    }
}
