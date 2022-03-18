<?php

namespace App\Providers;


use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;

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
        //
        Model::preventLazyLoading(!app()->isProduction());
        Relation::enforceMorphMap([
            'user' => User::class,
            'ticket' => Ticket::class,
        ]);
        // https://adevait.com/laravel/laravel-overwriting-default-pagination-system
        // https://www.codecheef.org/article/laravel-7-custom-pagination-example-tutorial
        Paginator::defaultView('vendor.pagination.custom');
    }
}
