<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('export-product', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });

        //Mendefinisikan hak akses bernama 'manage-category'
        Gate::define('manage-category', function (User $user) {
            return $user->role === 'admin'; 
        });
    }
}
