<!--MODAL DADOS-->
<div class="modal fade" id="mdCadastro" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdCadastroTitulo">Cadastro de usuário</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" class="form-horizontal" id="formCadastro">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="nome" class="control-label">Nome</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nome"
                                   name="nome" 
                                   required=""
                                   pattern="[a-zA-Z\s]+$"
                                   title="Nome composto somente de letras, sem acentuação"
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="email" class="control-label">Email</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" 
                                   name="email" 
                                   placeholder="exemplo@gmail.com" 
                                   pattern="[a-z0-9._%+-]+[@gmail.com]+"
                                   title="preencha o e-mail corretamente, utilize uma conta do gmail"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="password" class="control-label">Senha</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" 
                                   id="password" 
                                   name="password" 
                                   required="" 
                                   pattern="^.{6,555}$"
                                   title="A senha deve conter ao menos 6 caracteres!"
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox col-sm-12">
                            <label><input type="checkbox" name="role" id="role" value=1>Administrador</label>
                        </div>
                    </div>
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
