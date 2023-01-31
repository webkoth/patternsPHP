<?php

class WorkerList
{
    private array $list = [];
    private int $index = 0;

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList(array $list): void
    {
        $this->list = $list;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function getItem($key): ?Worker1
    {
        if ($this->list[$key]) {
            return $key;
        }
        return null;
    }

    public function next()
    {
        if ($this->index < count($this->list) - 1) {
            $this->index++;
        }

    }

    public function prev()
    {
        if ($this->index !== 0) {
            $this->index--;
        }
    }

    public function getByIndex(): Worker1
    {
        return $this->list[$this->index];
    }

}

class Worker1
{
    private string $name = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$worker = new Worker1('Boris');
$worker2 = new Worker1('Bob');
$worker3 = new Worker1('Kate');

$workerList = new WorkerList();
$workerList->setList([$worker, $worker2, $worker3]);

var_dump($workerList->getByIndex()->getName());
$workerList->next();
var_dump($workerList->getByIndex()->getName());
$workerList->next();
var_dump($workerList->getByIndex()->getName());
