@extends('layouts.master')
@section('title', 'Inicio')
@section('content')
<!--<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-5">
                        <i class="fa fa-user fa-2x">
                            <i class="fa fa-wifi fa-rotate-90"></i>
                        </i>
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <div class="col-xs-7 text-right">
                        <div class="huge" id="numeroAudiencias">26</div>
                        <div>Audiencias hoje</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>-->
<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-legal fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{App\Processoativo::count()}}</div>
                    <div>Processos em andamento</div>
                </div>
            </div>
        </div>
        <a href="processos_ativos">
            <div class="panel-footer">
                <span class="pull-left">Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{App\Clientesativo::count()}}</div>
                    <div>Clientes ativos!</div>
                </div>
            </div>
        </div>
        <a href="clientes_ativos">
            <div class="panel-footer">
                <span class="pull-left">Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>
@endsection

