<?php

namespace App\Model\Table;

class EventTable extends Table
{
    protected $table = 'event';

    public function all()
    {
        return $this->query('select * from ' . $this->table . ' order by id desc');
    }

}
