<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Using class based composers...
        View::composer(
            'customer.layouts.mainnav', 'App\Http\ViewComposers\Customer\CountAgenciesComposer'
        );

        Relation::morphMap([
            'customer'      => 'App\Http\Models\Customer',
            'tc'            => 'App\Http\Models\Tcstaff',
            'agency'        => 'App\Http\Models\Agencystaff',
            'governor'      => 'App\Http\Models\Governor'
        ]);

        Blade::component('components.alert', 'alert');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
}
