<?php

namespace Xpersonas\Styleguide\Providers;

use Illuminate\Support\ServiceProvider;
use Xpersonas\Styleguide\View\Components\Base;

class StyleguideServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        // TODO: remember what this was about.
        $this->app->make('Xpersonas\Styleguide\Http\Controllers\StyleguideController');

        // Package views.
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'styleguide');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Package routes.
        include __DIR__.'/../../routes/routes.php';

        // Package views.
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'styleguide');

        // Package migrations.
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/');

        $this->loadViewComponentsAs('styleguide', [
            Base::class,
        ]);

        $this->publishes([
            __DIR__.'/../../public/js/styleguide.js' =>
                public_path('js/vendor/xpersonas/styleguide.js'),
            __DIR__.'/../../public/css/styleguide.css' =>
                public_path('css/vendor/xpersonas/styleguide.css'),
            __DIR__.'/../../database/seeds/StyleguideBasicsSeeder.php' =>
                database_path('seeds/StyleguideBasicsSeeder.php'),
            __DIR__.'/../../database/seeds/StyleguidePatternSeeder.php' =>
                database_path('seeds/StyleguidePatternSeeder.php'),
            __DIR__.'/../../database/seeds/StyleguideColorSeeder.php' =>
                database_path('seeds/StyleguideColorSeeder.php'),
            __DIR__.'/../../database/factories/StyleguideBasicsFactory.php' =>
                database_path('factories/StyleguideBasicsFactory.php'),
            __DIR__.'/../../database/factories/StyleguideColorFactory.php' =>
                database_path('factories/StyleguideColorFactory.php'),
            __DIR__.'/../../database/factories/StyleguidePatternFactory.php' =>
                database_path('factories/StyleguidePatternFactory.php'),
        ], 'xpersonas-styleguide');
    }
}
