<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processoarquivado extends Model {

    public function getProcesso($id) {
        $proc = self::find($id);
        if (is_null($proc)) {
            return false;
        }
        return $proc;
    }

    public function allProcessos() {
        return self::all();
    }

}
