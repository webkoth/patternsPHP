<?php

interface WorkerD
{
    public function work();
}

class ObjectManager
{
    private WorkerD $worker;

    /**
     * @param WorkerD $worker
     */
    public function __construct(WorkerD $worker)
    {
        $this->worker = $worker;
    }

    public function goWork()
    {
        $this->worker->work();
    }
}

class Developer implements WorkerD
{

    public function work()
    {
        printf('Develop');
    }
}

class NullWorker implements WorkerD
{
    public function work()
    {

    }
}
$developer = new Developer();
$nullableDeveloper = new NullWorker();

$objectManager = new ObjectManager($developer);

$objectManager->goWork();

