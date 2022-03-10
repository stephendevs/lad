<?php

namespace Stephendevs\Lad\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Routing\Router;

use Stephendevs\Lad\Http\Middleware\Permission\Permission;
use Stephendevs\Lad\Http\Middleware\UserType\UserTypeMiddleware;

use Stephendevs\Lad\Http\Middleware\Admin\IsSuperAdmin;
use Stephendevs\Phoebi\Http\Middleware\Admin\AdminStatus;


//commands
use Stephendevs\Lad\Console\Commands\CreateAdminCommand;
use Stephendevs\Lad\Console\Commands\CacheOption;
use Stephendevs\Lad\Console\Commands\SeedPermissions;
use Stephendevs\Lad\Console\Commands\SetEnv;

class LadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $helpers = glob( __DIR__.'/..'.'/Helpers'.'/*.php');
        foreach($helpers as $key => $helper){
            require_once($helper);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'lad');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'ldashboard');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'phoebi');

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('permission', Permission::class);

        $router->aliasMiddleware('issuperadmin', IsSuperAdmin::class);
        $router->aliasMiddleware('usertype', UserTypeMiddleware::class);
        $router->aliasMiddleware('adminstatus', AdminStatus::class);

        if ($this->app->runningInConsole()) {

            $this->commands([
                CreateAdminCommand::class,
                CacheOption::class,
                SeedPermissions::class,
                SetEnv::class,
            ]);

            //config file
            $this->publishes([
                __DIR__.'/../../config/lad.php' => config_path('lad.php')
            ], 'lad-config');

             //Laravel auth config file
             $this->publishes([
                __DIR__.'/../../config/auth.php' => config_path('auth.php')
            ], 'auth-config');

            //Publish Customizable Views
            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/stephendevs/lad')
            ], 'lad-views');

            // Publish assets
            $this->publishes([
              __DIR__.'/../../resources/assets' => public_path(),
            ], 'lad-assets');

            // Publish User Model
            $this->publishes([
                __DIR__.'/../Models/User.php' => app_path('User.php'),
              ], 'lad-user-model');

            // Publish Laravel Authentication Middleware
            $this->publishes([
                __DIR__.'/../Http/Middleware/RedirectIfAuthenticated.php' => app_path('Http/Middleware/RedirectIfAuthenticated.php'),
              ], 'lad-laravel-redirect-middlewarel');

  
        }
    }
}
