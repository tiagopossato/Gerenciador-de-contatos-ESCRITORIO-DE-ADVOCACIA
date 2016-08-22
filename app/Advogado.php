<?php

namespace App;
use Input;
use Illuminate\Database\Eloquent\Model;

class Advogado extends Model {

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['nome', 'email', 'oab', 'isativo'];

    public function allAdvogados() {
        return self::all();
    }

    public function getAdvogado($id) {
        $adv = self::find($id);
        if (is_null($adv)) {
            return false;
        }
        return $adv;
    }

    public function saveAdvogado() {
        $input = Input::all();
        $adv = new Advogado();
        $adv->fill($input); // associação em massa
        //verifica se e-mail é único
        $email = self::lists('email')->all();
        foreach ($email as $key => $value) {
            if ($value == $input['email']) {
                return false;
            }
        }

        return $adv->save();
    }

    public function updateAdvogado($id) {
        $adv = self::find($id);
        if (is_null($adv)) {
            return false;
        }
        $input = Input::all();
        
        $adv->fill($input); // associação em massa
        $adv->save();
        return $adv;
    }

}
