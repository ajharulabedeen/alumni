<?php

namespace App\Providers;

use App\profile\ProfileBasic_Repo_I;
use App\profile\ProfileBasic_Repo_Impl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProfileBasic_Repo_I::class, ProfileBasic_Repo_Impl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
