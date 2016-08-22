<?php

namespace App\Http\Controllers\Processo;
use App\Processodetalhe;
use Response;
use App\Http\Controllers\Controller;

class ProcessodetalheController extends Controller {

    public function __construct(Processodetalhe $proc) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        $this->proc = $proc;
    }

    /**
     * Selecionar todos os processos no banco de dados
     * @return Array json com todos os processos
     */
    public function allProcessos() {
        return Response::json($this->proc->allProcessos(), 200);
    }

    /**
     * Selecionar processos específico no banco de dados
     * @param Int $id
     * @return Array com o processo buscado ou resposta negativa
     */
    public function getProcesso($id) {
        $proc = $this->proc->getProcesso($id);
        if (!$proc) {
            return Response::json('Processo nao encontrado!', 400);
        }
        return Response::json($proc, 200);
    }

}
