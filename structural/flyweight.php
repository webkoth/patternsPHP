<?php

interface  Mail
{
    public function render();
}

abstract class TypeMail
{
    public string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }


}

class BusinessMail extends TypeMail implements Mail
{
    public function render()
    {
        return $this->text . 'from Business mail';
    }
}

class JobMail extends TypeMail implements Mail
{
    public function render()
    {
        return $this->text . 'from Job mail';
    }
}

class MailFactory
{
    private array $pool = [];

    public function getMail($id, $typeMail)
    {
        if (!isset($this->pool[$id])) {
            $this->pool[$id] = $this->make($typeMail);
        }

        return $this->pool[$id];
    }

    private function make($typeMail)
    {
        if ($typeMail === 'business') {
            return new BusinessMail('Text for Business');
        }

        if ($typeMail === 'job') {
            return new JobMail('Text for job mail');
        }

        return false;
     }
}

$mailFactory = new MailFactory();

$jobMail = $mailFactory->getMail(1, 'job');
$businessMail = $mailFactory->getMail(2, 'business');
$jobMail1 = $mailFactory->getMail(3, 'job1');

var_dump($jobMail, $businessMail, $jobMail1);
