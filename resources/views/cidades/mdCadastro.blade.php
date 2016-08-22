@extends('layouts.mdCadastro')
@section('form')
<div class="form-group">
    <div class="col-sm-12">
        <label for="nome" class="control-label">Nome</label>
    </div>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="nome"
               name="nome" 
               required=""
               >
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <label for="uf" class="control-label">Unidade da Federação</label>
    </div>
    <div class="col-sm-12">
        <select class="form-control" id="uf" name="uf">
            <option>AC</option>
            <option>AL</option>  
            <option>AM</option> 
            <option>BA</option> 
            <option>CE</option> 
            <option>DF</option> 
            <option>ES</option> 
            <option>GO</option> 
            <option>MA</option> 
            <option>MT</option> 
            <option>MS</option> 
            <option>MG</option> 
            <option>PA</option>
            <option>PB</option>  
            <option>PR</option>  
            <option>PE</option>  
            <option>PI</option>  
            <option>RJ</option>  
            <option>RN</option>  
            <option>RS</option>  
            <option>RO</option>  
            <option>RR</option>  
            <option>SC</option>  
            <option>SP</option>  
            <option>SE</option>  
            <option>TO</option>  
        </select>
    </div>
</div>
@endsection
