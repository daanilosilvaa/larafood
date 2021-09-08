<?php

namespace App\Providers;

use App\Models\{
    Category,
    CityState,
    Client,
    Plan,
    Product,
    State,
    Table,
    Tenant
};
use App\Observers\{
    CategoryObserver,
    CityStateObserver,
    ClientObserver,
    PlanObserver,
    ProductObserver,
    StateObserver,
    TableObserver,
    TenantObserve
};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserve::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Client::observe(ClientObserver::class);
        Table::observe(TableObserver::class);
        State::observe(StateObserver::class);
        CityState::observe(CityStateObserver::class);




        /***
         * Custom If Statements
         */

         Blade::if('admin', function(){
            $user = auth()->user();

            return $user->isAdmin();
         });
    }
}
