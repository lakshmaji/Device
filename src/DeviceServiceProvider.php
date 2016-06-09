<?php 

namespace Lakshmajim\Device;

use Illuminate\Support\ServiceProvider;
use Lakshmajim\Device\Middleware\DeviceMiddleware;


/**
 * The Device Controller
 *
 * Device - ServicePrivider to support integration with 
 * Laravel framework , which Define Middlewares and reg
 * -isters app
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 * @package    Device
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class DeviceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {        
        $this->app['router']->middleware('jwt.d', DeviceMiddleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['device'] = $this->app->share(function($app) {
            return new Device;
        });
    }
}
// end of DeviceServiceProvider class
// end of file DeviceServiceProvider 

