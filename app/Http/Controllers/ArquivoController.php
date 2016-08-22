<?php

namespace App\Http\Controllers;

use App\Arquivo;
use Response;

use App\Http\Controllers\Controller;

class ArquivoController extends Controller {

    public function __construct(Arquivo $arq) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST,');
        $this->arq = $arq;
    }

//    public function index() {
//        return view('arquivo.arquivo');
//    }

    public function allArquivos() {
        return Response::json($this->arq->allArquivos(), 200);
    }

    public function getArquivo($id) {
        $arq = $this->arq->getArquivo($id);
        if (!$arq) {
            return Response::json('Arquivo nao encontrado!', 400);
        }
        return Response::json($arq, 200);
    }

    public function saveArquivo() {
        $arq = $this->arq->saveArquivo();
        if ($arq[0]) {
            return Response::json('Movimentacao concluida!', 201);
        }
        return Response::json($arq[1], 412);
    }

    public function updateArquivo($id) {
        $arq = $this->arq->updateArquivo($id);
        if ($arq[0]) {
            return Response::json('Movimentacao concluida!', 201);
        }
        return Response::json($arq[1], 412);
    }

}
