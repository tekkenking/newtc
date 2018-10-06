<?php

namespace App\Libs\Sms;

class SmsLib
{
    protected $driver_object;
    private $_setDriver = null;

    public function setDriver($driver)
    {
        $this->_setDriver = $driver;
        return $this;
    }

    private function _initDriver()
    {
        $driver = ($this->_setDriver) ? $this->_setDriver :  env('SMS_DRIVER');
        $driverClass = "App\\Libs\\Sms\Drivers\\{$driver}";
        $this->driver_object = new $driverClass;
    }

    public function send(Array $paramArr)
    {
        $this->_initDriver();
        return $this->driver_object
            ->boot($paramArr);
    }

}