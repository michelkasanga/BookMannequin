<?php

namespace App\Model\Table;

class ModelEventTable extends Table
{
    protected $table = 'modelevent';

    public function find($title)
    {
        return $this->query('SELECT * FROM ' . $this->table . ' WHERE title =?', [$title], false);
    }
}
