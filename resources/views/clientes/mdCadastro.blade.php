@extends('layouts.mdCadastro')
@section('form')

<div class="form-group">
    <div class="col-sm-12">
        <div class=" col-sm-8">
            <div class="col-sm-12">
                <label for="nome" class="control-label">Nome *</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nome" 
                       name="nome" 
                       required=""
                       >
            </div>
        </div>

        <div class="col-sm-4">
            <div class="col-sm-12">
                <label for="estadocivil" class="control-label">Estado Civil</label>
            </div>
            <div class="col-sm-12">
                <select class="form-control" id="estadocivil" name="estadocivil">
                    <option>NAO_INFORMADO</option>
                    <option>SOLTEIRO</option>
                    <option>CASADO</option>  
                    <option>DIVORCIADO</option> 
                    <option>VIUVO</option> 
                    <option>OUTRO</option> 
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <label for="endereco" class="control-label">Endereço</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="endereco"
                       name="endereco" 
                       >
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class=" col-sm-6">
            <div class="col-sm-12">
                <label for="bairro" class="control-label">Bairro</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="bairro"
                       name="bairro" 
                       >
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <label for="cidade" class="control-label">Cidade*</label>
            </div>
            <div class="col-sm-12">
                <select class="form-control" id="cidade" name="cidade">
                    <option value=-1>Selecione</option>
                    <!--aqui vem as options com os nomes das cidades, preenchida
                        pelo javascript na inicialização do modal-->
                </select>
            </div> 
        </div>
    </div>

    <div class="col-sm-12">
        <div class=" col-sm-6">
            <div class="col-sm-12">
                <label for="telefone" class="control-label">Telefone *</label>
            </div>
            <div class="col-sm-12">
                <input type="tel" class="form-control" id="telefone"
                       name="telefone"
                       required=""
                       placeholder="(__) ________  R: ____"
                       >

            </div>
        </div>


        <div class=" col-sm-6">
            <div class="col-sm-12">
                <label for="celular" class="control-label">Celular</label>
            </div>
            <div class="col-sm-12">
                <input type="tel" class="form-control" id="celular"
                       name="celular"
                       placeholder="(__) _________"
                       >
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class=" col-sm-6">
            <div class="col-sm-12">
                <label for="identidade" class="control-label">Identidade</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="identidade"
                       name="identidade"
                       >
            </div>
        </div>

        <div class=" col-sm-6">
            <div class="col-sm-12">
                <label for="cpf" class="control-label">CPF</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="cpf"
                       name="cpf"
                       placeholder="___.___.___-__"
                       >
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <label for="email" class="control-label">E-mail</label>
            </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="email"
                       name="email"
                       >
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-12">
                <label for="obs" class="control-label">Observações</label>
            </div>
            <div class="col-sm-12">
                <textarea class="form-control" rows="2"  id="obs"
                          name="obs"></textarea>
            </div>
        </div>
    </div>
</div>
@endsection