<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientedetalhe extends Model {

//    protected $fillable = ['nome', 'estadocivil', 'endereco', 'bairro',
//        'cidade', 'telefone', 'celular', 'identidate', 'cpf', 'email',
//        'obs', 'isativo'];

    public function getCliente($id) {
        $cli = self::find($id);
        if (is_null($cli)) {
            return false;
        }
        return $cli;
    }

}
