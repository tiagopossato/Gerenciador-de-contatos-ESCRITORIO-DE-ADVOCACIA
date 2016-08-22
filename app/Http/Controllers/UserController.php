<?php

namespace App\Http\Controllers;

use App\User;
use Response;
use Auth;
//use Illuminate\Http\Request;
//
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function __construct(User $user) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->user = $user;
    }

    public function index() {
        return view('usuarios.usuarios');
    }

    public function perfil() {
        return view('usuarios.perfil');
    }

    public function allUsers() {
        return Response::json($this->user->allUsers(), 200);
    }

    public function getUser($id) {
        $user = $this->user->getUser($id);
        if (!$user) {
            return Response::json('Usuario nao encontrado!', 400);
        }
        return Response::json($user, 200);
    }

    public function getMe() {

        $user = Auth::user();
        if (!$user) {
            return Response::json('Usuario nao encontrado!', 400);
        }
        return Response::json($user, 200);
    }

    public function saveUser() {

        $user = $this->user->saveUser();
        if (!$user) {
            return Response::json('Usuario nao adicionado', 400);
        }
        return Response::json('Usuario adicionado!', 201);
    }

    public function updateUser($id) {
        $user = $this->user->updateUser($id);
        if (!$user) {
            return Response::json('Usuario nao encontrado!', 400);
        }
        return Response::json('Usuario alterado!', 200);
    }

    public function deleteUser($id) {
        if ($this->user->deleteUser($id)) {
            return Response::json("Usuario deletado com sucesso!", 200);
        }
        return Response::json("Erro ao deletar o usuario!", 400);
    }

}
