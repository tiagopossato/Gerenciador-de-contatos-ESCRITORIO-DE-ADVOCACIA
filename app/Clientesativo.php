<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientesativo extends Model {

    public function allClientes() {
        return self::all();
    }

}
