<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Galery;
use App\Models\Project;
use App\Observers\CategoryObserver;
use App\Observers\GaleryObserver;
use App\Observers\ProjectObserver;
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
        Galery::observe(GaleryObserver::class);
        Category::observe(CategoryObserver::class);
        Project::observe(ProjectObserver::class);
    }
}
