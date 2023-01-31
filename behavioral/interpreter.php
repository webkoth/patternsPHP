<?php

abstract class Expression
{
    abstract public function interpret(Context $context);
}

class Context
{
    private array $worker = [];

    /**
     * @param array $worker
     */
    public function setWorker(array $worker): void
    {
        $this->worker[] = $worker;
    }

    public function lookUp($key): string|bool
    {
        if (isset($this->worker[$key])) {
            return $this->worker[$key];
        }
        return false;
    }
}

class VariableExp
{
    private int $key;

    /**
     * @param int $key
     */
    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function interpret(Context $context)
    {
        return $context->lookUp($this->key);
    }


}

class AndExp
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context)
    {
        return $context->lookUp($this->keyOne) && $context->lookUp($this->keyTwo);
    }


}

class OrExp extends Expression
{

    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context)
    {
        return $context->lookUp($this->keyOne) || $context->lookUp($this->keyTwo);
    }
}

$context = new Context();
$context->setWorker('Bob');
$context->setWorker('Boris');

$varExp = new VariableExp(1);
$endExp = new AndExp(1, 3);

var_dump($varExp->interpret($context));