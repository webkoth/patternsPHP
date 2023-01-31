<?php

interface NativeWorker
{
    public function countSalary();
}

interface OutsourceWorker
{
    public function countSalaryByHour($hour);
}

class OutsourceDeveloper implements OutsourceWorker
{

    public function countSalaryByHour($hour): int
    {
        return $hour * 300;
    }
}

class NativeDeveloper implements NativeWorker
{
    public function countSalary(): int
    {
        return 3000 * 20;
    }
}

class OutsourceWorkerAdapter implements OutsourceWorker
{
    private OutsourceWorker $outsourceWorker;

    /**
     * @param OutsourceWorker $outsourceWorker
     */
    public function __construct(OutsourceWorker $outsourceWorker)
    {
        $this->outsourceWorker = $outsourceWorker;
    }

    public function countSalaryByHour($hour): int
    {
        return $this->outsourceWorker->countSalaryByHour($hour);
    }
}

class NativeWorkerAdapter implements NativeWorker
{
    private NativeWorker $nativeWorker;

    /**
     * @param NativeWorker $nativeWorker
     */
    public function __construct(NativeWorker $nativeWorker)
    {
        $this->nativeWorker = $nativeWorker;
    }

    public function countSalary(): int
    {
       return $this->nativeWorker->countSalary();
    }
}

$nativeDeveloper = new NativeDeveloper();
$outsourceDeveloper = new OutsourceDeveloper();

$nativeDeveloperAdapter = new NativeWorkerAdapter($nativeDeveloper);
$outsourceDeveloperAdapter = new OutsourceWorkerAdapter($outsourceDeveloper);
var_dump($nativeDeveloperAdapter->countSalary(), $outsourceDeveloperAdapter->countSalaryByHour(8));