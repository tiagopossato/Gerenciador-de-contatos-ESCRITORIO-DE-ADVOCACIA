<!--MODAL DADOS-->
<div class="modal fade" id="mdPerfil" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alteração de dados</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" class="form-horizontal" id="formPerfil">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="nome" class="control-label">Nome</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nomePerfil"
                                   name="nome" 
                                   required=""
                                   pattern="[a-zA-Z\s]+$"
                                   title="Nome composto somente de letras, sem acentuação"
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="password" class="control-label">Senha</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" 
                                   id="passwordPerfil" 
                                   name="password" 
                                   pattern="^.{6,555}$"
                                   title="A senha deve conter ao menos 6 caracteres!"
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="botaoEnviaPerfil" class="btn btn-primary col-sm-12">Alterar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#mdPerfil').on('show.bs.modal', function () {
        $.ajax({
            url: local + 'api/user/me',
            type: 'get',
            success: function (data, textStatus, jqXHR) {
                $('#nomePerfil').val(data["nome"]);
                $('#emailPerfil').val(data["email"]);
                $('#passwordPerfil').val('');
                $('<input>').attr({
                    class: 'oculto',
                    type: 'hidden',
                    id: 'id',
                    name: 'id',
                    value: data["id"]
                }).appendTo('#formPerfil');
                $('#formPerfil').unbind('submit');
                $('#formPerfil').submit(function () {
                    dados = $(this).serialize();
                    id = $('input:hidden[name=id]').val();
                    $.ajax({
                        url: local + 'api/user/' + id,
                        type: 'put',
                        data: dados + '&active=1',
                        success: function (data, textStatus, jqXHR) {
                            $('#mdPerfil').modal('hide');
                            //mensagem(jqXHR.statusText, jqXHR.responseText);
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $('#mdPerfil').modal('hide');
                            mensagem(jqXHR.statusText, errorThrown);
                        }
                    });
                    return false;
                });
            }
        });
    });
</script>