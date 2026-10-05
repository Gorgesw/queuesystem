<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueueTicket extends Model
{
    use SoftDeletes;

    /**
     * Relação entre Ticket e Fila, onde um ticket pode pertencer apenas a uma Fila.
     */    
    public function queue() {
        return $this->belongsTo(Queue::class, 'id_queue');
    }
    
}
