<?php

interface Mediator
{
    public function getWorker();
}

abstract class WorkerM
{
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHelo()
    {
        printf('Hello');
    }

    public function work()
    {
        return $this->name . ' is working';
    }
}

class InfoBase
{
    public function printInfo(WorkerM $worker)
    {
        printf($worker->work());
    }
}

class WorkerInfoBaseMediator implements Mediator
{

    private WorkerM $worker;
    private InfoBase $infoBase;

    /**
     * @param WorkerM $worker
     * @param InfoBase $infoBase
     */
    public function __construct(WorkerM $worker, InfoBase $infoBase)
    {
        $this->worker = $worker;
        $this->infoBase = $infoBase;
    }

    public function getWorker()
    {
        $this->infoBase->printInfo($this->worker);
    }
}

class Developer extends WorkerM
{

}

$developer = new Developer('Boris');
$infoBase = new InfoBase();
$workerInfoBaseMediator = new WorkerInfoBaseMediator($developer, $infoBase);

$workerInfoBaseMediator->getWorker();