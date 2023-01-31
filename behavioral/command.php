<?php

interface Command
{
    public function execute();
}

interface Undoable extends Command
{
    public function undo();
}

class Output
{
    private bool $isEnable = false;
    private string $body = '';

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function enable()
    {
        $this->isEnable = true;
    }

    public function disable()
    {
        $this->isEnable = false;
    }

    public function write($str)
    {
        if ($this->isEnable) {
            $this->body = $str;
        }
    }
}

class Invoker
{
    private Command $command;

    /**
     * @param Command $command
     */
    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }


    public function run()
    {
        $this->command->execute();
    }


}

class Message implements Command
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }


    public function execute()
    {
        $this->output->write('some data for execute');
    }
}

class ChangeStatus implements Undoable
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }


    public function execute()
    {
        $this->output->enable();
    }

    public function undo()
    {
        $this->output->disable();
    }
}

$output = new Output();

$invoker = new Invoker();

$message = new Message($output);
$undoable = new ChangeStatus($output);
$undoable->execute();
$message->execute();

var_dump($output->getBody());

