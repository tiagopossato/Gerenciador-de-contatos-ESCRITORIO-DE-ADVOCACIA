@extends('layouts.mdCadastro')
@section('form')

<div class="form-group">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="cliente" class="control-label">Cliente</label>
        </div>
        <div class="col-sm-12">
            <select class="form-control" id="cliente" name="cliente">
                <option value=-1>Selecione</option>
                <!--aqui vem as options com os nomes das cidades, preenchida
                    pelo javascript na inicialização do modal-->
            </select>
        </div> 
    </div>
    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="autos" class="control-label">N Autos</label>
        </div>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="autos" 
                   name="autos" 
                   >
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <div class="col-sm-12">
            <label for="partecontraria" class="control-label">Parte Contrária</label>
        </div>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="partecontraria" 
                   name="partecontraria" 
                   >
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="comarca" class="control-label">Comarca</label>
        </div>
        <div class="col-sm-12">
            <select class="form-control" id="comarca" name="comarca">
                <option value=-1>Selecione</option>
                <!--aqui vem as options com os nomes das cidades, preenchida
                    pelo javascript na inicialização do modal-->
            </select>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="vara" class="control-label">Vara</label>
        </div>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="vara" 
                   name="vara" 
                   >
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="advogado" class="control-label">Advogado</label>
        </div>
        <div class="col-sm-12">
            <select class="form-control" id="advogado" name="advogado">
                <option value=-1>Selecione</option>
                <!--aqui vem as options com os nomes das cidades, preenchida
                    pelo javascript na inicialização do modal-->
            </select>
        </div> 
    </div>
    <div class="col-sm-6">
        <div class="col-sm-12">
            <label for="acaotipo" class="control-label">Ação</label>
        </div>
        <div class="col-sm-12">
            <select class="form-control" id="acaotipo" name="acaotipo">
                <option value=-1>Selecione</option>
                <!--aqui vem as options com os nomes das cidades, preenchida
                    pelo javascript na inicialização do modal-->
            </select>
        </div> 
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
@endsection