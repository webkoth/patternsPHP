<?php

interface Definer
{
    public function define($arg);
}

class Data
{
    private Definer $definer;
    private int|string|bool $arg = '';

    /**
     * @param Definer $definer
     */
    public function __construct(Definer $definer)
    {
        $this->definer = $definer;
    }

    public function executeStrategy($arg)
    {
        $this->arg = $arg;
        return $this->definer->define($this->arg);
    }
}

class IntDefiner implements Definer
{
    public function define($arg)
    {
        return $arg . ' from int strategy';
    }
}

class StringDefiner implements Definer
{
    public function define($arg)
    {
        return $arg . ' from string strategy';
    }
}

class BoolDefiner implements Definer
{
    public function define($arg)
    {
        return $arg . ' from bool strategy';
    }
}

$data = new Data(new IntDefiner());
$data = new Data(new StringDefiner());

var_dump($data->executeStrategy('some arg for first'));