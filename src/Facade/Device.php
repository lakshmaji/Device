<?php namespace Lakshmajim\Device\Facade;
 
use Illuminate\Support\Facades\Facade;
 
/**
 * Device - Facade to support integration with Laravel framework 
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 * @package    Device
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */ 
class Device extends Facade {
 
    protected static function getFacadeAccessor() { return 'device'; }
 
}
// end of class Device
// end of file Device.php