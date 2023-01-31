<?php

class ControllerConfiguration
{
    private string $name;
    private string $action;

    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}

class Controller
{
    private ControllerConfiguration $controllerConfiguration;

    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->controllerConfiguration = $controllerConfiguration;
    }

    public function getConfiguration(): string
    {
        return $this->controllerConfiguration->getName() . '@' . $this->controllerConfiguration->getAction();
    }
}

$configuration = new ControllerConfiguration('PostController', 'index');
$configuration1 = new ControllerConfiguration('PostController', 'show');
$configuration2 = new ControllerConfiguration('PostController', 'store');

$controller = new Controller($configuration);
$controller1 = new Controller($configuration1);
$controller2 = new Controller($configuration2);

var_dump($controller->getConfiguration(), $controller1->getConfiguration(), $controller2->getConfiguration());
