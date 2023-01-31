<?php

interface Rendarable
{
    public function render(): string;
}

class Mail implements Rendarable
{

    private array $parts = [];

    public function addPart(Rendarable $part)
    {
        $this->parts[] = $part;
    }
    public function render(): string
    {
        $result = '';
        foreach ($this->parts as $part) {
            $result .= $part->render();
        }

        return $result;
    }
}

abstract class Part
{
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}

class Header extends Part implements Rendarable
{
    public function render(): string
    {
        return $this->getText();
    }
}

class Body extends Part implements Rendarable
{
    public function render(): string
    {
        return $this->getText();
    }
}

class Footer extends Part implements Rendarable
{
    public function render(): string
    {
        return $this->getText();
    }
}

$mail = new Mail();

$mail->addPart(new Header('header'));
$mail->addPart(new Body('body'));
$mail->addPart(new Footer('header'));
var_dump($mail->render());