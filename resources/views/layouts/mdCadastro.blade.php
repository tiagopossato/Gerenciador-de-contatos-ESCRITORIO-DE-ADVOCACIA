<!--MODAL CADASTRO-->
<div class="modal fade" id="mdCadastro" role="dialog" tabindex='-1'>
    <div id="mdCadastroTamanho" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mdCadastroTitulo">titulo</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" class="form-horizontal" id="formCadastro">
                    {!! csrf_field() !!}
                    @yield('form')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="botaoEnviaCadastro" class="btn btn-primary col-sm-12">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
