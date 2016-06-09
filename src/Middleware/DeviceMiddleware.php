<?php

namespace Lakshmajim\Device\Middleware;


use Lakshmajim\Device\Device;
use Lakshmajim\Device\Exception\DeviceException;


/**
 * Device - DeviceMiddleware class   
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 * @package    Device
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class DeviceMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        try
        {
            $device_object = new Device;
            $device_object->isAccessible(); 
        }
        catch(DeviceException $de)
        {
            return $this->respond('jwt.d', $de->getMessage(), $de->getStatusCode(), [$de]);
        }

        return $next($request);
    }
}
// end of class DeviceMiddleware
// end of file DeviceMiddleware.php