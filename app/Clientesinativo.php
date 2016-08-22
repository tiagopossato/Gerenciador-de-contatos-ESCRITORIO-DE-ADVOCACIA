<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientesinativo extends Model {

    public function allClientes() {
        return self::all();
    }

}
