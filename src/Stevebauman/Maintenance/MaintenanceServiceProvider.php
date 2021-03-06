<?php

namespace Stevebauman\Maintenance;

use Stevebauman\Maintenance\Services\SentryService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class MaintenanceServiceProvider
 */
class MaintenanceServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $config = __DIR__.'../../../config/';

        $this->publishes([
            $config.'colors.php' => config_path('maintenance/colors.php'),
            $config.'notifications.php' => config_path('maintenance/notifications.php'),
            $config.'permissions.php' => config_path('maintenance/permissions.php'),
            $config.'rules.php' => config_path('maintenance/rules.php'),
            $config.'seed.php' => config_path('maintenance/seed.php'),
            $config.'site.php' => config_path('maintenance/site.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'../../../migrations/' => base_path('database/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../views' => base_path('resources/views/stevebauman/maintenance'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../../public' => public_path('assets/stevebauman/maintenance'),
        ], 'assets');

        $this->loadViewsFrom(__DIR__.'/../../views', 'maintenance');

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'maintenance');

        $this->bootRequiredFiles();
    }

    /**
     * Includes the required maintenance files.
     */
    private function bootRequiredFiles()
    {
        include __DIR__.'/../../routes.php';
        include __DIR__.'/../../api.php';
        include __DIR__.'/../../filters.php';
        include __DIR__.'/../../composers.php';
        include __DIR__.'/../../validators.php';
        include __DIR__.'/../../listeners.php';
        include __DIR__.'/../../breadcrumbs.php';
    }

    /**
     * Register the service providers.
     */
    public function register()
    {
        $this->registerServiceProviders();

        $this->registerServiceAliases();

        // Register the exception handler
        $this->app->singleton(
            'Illuminate\Contracts\Debug\ExceptionHandler',
            'Stevebauman\Maintenance\Exceptions\Handler'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['maintenance'];
    }

    /**
     * Registers the service providers that the
     * maintenance application relies on.
     */
    private function registerServiceProviders()
    {
        // HTML
        $this->app->register('Illuminate\Html\HtmlServiceProvider');

        $this->app->register('Stevebauman\EloquentTable\EloquentTableServiceProvider');

        // Breadcrumbs
        $this->app->register('DaveJamesMiller\Breadcrumbs\ServiceProvider');

        // No Captcha
        $this->app->register('Arcanedev\NoCaptcha\Laravel\ServiceProvider');

        // Core Helper
        $this->app->register('Stevebauman\CoreHelper\CoreHelperServiceProvider');

        // Authentication
        $this->app->register('Cartalyst\Sentry\SentryServiceProvider');

        // DataGrid
        $this->app->register('Cartalyst\DataGrid\Laravel\DataGridServiceProvider');

        // LDAP Auth
        $this->app->register('Stevebauman\Corp\CorpServiceProvider');

        // Nested Set Helper
        $this->app->register('Baum\Providers\BaumServiceProvider');

        // QR Code Generator
        $this->app->register('SimpleSoftwareIO\QrCode\QrCodeServiceProvider');

        // Calendar API Helper
        $this->app->register('Stevebauman\CalendarHelper\CalendarHelperServiceProvider');

        // Inventory Provider
        $this->app->register('Stevebauman\Inventory\InventoryServiceProvider');

        // Log Reader / Manager
        $this->app->register('Stevebauman\LogReader\LogReaderServiceProvider');

        // HTML Input Purifier
        $this->app->register('Stevebauman\Purify\PurifyServiceProvider');
    }

    /**
     * Registers the laravel facades for easy access
     * for use in the maintenance application.
     */
    private function registerServiceAliases()
    {
        $loader = AliasLoader::getInstance();

        // HTML Helpers
        $loader->alias('Form', 'Illuminate\Html\FormFacade');
        $loader->alias('HTML', 'Illuminate\Html\HtmlFacade');

        // Authentication
        $loader->alias('Sentry', 'Cartalyst\Sentry\Facades\Laravel\Sentry');

        $loader->alias('DataGrid', 'Cartalyst\DataGrid\Laravel\Facades\DataGrid');

        $loader->alias('QrCode', 'SimpleSoftwareIO\QrCode\Facades\QrCode');
        $loader->alias('Breadcrumbs', 'DaveJamesMiller\Breadcrumbs\Facade');
        $loader->alias('Captcha', 'Arcanedev\NoCaptcha\Laravel\Facade');

        $loader->alias('Corp', 'Stevebauman\Corp\Facades\Corp');
        $loader->alias('CalendarHelper', 'Stevebauman\CalendarHelper\Facades\CalendarHelper');
        $loader->alias('LogReader', 'Stevebauman\LogReader\Facades\LogReader');
        $loader->alias('Purify', 'Stevebauman\Purify\Facades\Purify');
    }
}
