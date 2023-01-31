<?php

final class Connection
{
    private static ?self $instance = null;
    private static string $name;

    public static function getInstance(): self
    {
        return self::$instance === null ? self::$instance = new self() : self::$instance;
    }

    public static function setName($name): void
    {
        self::$name = $name;
    }

    public function getName(): string
    {
        return self::$name;
    }

    private function __clone()
    {

    }
}

$connection = Connection::getInstance();
var_dump($connection::getInstance());
$connection1 = Connection::getInstance();
$connection2 = Connection::getInstance();
var_dump($connection::getInstance());
$connection::setName('Laravel');
var_dump($connection->getName());
var_dump($connection);
var_dump($connection1);
var_dump($connection2);