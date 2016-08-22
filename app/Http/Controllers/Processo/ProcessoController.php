<?php

namespace App\Http\Controllers\Processo;

use App\Processo;
use Response;
use App\Http\Controllers\Controller;

class ProcessoController extends Controller {

    public function __construct(Processo $processo) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: PUT, POST');
        $this->proc = $processo;
    }

    public function saveProcesso() {
        $proc = $this->proc->saveProcesso();
        //se inseriu, retorna resposta, caso contrário, retorna a mensagem
        //do Model
        if ($proc[0]) {
            return Response::json('Processo adicionado!', 201);
        }
        return Response::json($proc[1], 412);
    }

    public function updateProcesso($id) {
        $proc = $this->proc->updateProcesso($id);
        if ($proc[0]) {
            return Response::json('Processo alterado!', 200);
        }
        return Response::json($proc[1], 412);
    }



}
