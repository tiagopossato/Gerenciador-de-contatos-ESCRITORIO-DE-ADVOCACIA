@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="row">

    <div class="container">
        <h2>CADASTROS</h2>
        <table class = "table">
            <tr>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="usuarios"><button type="button" class="btn btn-default btn-lg">Usuários</button></a>
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-lg">Advogados</button>
                    </div>

                </td>

                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-lg">Cidade</button>
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-lg">Tipos de Ação</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div> <!--row-->
@endsection