<?php

class Worker
{
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public static function make($args)
    {
        return new self($args['name']);
    }
}

class WorkerMapper
{
    private WorkerStorageAdapter $workerStorageAdapter;

    /**
     * @param WorkerStorageAdapter $workerStorageAdapter
     */
    public function __construct(WorkerStorageAdapter $workerStorageAdapter)
    {
        $this->workerStorageAdapter = $workerStorageAdapter;
    }

    public function findById($id): string|Worker
    {
        $res =  $this->workerStorageAdapter->find($id);
        if ($res === null) {
            return 'Worker with this id doesnt exists';
        }

        return $this->make($res);
    }

    public function make($args): Worker
    {
        return Worker::make($args);
    }

}

class WorkerStorageAdapter
{
    private array $data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function find($id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }
    }

}

$data = [
    1 => [
        'name' => 'Boris'
    ]
];

$workerStorageAdapter = new WorkerStorageAdapter($data);

//var_dump($workerStorageAdapter);
$workerMapper = new WorkerMapper($workerStorageAdapter);

$worker = $workerMapper->findById(1);
var_dump($worker->getName());
//var_dump($worker->getName());

