<?php

abstract class Task
{
    public function printSections()
    {
        $this->printHeader();
        $this->printBody();
        $this->printFooter();
        $this->printCustom();
    }

    public function printHeader()
    {
        printf('Header' . PHP_EOL);
    }

    public function printBody()
    {
        printf('Body' . PHP_EOL);
    }

    public function printFooter()
    {
        printf('Footer' . PHP_EOL);
    }

    abstract public function printCustom();
}

class DeveloperTask extends Task
{
    public function printCustom()
    {
        printf('for developer' . PHP_EOL);
    }
}

class DesignerTask extends Task
{
    public function printCustom()
    {
        printf('for designer' . PHP_EOL);
    }
}

$developerTask = new  DeveloperTask();
$designerTask = new  DesignerTask();

$developerTask->printSections();
$designerTask->printSections();