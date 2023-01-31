<?php

class WorkerFacade
{
    private Developer $developer;
    private Designer $designer;

    /**
     * @param Developer $developer
     * @param Designer $designer
     */
    public function __construct(Developer $developer, Designer $designer)
    {
        $this->developer = $developer;
        $this->designer = $designer;
    }

    public function startWork()
    {
        $this->developer->startDevelop();
        $this->designer->startDesign();
    }

    public function stopWork()
    {
        $this->developer->stopDevelop();
        $this->designer->stopDesign();
    }
}

class Developer
{
    public function startDevelop()
    {
        printf('Start Develop');
    }

    public function stopDevelop()
    {
        printf('Stop Develop');
    }
}

class Designer
{
    public function startDesign()
    {
        printf('Start Design');
    }

    public function stoptDesign()
    {
        printf('Stop Design');
    }
}

$developer = new Developer();
$designer = new Designer();

$workerFacade = new WorkerFacade($developer, $designer);

$workerFacade->startWork();