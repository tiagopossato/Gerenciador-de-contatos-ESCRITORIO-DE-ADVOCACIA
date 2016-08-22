<?php

namespace App;
use Input;
use Illuminate\Database\Eloquent\Model;

class Acaotipo extends Model
{
     protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['tipo', 'obs', 'isativo'];

    public function allAcaotipos() {
        return self::all();
    }

    public function getAcaotipo($id) {
        $act = self::find($id);
        if (is_null($act)) {
            return false;
        }
        return $act;
    }

    public function saveAcaotipo() {
        $input = Input::all();
        $act = new Acaotipo();
        $act->fill($input); // associação em massa
        return $act->save();
    }

    public function updateAcaotipo($id) {
        $act = self::find($id);
        if (is_null($act)) {
            return false;
        }
        $input = Input::all();
        $act->fill($input); // associação em massa
        $act->save();
        return $act;
    }
    

}
