<?php

namespace App\Providers;

use App\profile\Profile_About_Repo_I;
use App\profile\Profile_About_Repo_Impl;
use App\profile\Profile_Basic_Repo_I;
use App\profile\Profile_Basic_Repo_Impl;
use App\profile\Profile_Education_Repo_I;
use App\profile\Profile_Education_Repo_Impl;
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
        $this->app->bind(Profile_Basic_Repo_I::class, Profile_Basic_Repo_Impl::class);
        $this->app->bind(Profile_About_Repo_I::class, Profile_About_Repo_Impl::class);
        $this->app->bind(Profile_Education_Repo_I::class, Profile_Education_Repo_Impl::class);
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
