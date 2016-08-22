@extends('layouts.master')
@section('title', 'Processos')

@section('menuProcessos')
<li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Novo</a>
</li>
@endsection
@section('content')
<div id = "tabelaProcessos">
    <div>
        <!--aqui vem a tabela de processos-->
    </div>
</div>

@endsection
@section('modais')
@include('processos.mdCadastro')
@include('processos.mdArquivo')
@include('processos.mdImprime')
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {

        $('#mdCadastroTitulo').html('Cadastro de processo');
        $('#botaoEnviaCadastro').html('Cadastrar');
        $('#formCadastro').submit(enviaCadastro);
        //altera o tamanho do modal
        $('#mdCadastroTamanho').removeClass("modal-dialog modal-sm").addClass("modal-dialog modal-lg");
        //atribui evento quando o modal é aberto
        $('#mdCadastro').on('show.bs.modal', function () {
            //preenche a lista de clientes no modal de cadastro
            $.ajax({
                url: local + 'api/clientes_ativos',
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    //preenche o select de cidades do modal
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['isativo'] === true) {
                            var newOption = "";
                            newOption += '<option value=' + data[i]['id']
                                    + '>' + data[i]['nome'] + '</option>';
                            $("#cliente").append(newOption);
                        }
                    }
                    $("#cliente")
                            .chosen({
                                width: '100%',
                                disable_search_threshold: 4,
                                no_results_text: "Oops, não encontrado: ",
                                search_contains: true
                            });
                    $('#cliente').trigger("chosen:updated");
                    $('#mdCadastro').trigger('seleciona');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, errorThrown);
                }

            });
            //preenche a lista de advogados no modal de cadastro
            $.ajax({
                url: local + 'api/advogado',
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    //preenche o select de cidades do modal
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['isativo'] === true) {
                            var newOption = "";
                            newOption += '<option value=' + data[i]['id']
                                    + '>' + data[i]['nome'] + '</option>';
                            $("#advogado").append(newOption);

                        }
                    }
                    $("#advogado")
                            .chosen({
                                width: '100%',
                                disable_search_threshold: 4,
                                no_results_text: "Oops, não encontrado: ",
                                search_contains: true
                            });
                    $('#advogado').trigger("chosen:updated");
                    $('#mdCadastro').trigger('seleciona');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, errorThrown);
                }

            });
            //preenche a lista de tiposdeacao no modal de cadastro
            $.ajax({
                url: local + 'api/tipodeacao',
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    //preenche o select de cidades do modal
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['isativo'] === true) {
                            var newOption = "";
                            newOption += '<option value=' + data[i]['id']
                                    + '>' + data[i]['tipo'] + '</option>';
                            $("#acaotipo").append(newOption);
                        }
                    }
                    $("#acaotipo")
                            .chosen({
                                width: '100%',
                                disable_search_threshold: 4,
                                no_results_text: "Oops, não encontrado: ",
                                search_contains: true
                            });
                    $('#acaotipo').trigger("chosen:updated");
                    $('#mdCadastro').trigger('seleciona');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, errorThrown);
                }

            });

            //preenche a lista de comarcas no modal de cadastro
            $.ajax({
                url: local + 'api/cidade',
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    //preenche o select de cidades do modal
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['isativo'] === true) {
                            var newOption = "";
                            newOption += '<option value=' + data[i]['id']
                                    + '>' + data[i]['nome'] + '</option>';
                            $("#comarca").append(newOption);
                        }
                    }
                    $("#comarca")
                            .chosen({
                                width: '100%',
                                disable_search_threshold: 4,
                                no_results_text: "Oops, não encontrado: ",
                                search_contains: true
                            });
                    $('#comarca').trigger("chosen:updated");
                    $('#mdCadastro').trigger('seleciona');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, errorThrown);
                }

            });

        });
        //metodo para limpar os campos do modal de cadastro 
        //quando ele é ocultado
        $('#mdCadastro').on('hidden.bs.modal', function () {
            $('#formCadastro').unbind('submit');
            $('#formCadastro').submit(enviaCadastro);
            $('#mdCadastroTitulo').html('Cadastro de processo');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#cliente')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="-1">Selecione</option>')
                    .val(-1)
                    ;
            $('#cliente').trigger("chosen:updated");
            $('#autos').val('');
            $('#partecontraria').val('');
            $('#vara').val('');
            $('#acaotipo')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="-1">Selecione</option>')
                    .val(-1)
                    ;
            $('#acaotipo').trigger("chosen:updated");
            $('#advogado')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="-1">Selecione</option>')
                    .val(-1)
                    ;
            $('#advogado').trigger("chosen:updated");
            $('#comarca')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="-1">Selecione</option>')
                    .val(-1)
                    ;
            $('#comarca').trigger("chosen:updated");
            $('#obs').val('');
            $('.oculto').remove();
            $('#mdCadastro').unbind('seleciona');
        });
        $('#mdArquivo').on('hidden.bs.modal', function () {
            $('#data').val('');
            $('#obs').val('');
        });
        leProcessos();
    });
    function leProcessos() {
        $.ajax({
            url: local + 'api/processos_ativos',
            dataType: "json",
            beforeSend: function (xhr) {
                $('#mdCarregando').modal('show');
            },
            success: preencheTabela,
            complete: function (jqXHR, textStatus) {
                $('#mdCarregando').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                mensagem(jqXHR.statusText, errorThrown);
            }
        });
    }

    function preencheTabela(listaProcessos) {
//limpa a tabela
        $('#tabelaProcessos div').remove();
//cria nova estrutura da tabela
        $('<tr>').attr({
            id: 'tb-head'
        }).appendTo($('<thead>').appendTo(
                $('<table>').attr({
            class: 'table table-hover table-condensed',
            id: 'tb-processos'
        }).appendTo('#tabelaProcessos')));
        $('<th>').attr({
            class: 'text-center'
        }).html('Pasta').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('N Autos').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Cliente').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Parte contrária').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Comarca').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Vara').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ação').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Advogado').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Observações').appendTo('#tb-head');
//        $('<th>').attr({
//            class: 'text-center'
//        }).html('Status').appendTo('#tb-head');
        $('<th>').attr({
            class: 'text-center'
        }).html('Ações').appendTo('#tb-head');
        $('<tboby>').appendTo('#tabelaProcessos');
        //preenche a tabela com os dados recebidos
        for (var i = 0; i < listaProcessos.length; i++) {
            newRow = '<tr id=\"' + listaProcessos[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaProcessos[i]['id'] + '</td>';
            cols += '<td>' + listaProcessos[i]['autos'] + '</td>';
            cols += '<td>' + listaProcessos[i]['cliente'] + '</td>';
            cols += '<td>' + listaProcessos[i]['partecontraria'] + '</td>';
            cols += '<td>' + listaProcessos[i]['comarca'] + '</td>';
            cols += '<td>' + listaProcessos[i]['vara'] + '</td>';
            cols += '<td>' + listaProcessos[i]['acaotipo'] + '</td>';
            cols += '<td>' + listaProcessos[i]['advogado'] + '</td>';
            cols += '<td>' + listaProcessos[i]['obs'] + '</td>';
            var st = 'Andamento';
            var icone = 'fa-download';
            if (listaProcessos[i]['isarquivado']) {
                st = 'Arquivado';
                icone = 'fa-upload';
            }
//            cols += '<td>' + st + '</td>';
            cols += '<td>' +
                    '<a href="javascript:editar(' + listaProcessos[i]['id'] + ')" title="Editar" class="btn btn-default">' +
                    '<i class="fa fa-edit fa-fw"></i></a>' +
                    '<a href="javascript:imprimeEtiqueta(' + listaProcessos[i]['id'] + ')" title="Imprime etiqueta" class="btn btn-default">' +
                    '<i class="fa fa-print fa-fw"></i></a>' +
                    '   <a href="javascript:alterarStatus(' + listaProcessos[i]['id'] + ',' + !listaProcessos[i]['isarquivado'] + ')" title="Arquivar" class="btn btn-default">' +
                    '<i class="fa ' + icone + ' fa-fw"></i></a>' +
                    '</td>';
            newRow.append(cols);
            $("#tb-processos").append(newRow);
        }
        $('#tb-processos').DataTable();
    }

    function enviaCadastro(e) {
        dados = $(this).serialize();
        $.ajax({
            url: local + 'api/processo',
            type: 'post',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                leProcessos(data);
                $('#mdCadastro').modal('hide');
                mensagem(jqXHR.statusText, jqXHR.responseText);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function editar(id) {
        $.ajax({
            url: local + 'api/processos_ativos/' + id,
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('show');
                $('#mdCadastro').on('seleciona', function () {
                    $('#cliente').val(data["clienteid"]).trigger("chosen:updated");
                    $('#advogado').val(data["advogadoid"]).trigger("chosen:updated");
                    $('#acaotipo').val(data["acaotipoid"]).trigger("chosen:updated");
                    $('#comarca').val(data["comarcaid"]).trigger("chosen:updated");
                });


                $('#autos').val(data["autos"]);
                $('#partecontraria').val(data["partecontraria"]);
                $('#vara').val(data["vara"]);
                $('#obs').val(data["obs"]);
                $('<input>').attr({
                    class: 'oculto',
                    type: 'hidden',
                    id: 'id',
                    name: 'id',
                    value: id
                }).appendTo('#formCadastro');
                $('#formCadastro').unbind('submit');
                $('#formCadastro').submit(enviaEdicao);
                $('#mdCadastroTitulo').html('Editar processo');
                $('#botaoEnviaCadastro').html('Editar');
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
            url: local + 'api/processo/' + id,
            type: 'put',
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $('#mdCadastro').modal('hide');
                leProcessos();
                mensagem(jqXHR.statusText, jqXHR.responseText);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                mensagem(jqXHR.statusText, jqXHR.responseText);
            }
        });
        return false;
    }

    function alterarStatus(id, status) {

        var msg = 'Desarquivar o processo';
        if (status) {
            msg = 'Arquivar o processo';
        }

        $('#data').datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true
        });
        var currentDate = new Date();
        $("#data").datepicker("setDate", currentDate);

        $('#mdArquivoTitulo').html(msg);
        $('#mdArquivo').modal('show');
        $('#formArquivo').unbind('submit');
        $('#formArquivo').submit(function () {
            var dados = $(this).serialize();
            confirm(msg, 'Deseja ' + msg + '?', function (res) {
                if (res) {
                    dados += '&processo=' + id + '&tipo=' + status;
                    $.ajax({
                        url: local + 'api/arquivo',
                        type: 'post',
                        data: dados,
                        success: function (data, textStatus, jqXHR) {
                            $('#mdArquivo').modal('hide');
                            leProcessos();
                            mensagem(jqXHR.statusText, jqXHR.responseText);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            mensagem(jqXHR.statusText, errorThrown);
                        }
                    });
                }
            });
            return false;
        });
    }

    function imprimeEtiqueta(id) {
        $('<input>').attr({
            class: 'oculto',
            type: 'hidden',
            id: 'id',
            name: 'id',
            value: id
        }).appendTo('#formImprime');

        $('#mdImprime').modal('show');
    }
</script>
@endsection
