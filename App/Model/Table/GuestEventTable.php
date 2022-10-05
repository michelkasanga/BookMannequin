<?php 
namespace App\Model\Table;

class GuestEventTable extends Table 
{
    protected $table = 'guest';

    public function  findGuestEvent($id){
        return $this->query(
            " 
            SELECT 
            g.id idGuest, g.name, g.firstName, g.code, g.idEvent IdEvent, e.id idEvent, e.title titleEvent, e.dateEvent, e.detail, e.picture, e.date, e.time, e.idModel
            FROM guest as g
            JOIN event as e
            ON g.IdEvent =  e.id
            WHERE g.IdEvent=?
            ", [$id]
        );
    }
    public function delete($id)
    {
        return $this->query('DELETE  FROM '. $this->table.' WHERE idEvent=?',[$id],false);
    }
}