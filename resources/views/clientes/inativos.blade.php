@extends('layouts.master')
@section('title', 'Clientes Inativos')
{{--
@section('menuCliente')
    <li>
    <a href="#"
       data-toggle="modal"
       data-target="#mdCadastro"
       ><i class="fa fa-plus fa-fw"></i>Novo</a>
</li>
@endsection
--}}

@section('content')
<div id = "tabelaClientes">
    <div>
        <!--aqui vem a tabela de clientes-->
    </div>
</div>

@endsection
@section('modais')
{{--@include('clientes.mdCadastro')--}}
@include('layouts.mdCarregando')
@include('layouts.mdMensagem')
@endsection

@section('scriptLocal')
<script>
    $(document).ready(function () {

    {{-- ATENÇÃO, COMENTADO USANDO O METODO DO BLADE
            $('#mdCadastroTitulo').html('Cadastro de cliente');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#formCadastro').submit(enviaCadastro);
            //altera o tamanho do modal
            $('#mdCadastroTamanho').removeClass("modal-dialog modal-sm").addClass("modal-dialog modal-lg");
            //atribui evento quando o modal é aberto
            $('#mdCadastro').on('show.bs.modal', function () {
    //preenche a lista de cidades no modal de cadastro
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
                    $("#cidade").append(newOption);
            }
            }
            $('#telefone').mask("(99) 99999999 ? R: 9999");
                    $('#celular').mask("(99) 99999999?9");
                    $('#cpf').mask("999.999.999-99");
                    $("#cidade")
                    .chosen({
                    width: '100%',
                            disable_search_threshold: 4,
                            no_results_text: "Oops, não encontrado: ",
                            search_contains: true
                    });
                    $('#cidade').trigger("chosen:updated");
                    $('#mdCadastro').trigger('seleciona');
                    $("#estadocivil")
                    .chosen({
                    width: '100%',
                            no_results_text: "Oops, não encontrado: ",
                            search_contains: true
                    });
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
            $('#mdCadastroTitulo').html('Cadastro de cliente');
            $('#botaoEnviaCadastro').html('Cadastrar');
            $('#nome').val('');
            $('#estadocivil').val(0);
            $('#endereco').val('');
            $('#bairro').val('');
            $('#cidade')
            .find('option')
            .remove()
            .end()
            .append('<option value="-1">Selecione</option>')
            .val( - 1)
            ;
            $('#cidade').trigger("chosen:updated");
            $('#telefone').val('');
            $('#celular').val('');
            $('#identidade').val('');
            $('#cpf').val('');
            $('#email').val('');
            $('#obs').val('');
            $('.oculto').remove();
            $('#mdCadastro').unbind('seleciona');
    });
            FIM DO COMENTÁRIO --}}

    leClientes();
    });
            function leClientes() {
            $.ajax({
            url: local + 'api/clientes_inativos',
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

    function preencheTabela(listaClientes) {
//limpa a tabela
    $('#tabelaClientes div').remove();
//cria nova estrutura da tabela
            $('<tr>').attr({
    id: 'tb-head'
    }).appendTo($('<thead>').appendTo(
            $('<table>').attr({
    class: 'table table-hover table-condensed',
            id: 'tb-clientes'
    }).appendTo('#tabelaClientes')));
            $('<th>').attr({
    class: 'text-center'
    }).html('Nome').appendTo('#tb-head');
            $('<th>').attr({
    class: 'text-center'
    }).html('Endereco').appendTo('#tb-head');
            $('<th>').attr({
    class: 'text-center'
    }).html('Telefone').appendTo('#tb-head');
            $('<th>').attr({
    class: 'text-center'
    }).html('Celular').appendTo('#tb-head');
//        $('<th>').attr({
//            class: 'text-center'
//        }).html('Status').appendTo('#tb-head');
            $('<th>').attr({
    class: 'text-center'
    }).html('Ações').appendTo('#tb-head');
            $('<tboby>').appendTo('#tabelaClientes');
            //preenche a tabela com os dados recebidos
            for (var i = 0; i < listaClientes.length; i++) {
    newRow = '<tr id=\"' + listaClientes[i]['id'] + '\" class=\"text-center\">';
            var newRow = $(newRow);
            var cols = "";
            cols += '<td>' + listaClientes[i]['nome'] + '</td>';
            cols += '<td>' + listaClientes[i]['endereco'] + ', ' +
            listaClientes[i]['bairro'] +
            ', ' + listaClientes[i]['cidade'] + '</td>';
            cols += '<td>' + listaClientes[i]['telefone'] + '</td>';
            cols += '<td>' + listaClientes[i]['celular'] + '</td>';
            var st = 'Inativo';
            var icone = 'fa-eye';
            if (listaClientes[i]['isativo']) {
    st = 'Ativo';
            icone = 'fa-eye-slash';
    }
//            cols += '<td>' + st + '</td>';
    cols += '<td>' +
//                    '<a href="javascript:editar(' + listaClientes[i]['id'] + ')" title="Editar" class="btn btn-default">' +
//                    '<i class="fa fa-edit fa-fw"></i></a>' +
            '   <a href="javascript:alterarStatus(' + listaClientes[i]['id'] + ',' + !listaClientes[i]['isativo'] + ')" title="Editar" class="btn btn-default">' +
            '<i class="fa ' + icone + ' fa-fw"></i></a>' +
            '</td>';
            newRow.append(cols);
            $("#tb-clientes").append(newRow);
    }
    $('#tb-clientes').DataTable();
    }

    function enviaCadastro(e) {
    if ($('#cpf').val().length === 0) {
    $('#cpf').val(" ");
    }
    dados = $(this).serialize();
            $.ajax({
            url: local + 'api/cliente',
                    type: 'post',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                    leClientes(data);
                            $('#mdCadastro').modal('hide');
                            mensagem(jqXHR.statusText, jqXHR.responseText);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, jqXHR.responseText);
                    }
            });
            return false;
    }


    {{-- ATENÇÃO, COMENTADO USANDO O METODO DO BLADE
            function editar(id) {
            $.ajax({
            url: local + 'api/cliente/' + id,
                    type: 'get',
                    success: function (data, textStatus, jqXHR) {
                    $('#mdCadastro').modal('show');
                            //atribui evento para selecionar a cidade após o preenchimento
                            // das options do select
                            $('#mdCadastro').on('seleciona', function () {
                    $('#cidade').val(data["cidadeid"]).trigger("chosen:updated");
                    });
                            $('#nome').val(data["nome"]);
                            $('#estadocivil').val(data["estadocivil"]).trigger("chosen:updated");
                            $('#endereco').val(data["endereco"]);
                            $('#bairro').val(data["bairro"]);
                            $('#telefone').val(data["telefone"]);
                            $('#celular').val(data["celular"]);
                            $('#identidade').val(data["identidade"]);
                            $('#cpf').val(data["cpf"]);
                            $('#email').val(data["email"]);
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
                            $('#mdCadastroTitulo').html('Editar cliente');
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
            url: local + 'api/cliente/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                    $('#mdCadastro').modal('hide');
                            leClientes();
                            mensagem(jqXHR.statusText, jqXHR.responseText);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    mensagem(jqXHR.statusText, jqXHR.responseText);
                    }
            });
            return false;
    }
    FIM DO COMENTARIO --}}


    function alterarStatus(id, status) {
    var msg = 'Deseja desativar o cliente?';
            if (status) {
    msg = 'Deseja ativar o cliente?';
    }
    confirm('Alteração de status', msg, function (res) {
    if (res) {
    var CSRF_TOKEN = '<?php echo csrf_token(); ?>';
            var dados = '_token=' + CSRF_TOKEN + '&isativo=' + status;
            //console.log(dados);
            $.ajax({
            url: local + 'api/cliente/' + id,
                    type: 'put',
                    data: dados,
                    success: function (data, textStatus, jqXHR) {
                    leClientes();
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
