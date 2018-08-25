<?php

namespace App\Http\ViewComposers\Customer;

use Illuminate\View\View;

class CountAgenciesComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $agencies;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->agencies = auth()->user()->profile->flat[0]->agencies;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('agenciescount', $this->agencies->count());
    }
}