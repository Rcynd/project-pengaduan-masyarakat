<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->level === 'admin';
        });
        Gate::define('masyarakat', function(User $user){
            return $user->level === 'masyarakat';
        });
        Gate::define('petugas', function(User $user){
            if(auth()->user()->level === 'petugas' || auth()->user()->level === 'admin'){
                return true;
            }
            return false;
        });
    }
    
}
