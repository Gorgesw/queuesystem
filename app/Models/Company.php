<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * Relação entre Estabelecimento e Usuário, onde um estabelecimento pode possuir vários usuários.
     */    
    public function users() {
        return $this->hasMany(User::class, 'id_company');
    }

    /**
     * Relação entre Estabelecimento e Filas, onde um estabelecimento pode possuir várias filas.
     */
    public function queues() {
        return $this->hasMany(Queue::class, 'id_queue');
    }
}
