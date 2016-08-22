<?php

namespace App;

use Input;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model {

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['processo', 'data', 'tipo', 'obs'];

    public function allArquivos() {
        return self::all();
    }

    public function getArquivo($id) {
        $arq = self::find($id);
        if (is_null($arq)) {
            return false;
        }
        return $arq;
    }

    public function saveArquivo() {
        $input = Input::all();

        $input['data'] = implode('-', array_reverse(explode('/', $input['data']))) . " " . date('h:i:s');

        $arq = new Arquivo();
        $arq->fill($input); // associação em massa
        return [$arq->save(), true];
    }

    public function updateArquivo($id) {
        dd('validar a entrada do campo data');
        $arq = self::find($id);
        if (is_null($arq)) {
            return [false, "Arquivo nao encontrado!"];
        }
        $input = Input::all();

        $arq->fill($input); // associação em massa

        return [$arq->save(), true];
    }

}
