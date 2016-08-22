<!--MODAL ARQUIVO-->
<div class="modal fade" id="mdArquivo" role="dialog" tabindex='-1'>
    <div id="mdArquivoTamanho" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mdArquivoTitulo">Arquivar Processo</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" class="form-horizontal" id="formArquivo">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="data" class="control-label">Data</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="data" name="data" 
                                   pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                   required="" title="Data no formato dd/mm/aaaa">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="obs" class="control-label">Observações</label>
                        </div>
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="2"  id="obs"
                                      name="obs"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="botaoEnviaArquivo" class="btn btn-primary col-sm-12">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>