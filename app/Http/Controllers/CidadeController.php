<?php

namespace App\Http\Controllers;

use App\Cidade;
use Response;
use App\Http\Controllers\Controller;

class CidadeController extends Controller {

    public function __construct(Cidade $cidade) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->cid = $cidade;
    }

    public function allCidades() {
        return Response::json($this->cid->allCidades(), 200);
    }

    public function getCidade($id) {
        $cid = $this->cid->getCidade($id);
        if (!$cid) {
            return Response::json('Cidade nao encontrada!', 400);
        }
        return Response::json($cid, 200);
    }

    public function saveCidade() {
        $cid = $this->cid->saveCidade();
        if (!$cid) {
            return Response::json('Cidade nao adicionada', 400);
        }
        return Response::json('Cidade adicionada!', 201);
    }

    public function updateCidade($id) {
        $cid = $this->cid->updateCidade($id);
        if (!$cid) {
            return Response::json('Cidade nao encontrada!', 400);
        }
        return Response::json('Cidade alterada!', 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('cidades.cidades');
    }

}
