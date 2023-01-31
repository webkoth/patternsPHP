<?php

interface Worker
{
    public function work();
}

class Developer implements Worker
{
    public function work()
    {
        printf('I am developer');
    }
}

class Designer implements Worker
{
    public function work()
    {
        printf('I am designer');
    }
}

class WorkerFactory
{
    /**
     * @throws ErrorException
     */
    public static function make($workerClassName)
    {
        $className = strtoupper($workerClassName);
        var_dump($className);
        if (!class_exists($className)) {
            throw new ErrorException('Class not found');
        }

        return new $className;

    }
}

try {
    $developer = WorkerFactory::make('developer');
    $designer = WorkerFactory::make('designe');
    $developer->work();
    $designer->work();
} catch (ErrorException $e) {
    echo $e->getMessage();
}
