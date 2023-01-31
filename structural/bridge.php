<?php

interface Formatter
{
    public function format(string $str);
}

class SimpleText implements Formatter
{

    public function format(string $str)
    {
        return $str;
    }
}

class HtmlText implements Formatter
{

    public function format(string $str)
    {
        return "<p>$str</p>";
    }
}

abstract class BridgeService
{
    public Formatter  $formatter;

    /**
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    abstract public function getFormatter($str): string;
}

class SimpleTextService extends BridgeService
{
    public function getFormatter($str): string
    {
        return $this->formatter->format($str);
    }
}

class HtmlTextService extends BridgeService
{
    public function getFormatter($str): string
    {
        return $this->formatter->format($str);
    }
}

$simpleText = new SimpleText();
$htmlText = new HtmlText();

$simpleTextService = new SimpleTextService($simpleText);
$htmlTextService = new SimpleTextService($htmlText);

$simpleTextService->getFormatter('Format single');
$htmlTextService->getFormatter('Format html');