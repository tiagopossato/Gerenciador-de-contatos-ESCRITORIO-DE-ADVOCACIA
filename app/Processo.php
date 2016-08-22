<?php

namespace App;

use Input;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model {

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['cliente', 'autos', 'partecontraria', 'vara',
        'comarca', 'acaotipo', 'advogado', 'obs', 'isarquivado'];

    public function saveProcesso() {
        $input = Input::all();
        if (isset($input['cliente']) && strcmp($input['cliente'], "-1") == 0) {
            return [false, "Selecione um cliente"];
        }
        if (isset($input['comarca']) && strcmp($input['comarca'], "-1") == 0) {
            return [false, "Selecione uma comarca"];
        }
        if (isset($input['advogado']) && strcmp($input['advogado'], "-1") == 0) {
            return [false, "Selecione um advogado"];
        }
          if (isset($input['acaotipo']) && strcmp($input['acaotipo'], "-1") == 0) {
            return [false, "Selecione um tipo de acao"];
        }
        $proc = new Processo();
        $proc->fill($input); // associação em massa
        return [$proc->save(), true];
    }

    public function updateProcesso($id) {
        $proc = self::find($id);
        if (is_null($proc)) {
            return [false, "Processo nao encontrado!"];
        }
        $input = Input::all();
        if (isset($input['cliente']) && strcmp($input['cliente'], "-1") == 0) {
            return [false, "Selecione um cliente"];
        }
        if (isset($input['comarca']) && strcmp($input['comarca'], "-1") == 0) {
            return [false, "Selecione uma comarca"];
        }
        if (isset($input['advogado']) && strcmp($input['advogado'], "-1") == 0) {
            return [false, "Selecione um advogado"];
        }
          if (isset($input['acaotipo']) && strcmp($input['acaotipo'], "-1") == 0) {
            return [false, "Selecione um tipo de acao"];
        }

        $proc->fill($input); // associação em massa

        return [$proc->save(), true];
    }

}