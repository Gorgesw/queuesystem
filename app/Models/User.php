<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /**
     * Relação entre Usuário e Estabelecimento, onde um estabelecimento pode pertencer apenas a um estabelecimento.
     */
    public function company() {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
