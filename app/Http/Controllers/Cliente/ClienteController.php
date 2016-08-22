<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use Response;
use App\Http\Controllers\Controller;

class ClienteController extends Controller {

    public function __construct(Cliente $cliente) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: PUT, POST');
        $this->cli = $cliente;
    }

    public function saveCliente() {
        $cli = $this->cli->saveCliente();
        //se inseriu, retorna resposta, caso contrário, retorna a mensagem
        //do Model
        //dd($cli);
        if ($cli[0]) {
            return Response::json('Cliente adicionado!', 201);
        }
        return Response::json($cli[1], 412);
    }

    public function updateCliente($id) {
        $cli = $this->cli->updateCliente($id);
        if ($cli[0]) {
            return Response::json('Cliente alterado!', 200);
        }
        return Response::json($cli[1], 412);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('clientes.clientes');
    }

}
