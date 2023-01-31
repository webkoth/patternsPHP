<?php

abstract class Registry
{
    private static array $services = [];

    final public static function setService($key, Service $service)
    {
        self::$services[$key] = $service;
    }

    final public static function getService($key): string|Service
    {
        if (isset(self::$services[$key])) {
            return self::$services[$key];
        }

        return 'This service doesnt exists';
    }
}

class Service
{

}

$service = new Service();
$service2 = new Service();
$service3 = new Service();

Registry::setService(1, $service);
Registry::setService(5, $service2);
Registry::setService(10, $service3);

$service = Registry::getService(1);
$service2 = Registry::getService(111);
$service3 = Registry::getService(10);

var_dump($service, $service3, $service2);