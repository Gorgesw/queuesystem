<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticable
{
    use SoftDeletes;

    /**
     * Relação entre Usuário e Estabelecimento, onde um estabelecimento pode pertencer apenas a um estabelecimento.
     */
    public function company() {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
