<?php

namespace App\Http\Controllers\Cliente;

use App\Clientesinativo;
use Response;
use App\Http\Controllers\Controller;

/**
 * Classe para acessar a view de clientes no banco de dados
 */
class ClientesinativoController extends Controller {

    public function __construct(Clientesinativo $cliente) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        $this->cli = $cliente;
    }

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('clientes.inativos');
    }
    
    /**
     * Selecionar todos os clientes no banco de dados
     * @return Array json com todos os clientes
     */
    public function allClientes() {
        return Response::json($this->cli->allClientes(), 200);
    }

}
