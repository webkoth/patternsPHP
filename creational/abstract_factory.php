<?php

interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}

class OutsourceWorkerFactory implements AbstractFactory
{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
}

class NativeWorkerFactory implements AbstractFactory
{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
}

class OutsourceDeveloperWorker extends DeveloperWorker
{
    public function work()
    {
        printf('I am developer on outsource');
    }
}

class OutsourceDesignerWorker extends DesignerWorker
{
    public function work()
    {
        printf('I am designer on outsource');
    }
}

class DeveloperWorker
{
    public function work()
    {
        printf('I am developer');
    }
}

class DesignerWorker
{
    public function work()
    {
        printf('I am designer');
    }
}

class NativeDeveloperWorker extends DeveloperWorker
{
    public function work()
    {
        printf('I am developer on native');
    }
}

class NativeDesignerWorker extends DesignerWorker
{
    const MAX_CHAR_STRING = 5;
    public function work()
    {
        printf('I am designer on native');
    }

    public function isStringLong(string $string): bool
    {
        return mb_strlen($string) > self::MAX_CHAR_STRING;
    }
}

$nativeDesignerWorker = NativeWorkerFactory::makeDesignerWorker();
$outsourceDeveloperWorker = OutsourceWorkerFactory::makeDeveloperWorker();
$nativeDesignerWorker->work();
var_dump(value: $nativeDesignerWorker->isStringLong('string'));
$outsourceDeveloperWorker->work();