<?php

namespace App;

use Input;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['nome', 'uf', 'isativo'];

    public function allCidades() {
        return self::all();
    }

    public function getCidade($id) {
        $cid = self::find($id);
        if (is_null($cid)) {
            return false;
        }
        return $cid;
    }

    public function saveCidade() {
        $input = Input::all();
        $cid = new Cidade();
        $cid->fill($input); // associação em massa
        return $cid->save();
    }

    public function updateCidade($id) {
        $cid = self::find($id);
        if (is_null($cid)) {
            return false;
        }
        $input = Input::all();
        $cid->fill($input); // associação em massa
        $cid->save();
        return $cid;
    }
    
    public function clientes(){
        return $this->hasMany('App\Cliente', 'cidade');
    }

}
