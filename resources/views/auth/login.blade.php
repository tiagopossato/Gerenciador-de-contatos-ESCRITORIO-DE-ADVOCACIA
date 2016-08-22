@extends('layouts.master')
@section('title', 'Login')
@section('content')
<!--MODAL LOGIN-->
<div class="modal fade " data-keyboard="false" data-backdrop="static" id="mdLogin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="/auth/login" class="form-horizontal" id="formLogin" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" 
                                       id="email" name="email" 
                                       required="" 
                                       aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha" name="password" required="" placeholder="********">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="login" class="btn btn-primary col-sm-offset-3 col-sm-5">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scriptLocal')
<script>
    $('#mdLogin').modal('show');
</script>
@endsection