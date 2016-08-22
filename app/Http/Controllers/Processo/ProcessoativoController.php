<?php

namespace App\Http\Controllers\Processo;

use Response;
use App\Processoativo;
use App\Http\Controllers\Controller;

class ProcessoativoController extends Controller {

    public function __construct(Processoativo $proc) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        $this->proc = $proc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('processos.ativos');
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
