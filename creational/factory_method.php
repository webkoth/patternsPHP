<?php

interface Worker
{
    public function work();
}

class Developer implements Worker
{
    public function work()
    {
        printf('I am Developer');
    }
}

class Designer implements Worker
{
    public function work()
    {
        printf('I am Designer');
    }
}

interface WorkerFactory
{
    public static function make();
}

class DeveloperFactory implements WorkerFactory
{
    public static function make(): Developer
    {
        return new Developer();
    }
}

class DesignerFactory implements WorkerFactory
{
    public static function make(): Designer
    {
        return new Designer();
    }
}

$developer = DesignerFactory::make();
$designer = DeveloperFactory::make();
$designer->work();
$developer->work();