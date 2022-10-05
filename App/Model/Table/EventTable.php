<?php

namespace App\Model\Table;

class EventTable extends Table
{
    protected $table = 'event';

    public function all()
    {
        return $this->query(
            " 
            SELECT 
            m.id IdModel, m.title titleModel, e.id idEvent, e.title titleEvent, e.dateEvent, e.detail, e.picture, e.date, e.time, e.idModel
            FROM modelevent as m
            JOIN event as e
            ON e.idModel=  m.id
            ORDER BY e.id DESC
            "
        );
    }
    
}
