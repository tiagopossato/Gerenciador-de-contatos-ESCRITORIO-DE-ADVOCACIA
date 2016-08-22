@extends('layouts.mdCadastro')
@section('form')
<div class="form-group">
    <div class="col-sm-12">
        <label for="tipo" class="control-label">Tipo</label>
    </div>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="tipo"
               name="tipo" 
               required=""
               >
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
