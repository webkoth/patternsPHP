<?php

interface WorkerDevelop
{
    public function closedHours($hours);
    public function countSalary(): int;
}

class WorkerOutsourse implements WorkerDevelop
{

    private array $hours = [];

    public function countSalary(): int
    {
        return array_sum($this->hours) *  500;
    }

    public function closedHours($hours): int
    {
        return $this->hours[] = $hours;
    }
}

class WorkerProxy extends WorkerOutsourse
{
    private int $salary = 0;

    public function countSalary(): int
    {
        if ($this->salary === 0) {
            $this->salary = parent::countSalary();
        }

        return $this->salary;
    }
}

$workerProxy = new WorkerProxy();
$workerProxy->closedHours(10);
$salary = $workerProxy->countSalary();
var_dump($salary);