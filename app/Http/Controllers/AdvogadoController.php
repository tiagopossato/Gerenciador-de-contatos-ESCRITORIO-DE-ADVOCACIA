<?php

namespace App\Http\Controllers;

use App\Advogado;
use Response;
use App\Http\Controllers\Controller;

class AdvogadoController extends Controller {

    public function __construct(Advogado $advogado) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->adv = $advogado;
    }

    public function allAdvogados() {
        return Response::json($this->adv->allAdvogados(), 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('advogados.advogados');
    }

    public function getAdvogado($id) {
        $adv = $this->adv->getAdvogado($id);
        if (!$adv) {
            return Response::json('Advogado nao encontrado!', 400);
        }
        return Response::json($adv, 200);
    }

    public function saveAdvogado() {

        $adv = $this->adv->saveAdvogado();
        if (!$adv) {
            return Response::json('Advogado nao adicionado', 400);
        }
        return Response::json('Advogado adicionado!', 201);
    }

    public function updateAdvogado($id) {
        $adv = $this->adv->updateAdvogado($id);
        if (!$adv) {
            return Response::json('Advogado nao encontrado!', 400);
        }
        return Response::json('Advogado alterado!', 200);
    }

}
