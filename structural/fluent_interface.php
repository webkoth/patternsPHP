<?php

class QueryBuilder
{
    private array $select = [];
    private array $from = [];
    private array $where = [];

    public function select(array $select)
    {
        $this->select[] = $select;
        return $this;

    }

    public function from(array $from)
    {
        $this->from[] = $from;
        return $this;

    }

    public function where(array $where)
    {
        $this->where[] = $where;
        return $this;

    }

    public function get()
    {
        return sprintf('SELECT %s FROM %s WHERE %s;',
            join(', ', $this->select[0]),
            join(', ', $this->from[0]),
            join(', ', $this->where[0])
        );
    }
}

$query = new QueryBuilder();
$queryBuilder = $query->select(['all'])->from(['users'])->where(['a > b'])->get();
var_dump($queryBuilder);