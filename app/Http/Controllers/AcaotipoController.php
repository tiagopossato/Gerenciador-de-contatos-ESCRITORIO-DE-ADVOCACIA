<?php

namespace App\Http\Controllers;

use App\Acaotipo;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcaotipoController extends Controller {

    public function __construct(Acaotipo $tac) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->tac = $tac;
    }

    public function allAcaotipos() {
        return Response::json($this->tac->allAcaotipos(), 200);
    }

    public function getAcaotipo($id) {
        $tac = $this->tac->getAcaotipo($id);
        if (!$tac) {
            return Response::json('Tipo de acao nao encontrada!', 400);
        }
        return Response::json($tac, 200);
    }

    public function saveAcaotipo() {
        $tac = $this->tac->saveAcaotipo();
        if (!$tac) {
            return Response::json('Tipo de acao nao adicionada', 400);
        }
        return Response::json('Tipo de acao adicionada!', 201);
    }

    public function updateAcaotipo($id) {
        $tac = $this->tac->updateAcaotipo($id);
        if (!$tac) {
            return Response::json('Tipo de acao nao encontrada!', 400);
        }
        return Response::json('Tipo de acao alterada!', 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('tipodeacao.tipodeacao');
    }

}
