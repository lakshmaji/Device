<?php

/*
|--------------------------------------------------------------------------
| Device class for implementing simple security feature with laravel 
|--------------------------------------------------------------------------
|
*/

namespace Lakshmajim\Device;

use Mobile_Detect;
use Lakshmajim\Device\Exception\DeviceException;



/**
 * Device - A Device package for Detecteing browser Type  
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 * @package    Device
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class Device
{

    /**
     * This method gets the browser details from Device User 
     * Agent and process it with the "restricted_ua", so that 
     * it ensures that whether the further requests are allo
     * -wed or not.
     *
     * Here in "restricted_ua" we are required to define the
     * Layout engine names [browser] 
     *
     * 
     * @access public
     * @since  Method available since Release 1.0.0
     * @param  
     * @author lakshmajim <lakshmajee88@gmail.com>
     * @return mixed 
     */
    public function isAccessible()
    {
        try
        {
            $agent= $_SERVER['HTTP_USER_AGENT'];

            $is_android = false;
            $is_ipad    = false;
            $is_iphone  = false;
            $is_ipod    = false;


            // check regarding desktop browsers 
            

            if(preg_match('/Android/i', $agent))
            {
                if(preg_match('/Dalvik/i', $agent))
                {
                    // allow 
                    echo "aloowed Hooray..";    
                }
                else
                {
                    $restricted_ua = array('IE','KHTML','WebKit','Gecko','Trident','Firefox','Chrome');
                    $this->processUaList($restricted_ua, $agent);
                }
            }
            if(preg_match('/iPhone/i', $agent))
            {
                if(preg_match('/Dalvik/i', $agent))
                {
                    // allow 
                    echo "aloowed Hooray..";    
                }
                else
                {
                    $restricted_ua = array('IE','KHTML','WebKit','Gecko','Trident','Firefox','Chrome');
                    $this->processUaList($restricted_ua, $agent);
                }
            }
            if(preg_match('/iPad/i', $agent))
            {
                if(preg_match('/Dalvik/i', $agent))
                {
                    // allow 
                    echo "aloowed Hooray..";    
                }
                else
                {
                    $restricted_ua = array('IE','KHTML','WebKit','Gecko','Trident','Firefox','Chrome');
                    $this->processUaList($restricted_ua, $agent);
                }
            }
            if(preg_match('/iPod/i', $agent))
            {
                if(preg_match('/Dalvik/i', $agent))
                {
                    // allow 
                    echo "aloowed Hooray..";    
                }
                else
                {
                    $restricted_ua = array('IE','KHTML','WebKit','Gecko','Trident','Firefox','Chrome');
                    $this->processUaList($restricted_ua, $agent);
                }
            }


            if($is_android||$is_iphone||$is_ipad||$is_ipod)
            {
                $is_mobile = true;
            }
            else
            {
                $is_mobile = false;
            }

            if(! $is_mobile)
            {
                // restricted desktop or laptop browsers and HTTP requesters
                $restricted_desktop_browsers = array('IE','KHTML','WebKit','Gecko','Firefox','Trident','Chrome');
                $this->processUaList($restricted_desktop_browsers, $agent);
            }
        }
        catch(Exception $DeviceException)
        {
            // error processing request
            throw new DeviceException('Failed to validate request', 500);            
        }
    }


    public function processUaList($restricted_ua, $agent)
    {
        foreach ($restricted_ua as $value) 
        {
            $temp_str = '/'.$value.'/';

            if (preg_match($temp_str, $agent)) 
            {
                // echo $value;
                $browser = $value;
            }
        }

        $browser = (isset($browser))?$browser:"not detected";

        if(in_array($browser, $restricted_ua))
        {
            throw new DeviceException('This application is not a valid client application', 404);            
        }
        else
        {
            echo "aloowed Hooray..";
        }                    

    }

    //-------------------------------------------------------------------------

}
// //end of Device class
// // end of file Device.php