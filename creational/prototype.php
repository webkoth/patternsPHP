<?php

abstract class WorkerPrototype
{
    protected string $name = '';
    protected string $position = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}

class Developer extends WorkerPrototype
{
    protected string $position = 'Developer';
}

$developer = new Developer();
$developer2 = clone $developer;
$developer2->setName('Minas');
$developer3 = clone $developer2;
var_dump($developer, $developer2, $developer->getName(), $developer3);


