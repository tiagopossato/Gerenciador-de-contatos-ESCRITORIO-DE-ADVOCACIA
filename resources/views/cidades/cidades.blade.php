@extends('layouts.master')
@section('title', 'Cidades')

@section('menuCidade')
<li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Nova</a>
</li>
@endsection
@section('content')
<div id = "tabelaCidades">
    <div>
        <!--aqui vem a tabela de cidades-->
    </div>
</div>

@endsection
@section('modais')
@include('cidades.mdCadastro')
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {
        $('#mdCadastroTitulo').html('Cadastro de cidade');
        $('#botaoEnviaCadastro').html('Cadastrar');
        $('#uf').val('SC');
        $('#formCadastro').submit(enviaCadastro);
        leCidades();
        $('#mdCadastro').on('hidden.bs.modal', function () {
            $('#formCadastro').unbind('submit');
            $('#formCadastro').submit(enviaCadastro);
            $('#mdCadastroTitulo').html('Cadastro de cidade');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#nome').val('');
            $('#uf').val('SC');
            $('.oculto').remove();
        });
    });
    function leCidades() {
        $.ajax({
            url: local + 'api/cidade',
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

    function preencheTabela(listaCidades) {
        //limpa a tabela
        $('#tabelaCidades div').remove();
        //cria nova estrutura da tabela
        $('<tr>').attr({
            id: 'tb-head'
        }).appendTo($('<thead>').appendTo(
                $('<table>').attr({
            class: 'table table-hover table-condensed',
            id: 'tb-cidades'
        }).appendTo('#tabelaCidades')));
        $('<th>').attr({
            class: 'text-center'
        }).html('Nome').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('UF').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Status').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ações').appendTo('#tb-head');
        $('<tboby>').appendTo('#tabelaCidades');
        //preenche a tabela com os dados recebidos
        for (var i = 0; i < listaCidades.length; i++) {
            newRow = '<tr id=\"' + listaCidades[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaCidades[i]['nome'] + '</td>';
            cols += '<td>' + listaCidades[i]['uf'] + '</td>';
            var st = 'Inativo';
            var icone = 'fa-eye';
            if (listaCidades[i]['isativo']) {
                st = 'Ativo';
                icone = 'fa-eye-slash';
            }
            cols += '<td>' + st + '</td>';
            cols += '<td>' +
                    '<a href="javascript:editar(' + listaCidades[i]['id'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa fa-edit fa-fw"></i></a>' +
                    '   <a href="javascript:alterarStatus(' + listaCidades[i]['id'] + ',' + !listaCidades[i]['isativo'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa ' + icone + ' fa-fw"></i></a>' +
                    '</td>';
            newRow.append(cols);
            $("#tb-cidades").append(newRow);
        }
        $('#tb-cidades').DataTable();
    }

    function enviaCadastro(e) {
        dados = $(this).serialize();       
        $.ajax({
            url: local + 'api/cidade',
            type: 'post',
            data: dados,
            success: leCidades,
            complete: function (jqXHR, textStatus) {
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function editar(id) {
        $.ajax({
            url: local + 'api/cidade/' + id,
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#nome').val(data["nome"]);
                $('#uf').val(data["uf"]);
                $('#mdCadastroTitulo').html('Editar cidade');
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
            url: local + 'api/cidade/' + id,
            type: 'put',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('hide');
                leCidades();
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
        var msg = 'Deseja desativar a cidade?';

        if (status) {
            msg = 'Deseja ativar a cidade?';
        }
        confirm('Alteração de status', msg, function (res) {
            if (res) {
                var CSRF_TOKEN = '<?php echo csrf_token(); ?>';
                var dados = '_token=' + CSRF_TOKEN + '&isativo=' + status;
                console.log(dados);
                $.ajax({
                    url: local + 'api/cidade/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                        leCidades();
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
