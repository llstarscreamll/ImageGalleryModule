<?php

namespace llstarscreamll\ImageGalleryModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ImageGalleryModuleServiceProvider extends ServiceProvider
{
    /**
     * Service Providers Array
     * @var array
     */
    protected $providers = [
        'Intervention\Image\ImageServiceProvider'
    ];

    /**
     * Aliases array
     * @var array
     */
    protected $aliases = [
        'Image' => 'Intervention\Image\Facades\Image'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // carga las vistas
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ImageGalleryModule');

        // publica las vistas
        $this->publishes([__DIR__.'/resources/views' => base_path('/resources/views/vendor/ImageGalleryModule')], 'views');

        // publica las migraciones
        $this->publishes([__DIR__.'/database/migrations' => database_path('/migrations')], 'migrations');

        // publica los seeders
        $this->publishes([__DIR__.'/database/seeds' => database_path('/seeds')], 'seeds');

        // publica los archivos de configuración
        $this->publishes([__DIR__.'/config' => config_path('')], 'config');
        
        // publica los assets
         $this->publishes([
            __DIR__.'/public/resources' => base_path('/public/resources/ImageGalleryModule/')
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (! $this->app->routesAreCached()) {
            include __DIR__.'/app/Http/routes.php';
        }

        $this->app->make('llstarscreamll\ImageGalleryModule\app\Http\Controllers\ImageGalleryController');

        $this->registerServiceProviders();
        $this->registerAliases();
        $this->registerMiddleware();
    }

    /**
     * Registra los middleware
     * @return void
     */
    private function registerMiddleware()
    {
    }

    /**
     * Registra los Service Providers
     * @return void
     */
    private function registerServiceProviders()
    {
        foreach ($this->providers as $provider)
        {
            $this->app->register($provider);
        }
    }

    /**
     * Registra los Aliases
     * @return void
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
}
