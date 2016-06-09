<?php

namespace Lakshmajim\Device\Middleware;


use Lakshmajim\Device\Device;
use Illuminate\Contracts\Events\Dispatcher;
use Lakshmajim\Device\Exception\DeviceException;
use Illuminate\Contracts\Routing\ResponseFactory;


/**
 * Device - BaseMiddleware class   
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 * @package    Device
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
abstract class BaseMiddleware
{

    /**
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $response;

    /**
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    /**
     * @var \Lakshmajim\Device\Device
     */
    protected $device;

    //-------------------------------------------------------------------------


    /**
     * Create a new BaseMiddleware instance.
     *
     * @param \Illuminate\Contracts\Routing\ResponseFactory  $response
     * @param \Illuminate\Contracts\Events\Dispatcher        $events
     * @param \Lakshmajim\Device\Device                      $device
     */
    public function __construct(ResponseFactory $response, Dispatcher $events, Device $device)
    {
        $this->response = $response;
        $this->events   = $events;
        $this->device   = $device;
    }

    //-------------------------------------------------------------------------


    /**
     * Fire event and return the response.
     *
     * @param  string   $event
     * @param  string   $error
     * @param  int      $status
     * @param  array    $payload
     * @return mixed
     */
    protected function respond($event, $error, $status, $payload = [])
    {
        $response = $this->events->fire($event, $payload, true);

        return $response ?: $this->response->json(['status'=>$status,'data' => array('error' => $error)], $status);
    }
    
    //-------------------------------------------------------------------------

}
// end of class BaseMiddleware
// end of file BaseMiddleware.php
