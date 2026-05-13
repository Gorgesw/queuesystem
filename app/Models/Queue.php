<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends Model
{
    use SoftDeletes;

    /**
     * Relação entre Fila e Estabelecimento, onde uma fila pode pertencer apenas a um estabelecimento.
     */    
    public function company() {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
