<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    //testar a conexão com banco de dados.
    echo config('app.name');
});
