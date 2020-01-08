<?php 
namespace Cstopery\BceCloud;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
class BceCloudServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    public function boot()
    {
        // this for conig
        $this->publishes([
            __DIR__.'/config/BceCloud.php' => config_path('BceCloud.php'),
        ]);
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     * @return void
     */


    public function register()
    {
        $this->app->bind('BceCloud',function($app){
            return new BceCloud();
        });
    }
}
