<?php

interface State
{
    public function toNext(Task $task);

    public function getStatus();
}

class Task
{
    private State $state;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function proceedToNext()
    {
        $this->state->toNext($this);
    }

    public static function make()
    {
        $self = new self();
        $self->setState(new Created());
        return $self;
    }
}

class Created implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Process());
    }

    public function getStatus()
    {
        return 'Created';
    }
}

class Process implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Test());
    }

    public function getStatus()
    {
        return 'Process';
    }
}

class Test implements State
{

    public function toNext(Task $task)
    {
        $task->setState(new Done());
    }

    public function getStatus()
    {
        return 'Test';
    }
}

class Done implements State
{

    public function toNext(Task $task)
    {

    }

    public function getStatus()
    {
        return 'Done';
    }
}

$task = Task::make();
$task->proceedToNext();
$task->proceedToNext();
$task->proceedToNext();
var_dump($task->getState()->getStatus());