<?php

namespace App\Http\Controllers\Cliente;

use App\Clientedetalhe;
use Response;
use App\Http\Controllers\Controller;

/**
 * Classe para acessar a view de clientes no banco de dados
 */
class ClientedetalheController extends Controller {

    public function __construct(Clientedetalhe $cliente) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        $this->cli = $cliente;
    }

    /**
     * Selecionar cliente específico no banco de dados
     * @param Int $id
     * @return Array com o cliente buscado ou resposta negativa
     */
    public function getCliente($id) {
        $cli = $this->cli->getCliente($id);
        if (!$cli) {
            return Response::json('Cliente nao encontrado!', 400);
        }
        return Response::json($cli, 200);
    }

}
