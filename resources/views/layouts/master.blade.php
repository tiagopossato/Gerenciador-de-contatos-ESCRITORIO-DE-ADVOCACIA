<!-- Stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!--Estilo -->
        <link rel="stylesheet" href="../assets/css/estilo.css" type="text/css"/>

        <!--data table-->
        <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <!--chosen.css-->
        <link href="../assets/css/chosen.css" rel="stylesheet"/>

        <link href="../assets/css/jquery-ui.css" rel="stylesheet"/>
        <script>
//            var local = window.location.host + '/';
            var local = '';
            var DEBUG = true;
        </script>

    </head>
    <body>
        <!--Navigation-->
        <!-- Fixed navbar -->
        <div id="wrapper">
            <!--verifica se algum usuário está logado-->
            @unless (!Auth::check())
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="bordaMenu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">-->
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="home">Amarante e Amarante</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

<!--                            <li><a href="#"><i class="fa fa-legal fa-fw"></i>Processos</a></li>
<li><a href="dashboard"><i class="fa fa-dashboard fa-fw"></i>Painel de Controle</a></li>-->

                            <!--/.dropdown Processos --> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-file-text-o fa-fw"></i>
                                    Processos
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="processos_ativos"><i class="fa fa-search fa-fw"></i>Ativos</a>
                                    </li>
                                    <li><a href="processos_arquivados"><i class="fa fa-search fa-fw"></i>Arquivados</a>
                                    </li>
                                    @yield('menuProcessos')
                                </ul>
                            </li>
                            <!--/.dropdown Processos -->


                            <!--/.dropdown Clientes--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-users fa-fw"></i>
                                    Clientes
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="clientes_ativos"><i class="fa fa-search fa-fw"></i>Ativos</a>
                                    </li>
                                    <li><a href="clientes_inativos"><i class="fa fa-search fa-fw"></i>Inativos</a>

                                    </li>
                                    @yield('menuCliente')
                                </ul>
                            </li>
                            <!--/.dropdown Clientes -->

                            <!--/.dropdown Advogados--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-graduation-cap fa-fw"></i>
                                    Advogados
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="advogados"><i class="fa fa-search fa-fw"></i>Todos</a>
                                    </li>
                                    @yield('menuAdvogado')
                                </ul>
                            </li>
                            <!--/.dropdown Advogados -->
                            <!--/.dropdown Tipo de acao--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-file-text-o fa-fw"></i>
                                    Tipo de Ação
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="tipodeacao"><i class="fa fa-search fa-fw"></i>Todos</a>
                                    </li>
                                    @yield('menuTipodeacao')
                                </ul>
                            </li>
                            <!--/.dropdown Tipo de acao -->
                            <!--/.dropdown Cidades--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-map-marker fa-fw"></i>
                                    Cidades
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="cidades"><i class="fa fa-search fa-fw"></i>Todas</a>
                                    </li>
                                    @yield('menuCidade')
                                </ul>
                            </li>
                            <!--/.dropdown Cidades -->
                            @unless (Auth::user()->role <> 'admin')
                            <!--/.dropdown Usuarios--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i>
                                    Usuários
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="usuarios"><i class="fa fa-search fa-fw"></i>Todos</a>
                                    </li>
                                    @yield('menuUsuario')
                                </ul>
                            </li>
                            <!--/.dropdown Usuarios -->
                            @endunless
                            <!--/.dropdown user--> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-power-off fa-fw"></i>
                                    {{{ isset(Auth::user()->nome) ? Auth::user()->nome : Auth::user()->email }}}
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#"
                                           data-toggle="modal"
                                           data-target="#mdPerfil"
                                           ><i class="fa fa-user fa-fw"></i>Perfil</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="auth/logout"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                                    </li>
                                </ul>
                            </li>
                            <!--/.dropdown-user -->
                        </ul>
                    </div><!--/.nav-collapse--> 
                </div>
            </nav>
            @endunless
            <!--fim do menu-->
            <div id="page-wrapper" class='bordaGeral'>
                @yield('content')
            </div>
        </div>
        @yield('modais')
        <script src="../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src='../assets/js/bootbox.js'></script>
        <script src='../assets/js/mdMensagem.js'></script>
        <script src="../assets/js/chosen.jquery.js" type="text/javascript"></script>
        <script src="../assets/js/jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
        </script>
        @yield('scriptLocal')
        @include('usuarios.mdPerfil')
    </body>
</html>
