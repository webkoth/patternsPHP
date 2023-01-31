<?php

interface WorkerVisitor
{
    public function visitDeveloper(WorkerV $worker);
    public function  visitDesigner(WorkerV $worker);
}

class RecorderVisitor implements WorkerVisitor
{

    private array $visited = [];

    /**
     * @return array
     */
    public function getVisited(): array
    {
        return $this->visited;
    }

    public function visitDeveloper(WorkerV $developer)
    {
        $this->visited[] = $developer;
    }

    public function visitDesigner(WorkerV $designer)
    {
        $this->visited[] = $designer;
    }
}

interface WorkerV
{
    public function work();
    public function accept(WorkerVisitor $workerVisitor);
}

class Developer implements WorkerV
{

    public function work()
    {
        printf('developer is working');
    }

    public function accept(WorkerVisitor $workerVisitor)
    {
        $workerVisitor->visitDeveloper($this);
    }
}

class Designer implements WorkerV
{

    public function work()
    {
        printf('designer is working');
    }

    public function accept(WorkerVisitor $workerVisitor)
    {
        $workerVisitor->visitDesigner($this);
    }
}


$visitor = new RecorderVisitor();

$developer = new Developer();
$designer = new Designer();

$developer->accept($visitor);
$designer->accept($visitor);

var_dump($visitor->getVisited());