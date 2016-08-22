@extends('layouts.master')
@section('title', 'Advogados')

@section('menuAdvogado')
<li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Novo</a>
</li>
@endsection
@section('content')
<div id = "tabelaAdvogados">
    <div>
        <!--aqui vem a tabela de advogados-->
    </div>
</div>

@endsection
@section('modais')
@include('advogados.mdCadastro')
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {
        $('#mdCadastroTitulo').html('Cadastro de advogado(a)');
        $('#botaoEnviaCadastro').html('Cadastrar');
        $('#formCadastro').submit(enviaCadastro);
        leAdvogados();
        $('#mdCadastro').on('hidden.bs.modal', function () {
            $('#formCadastro').unbind('submit');
            $('#formCadastro').submit(enviaCadastro);
            $('#mdCadastroTitulo').html('Cadastro de advogado(a)');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#nome').val('');
            $('#email').val('');
            $('#oab').val('');
            $('.oculto').remove();
        });
    });
    function leAdvogados() {
        $.ajax({
            url: local + 'api/advogado',
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

    function preencheTabela(listaAdvogados) {
        //limpa a tabela
        $('#tabelaAdvogados div').remove();
        //cria nova estrutura da tabela
        $('<tr>').attr({
            id: 'tb-head'
        }).appendTo($('<thead>').appendTo(
                $('<table>').attr({
            class: 'table table-hover table-condensed',
            id: 'tb-advogados'
        }).appendTo('#tabelaAdvogados')));
        $('<th>').attr({
            class: 'text-center'
        }).html('Nome').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Email').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('OAB').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Status').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ações').appendTo('#tb-head');
        $('<tboby>').appendTo('#tabelaAdvogados');
        //preenche a tabela com os dados recebidos
        for (var i = 0; i < listaAdvogados.length; i++) {
            newRow = '<tr id=\"' + listaAdvogados[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaAdvogados[i]['nome'] + '</td>';
            cols += '<td>' + listaAdvogados[i]['email'] + '</td>';
            cols += '<td>' + listaAdvogados[i]['oab'] + '</td>';
            var st = 'Inativo';
            var icone = 'fa-eye';
            if (listaAdvogados[i]['isativo']) {
                st = 'Ativo';
                icone = 'fa-eye-slash';
            }
            cols += '<td>' + st + '</td>';
            cols += '<td>' +
                    '<a href="javascript:editar(' + listaAdvogados[i]['id'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa fa-edit fa-fw"></i></a>' +
                    '   <a href="javascript:alterarStatus(' + listaAdvogados[i]['id'] + ',' + !listaAdvogados[i]['isativo'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa ' + icone + ' fa-fw"></i></a>' +
                    '</td>';
            newRow.append(cols);
            $("#tb-advogados").append(newRow);
        }
        $('#tb-advogados').DataTable();
    }

    function enviaCadastro(e) {
        dados = $(this).serialize();
        $.ajax({
            url: local + 'api/advogado',
            type: 'post',
            data: dados,
            success: leAdvogados,
            complete: function (jqXHR, textStatus) {
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function editar(id) {
        $.ajax({
            url: local + 'api/advogado/' + id,
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#nome').val(data["nome"]);
                $('#email').val(data["email"]);
                $('#oab').val(data["oab"]);
                $('#mdCadastroTitulo').html('Editar advogado');
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
            url: local + 'api/advogado/' + id,
            type: 'put',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('hide');
                leAdvogados();
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
        var msg = 'Deseja desativar o advogado(a)?';

        if (status) {
            msg = 'Deseja ativar o advogado(a)?';
        }
        confirm('Alteração de status', msg, function (res) {
            if (res) {
                var CSRF_TOKEN = '<?php echo csrf_token(); ?>';
                var dados = '_token=' + CSRF_TOKEN + '&isativo=' + status;
                console.log(dados);
                $.ajax({
                    url: local + 'api/advogado/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                        leAdvogados();
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
