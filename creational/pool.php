<?php

class WorkerPoll
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

    public function getWorker()
    {
        if (!count($this->freeWorkers)) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    public function release(Worker $worker): void
    {
        $key = spl_object_hash($worker);

        if (isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }
}

class Worker
{
    public function work()
    {
        printf('I am working');
    }
}

$pool = new WorkerPoll();

$worker = $pool->getWorker();
$worker->work();
$worker1 = $pool->getWorker();
$worker2 = $pool->getWorker();
$worker3 = $pool->getWorker();
$worker4 = $pool->getWorker();
$worker1->work();
$pool->release($worker);
$pool->release($worker3);
$pool->release($worker4);
var_dump($pool->getFreeWorkers());
var_dump($pool->getBusyWorkers());
