<?php

interface Worker
{
    public function countSalary();
}

abstract class WorkerDecorator implements Worker
{
    public Worker $worker;

    /**
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }


}

class Developer implements Worker
{
    public function  countSalary()
    {
        return 20 * 30;
    }
}

class DeveloperOverTime extends WorkerDecorator
{
    public function countSalary()
    {
        return $this->worker->countSalary() * 1.5;
    }
}
$developer = new Developer();
$overTime = new DeveloperOverTime($developer);
var_dump($overTime->countSalary());