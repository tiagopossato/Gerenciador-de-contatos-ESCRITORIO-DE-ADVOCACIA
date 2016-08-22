@extends('layouts.master')
@section('title', 'Tipo de ação')

@section('menuTipodeacao')
<li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Novo</a>
</li>
@endsection
@section('content')
<div id = "tabelaTipodeacao">
    <div>
        <!--aqui vem a tabela de cidades-->
    </div>
</div>

@endsection
@section('modais')
@include('tipodeacao.mdCadastro')
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {
        $('#mdCadastroTitulo').html('Cadastro de tipo de ação');
        $('#botaoEnviaCadastro').html('Cadastrar');
        $('#formCadastro').submit(enviaCadastro);
        leTipodeacao();
        $('#mdCadastro').on('hidden.bs.modal', function () {
            $('#formCadastro').unbind('submit');
            $('#formCadastro').submit(enviaCadastro);
            $('#mdCadastroTitulo').html('Cadastro de tipo de ação');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#tipo').val('');
            $('#obs').val('');
            $('.oculto').remove();
        });
    });
    function leTipodeacao() {
        $.ajax({
            url: local + 'api/tipodeacao',
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

    function preencheTabela(listaTipodeacao) {
        //limpa a tabela
        $('#tabelaTipodeacao div').remove();
        //cria nova estrutura da tabela
        $('<tr>').attr({
            id: 'tb-head'
        }).appendTo($('<thead>').appendTo(
                $('<table>').attr({
            class: 'table table-hover table-condensed',
            id: 'tb-tipodeacao'
        }).appendTo('#tabelaTipodeacao')));
        $('<th>').attr({
            class: 'text-center'
        }).html('Tipo').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Obs').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Status').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ações').appendTo('#tb-head');
        $('<tboby>').appendTo('#tabelaTipodeacao');
        //preenche a tabela com os dados recebidos
        for (var i = 0; i < listaTipodeacao.length; i++) {
            newRow = '<tr id=\"' + listaTipodeacao[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaTipodeacao[i]['tipo'] + '</td>';
            cols += '<td>' + listaTipodeacao[i]['obs'] + '</td>';
            var st = 'Inativo';
            var icone = 'fa-eye';
            if (listaTipodeacao[i]['isativo']) {
                st = 'Ativo';
                icone = 'fa-eye-slash';
            }
            cols += '<td>' + st + '</td>';
            cols += '<td>' +
                    '<a href="javascript:editar(' + listaTipodeacao[i]['id'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa fa-edit fa-fw"></i></a>' +
                    '   <a href="javascript:alterarStatus(' + listaTipodeacao[i]['id'] + ',' + !listaTipodeacao[i]['isativo'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa ' + icone + ' fa-fw"></i></a>' +
                    '</td>';
            newRow.append(cols);
            $("#tb-tipodeacao").append(newRow);
        }
        $('#tb-tipodeacao').DataTable();
    }

    function enviaCadastro(e) {
        dados = $(this).serialize();       
        $.ajax({
            url: local + 'api/tipodeacao',
            type: 'post',
            data: dados,
            success: leTipodeacao,
            complete: function (jqXHR, textStatus) {
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function editar(id) {
        $.ajax({
            url: local + 'api/tipodeacao/' + id,
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#tipo').val(data["tipo"]);
                $('#obs').val(data["obs"]);
                $('#mdCadastroTitulo').html('Editar tipo de ação');
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
            url: local + 'api/tipodeacao/' + id,
            type: 'put',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('hide');
                leTipodeacao();
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
        var msg = 'Deseja desativar o tipo de ação?';

        if (status) {
            msg = 'Deseja ativar o tipo de ação?';
        }
        confirm('Alteração de status', msg, function (res) {
            if (res) {
                var CSRF_TOKEN = '<?php echo csrf_token(); ?>';
                var dados = '_token=' + CSRF_TOKEN + '&isativo=' + status;
                console.log(dados);
                $.ajax({
                    url: local + 'api/tipodeacao/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                        leTipodeacao();
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
