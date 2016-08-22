<?php

namespace App;

use Input;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['nome', 'estadocivil', 'endereco', 'bairro',
        'cidade', 'telefone', 'celular', 'identidate', 'cpf', 'email',
        'obs', 'isativo'];

    public function saveCliente() {
        $input = Input::all();
        $cli = new Cliente();
        $cli->fill($input); // associação em massa
        //verifica se nao possui email já cadastrado
        if (isset($input['email']) && strlen($input['email']) > 2) {
            $email = self::lists('email')->all();
            foreach ($email as $key => $value) {
                if ($value == $input['email']) {
                    return [false,"Email ja existente"];
                }
            }
        }

        if (strcmp($input['cidade'], "-1") == 0) {
            return [false,"Selecione uma cidade"];
        }

        return [$cli->save(),true];
    }

    public function updateCliente($id) {
        $cli = self::find($id);
        if (is_null($cli)) {
            return false;
        }
        $input = Input::all();
        $cli->fill($input); // associação em massa
        //verifica se nao possui email já cadastrado
//        if (isset($input['email']) && strlen($input['email']) > 2) {
//            $email = self::lists('email')->all();
//            foreach ($email as $key => $value) {
//                if ($value == $input['email']) {
//                    return [false,"Email ja existente"];
//                }
//            }
//        }

        if (isset($input['cidade']) && strcmp($input['cidade'], "-1") == 0) {
            return [false,"Selecione uma cidade"];
        }

        return [$cli->save(),true];
    }

}
