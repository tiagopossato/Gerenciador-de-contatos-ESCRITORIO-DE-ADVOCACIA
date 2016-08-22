@extends('layouts.master')
@section('title', 'Usuarios')

@section('menuUsuario')
<li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Novo</a>
</li>
@endsection
@section('content')
<!--Page Content -->
<!--<div class="borda">
    <h4>Usuários
        <button type="button" class="btn btn-success pull-right"
                data-toggle="modal"
                data-target="#mdCadastro"
                >Inserir</button>
    </h4>
</div>
<hr>-->
<div id = "tabelaUsuarios">
    <div>
        <!--aqui vem a tabela de usuários-->
    </div>
</div>

@endsection
@section('modais')
@include('usuarios.mdCadastro')
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {
        $('#mdCadastroTitulo').html('Cadastro de usuário');
        $('#botaoEnviaCadastro').html('Cadastrar');
        $('#formCadastro').submit(enviaCadastro);
        leUsuarios();
        $('#mdCadastro').on('hidden.bs.modal', function () {
            $('#formCadastro').unbind('submit');
            $('#formCadastro').submit(enviaCadastro);
            $('#mdCadastroTitulo').html('Cadastro de usuário');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#nome').val('');
            $('#email').val('');
            $('#password').val('');
            $('#password').attr('required', '');
            $('.oculto').remove();
        });
    });
    function leUsuarios() {
        $.ajax({
            url: local + 'api/user',
            dataType: "json",
            beforeSend: function (xhr) {
                $('#mdCarregando').modal('show');
            },
            success: preencheTabela,
            complete: function (jqXHR, textStatus) {
                $('#mdCarregando').modal('hide');
            }
        });
    }

    function preencheTabela(listaUsuarios) {
        //limpa a tabela
        $('#tabelaUsuarios div').remove();
        //cria nova estrutura da tabela
        $('<tr>').attr({
            id: 'tb-head'
        }).appendTo($('<thead>').appendTo(
                $('<table>').attr({
            class: 'table table-hover table-condensed',
            id: 'tb-usuarios'
        }).appendTo('#tabelaUsuarios')));
        $('<th>').attr({
            class: 'text-center'
        }).html('Nome').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Email').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Grupo').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Status').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ações').appendTo('#tb-head');
        $('<tboby>').appendTo('#tabelaUsuarios');
        //preenche a tabela com os dados recebidos
        for (var i = 0; i < listaUsuarios.length; i++) {
            newRow = '<tr id=\"' + listaUsuarios[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaUsuarios[i]['nome'] + '</td>';
            cols += '<td>' + listaUsuarios[i]['email'] + '</td>';
            cols += '<td>' + listaUsuarios[i]['role'] + '</td>';
            var st = 'Inativo';
            var icone = 'fa-eye';
            if (listaUsuarios[i]['active']) {
                st = 'Ativo';
                icone = 'fa-eye-slash';
            }
            cols += '<td>' + st + '</td>';
            cols += '<td>' +
                    '<a href="javascript:editar(' + listaUsuarios[i]['id'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa fa-edit fa-fw"></i></a>' +
                    '   <a href="javascript:alterarStatus(' + listaUsuarios[i]['id'] + ',' + !listaUsuarios[i]['active'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa ' + icone + ' fa-fw"></i></a>' +
                    '</td>';
            newRow.append(cols);
            $("#tb-usuarios").append(newRow);
        }
        $('#tb-usuarios').DataTable();
    }

    function enviaCadastro(e) {
        dados = $(this).serialize();
        $.ajax({
            url: local + 'api/user',
            type: 'post',
            data: dados,
            success: leUsuarios,
            complete: function (jqXHR, textStatus) {
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function editar(id) {
        $.ajax({
            url: local + 'api/user/' + id,
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#nome').val(data["nome"]);
                $('#email').val(data["email"]);
                $('#password').val('');
                $('#password').removeAttr('required');
                if (data["role"] === 'admin') {
                    $('#role').prop("checked", true);
                } else {
                    $('#role').prop("checked", false);
                }
                $('#mdCadastroTitulo').html('Editar usuário');
                $('#botaoEnviaCadastro').html('Editar');
                $('#mdCadastro').modal('show');
                $('<input>').attr({
                    class: 'oculto',
                    type: 'hidden',
                    id: 'id',
                    name: 'id',
                    value: id
                }).appendTo('#formCadastro');
                $('#formCadastro').unbind('submit');
                $('#formCadastro').submit(enviaEdicao);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                mensagem(jqXHR.statusText, errorThrown);
            }
        });
    }

    function enviaEdicao() {
        dados = $(this).serialize();
        id = $('input:hidden[name=id]').val();
        $.ajax({
            url: local + 'api/user/' + id,
            type: 'put',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('hide');
                leUsuarios();
                mensagem(jqXHR.statusText, jqXHR.responseText);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, errorThrown);
            }
        });
        return false;
    }

    function alterarStatus(id, status) {
        var msg = 'Deseja desativar o usuário?';

        if (status) {
            msg = 'Deseja ativar o usuário?';
        }
        confirm('Alteração de status', msg, function (res) {
            if (res) {
                var CSRF_TOKEN = '<?php echo csrf_token(); ?>';
                var dados = '_token=' + CSRF_TOKEN + '&active=' + status;
                console.log(dados);
                $.ajax({
                    url: local + 'api/user/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                        leUsuarios();
                        //mensagem(jqXHR.statusText, jqXHR.responseText);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        mensagem(jqXHR.statusText, errorThrown);
                    }
                });

            }

        });
    }
</script>
@endsection
