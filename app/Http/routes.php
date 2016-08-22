<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//
Route::group(['prefix' => '/'], function() {

// rotas das API's
    Route::group(['prefix' => 'api'], function() {

        Route::group(['prefix' => 'user'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'UserController@allUsers'
            ]);

            Route::get('me', ['middleware' => 'auth',
                'uses' => 'UserController@getMe'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'UserController@getUser']);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'UserController@saveUser']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'UserController@updateUser']);

//            Route::delete('{id}', ['middleware' => 'auth',
//                'uses' => 'UserController@deleteUser']);
        });

        Route::group(['prefix' => 'advogado'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'AdvogadoController@allAdvogados'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'AdvogadoController@getAdvogado']);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'AdvogadoController@saveAdvogado']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'AdvogadoController@updateAdvogado']);
        });

        Route::group(['prefix' => 'cidade'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'CidadeController@allCidades'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'CidadeController@getCidade']);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'CidadeController@saveCidade']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'CidadeController@updateCidade']);
        });


        Route::group(['prefix' => 'clientes_ativos'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'Cliente\ClientesativoController@allClientes'
            ]);
        });


        Route::group(['prefix' => 'clientes_inativos'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'Cliente\ClientesinativoController@allClientes'
            ]);
        });


        Route::group(['prefix' => 'cliente'], function() {

//            Route::get('', ['middleware' => 'auth',
//                'uses' => 'Cliente\ClientesativoController@allClientes'
//            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'Cliente\ClientedetalheController@getCliente']);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'Cliente\ClienteController@saveCliente']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'Cliente\ClienteController@updateCliente']);
        });




        Route::group(['prefix' => 'tipodeacao'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'AcaotipoController@allAcaotipos'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'AcaotipoController@getAcaotipo']);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'AcaotipoController@saveAcaotipo']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'AcaotipoController@updateAcaotipo']);
        });

        Route::group(['prefix' => 'processos_ativos'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoativoController@allProcessos'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoativoController@getProcesso']);
        });

        Route::group(['prefix' => 'processos_arquivados'], function() {

            Route::get('', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoarquivadoController@allProcessos'
            ]);

            Route::get('{id}', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoarquivadoController@getProcesso']);
        });


        Route::group(['prefix' => 'processo'], function() {

            Route::post('', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoController@saveProcesso']);

            Route::put('{id}', ['middleware' => 'auth',
                'uses' => 'Processo\ProcessoController@updateProcesso']);

            Route::group(['prefix' => 'imprime'], function() {
                Route::post('', ['middleware' => 'auth',
                    'uses' => 'Processo\ProcessoImprime@imprimeProcesso']);
            });
        });


//fim dos processos

        Route::group(['prefix' => 'arquivo'], function() {
            Route::get('', ['middleware' => 'auth',
                'uses' => 'ArquivoController@allArquivos'
            ]);

            Route::post('', ['middleware' => 'auth',
                'uses' => 'ArquivoController@saveArquivo'
            ]);
        });
    });

//    Rotas para autenticação
    Route::group(['prefix' => 'auth'], function() {
// Authentication routes...
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });

//Rotas para usuarios
    Route::get('usuarios', ['middleware' => 'auth.role:admin',
        //somente administradores tem acesso a esta área
        'uses' => 'UserController@index'
    ]);

//Rotas para advogados
    Route::get('advogados', ['middleware' => 'auth',
        //somente usuarios logados tem acesso a esta área
        'uses' => 'AdvogadoController@index'
    ]);
//Rotas para cidades
    Route::get('cidades', ['middleware' => 'auth',
        //somente usuarios logados tem acesso a esta área
        'uses' => 'CidadeController@index'
    ]);

//Rotas para clientes
//    Route::get('clientes', ['middleware' => 'auth',
//        //somente usuarios logados tem acesso a esta área
//        'uses' => 'Cliente\ClienteController@index'
//    ]);

    Route::group(['prefix' => 'clientes_ativos'], function() {

        Route::get('', ['middleware' => 'auth',
            'uses' => 'Cliente\ClientesativoController@index'
        ]);
    });

    Route::group(['prefix' => 'clientes_inativos'], function() {

        Route::get('', ['middleware' => 'auth',
            'uses' => 'Cliente\ClientesinativoController@index'
        ]);
    });




//Rotas para tipo de acao
    Route::get('tipodeacao', ['middleware' => 'auth',
        //somente usuarios logados tem acesso a esta área
        'uses' => 'AcaotipoController@index'
    ]);


//Rota para processo

    Route::group(['prefix' => 'processos_ativos'], function() {

        Route::get('', ['middleware' => 'auth',
            'uses' => 'Processo\ProcessoativoController@index'
        ]);
    });

    Route::group(['prefix' => 'processos_arquivados'], function() {

        Route::get('', ['middleware' => 'auth',
            'uses' => 'Processo\ProcessoarquivadoController@index'
        ]);
    });

//    Route::get('processos', ['middleware' => 'auth',
//        //somente usuarios logados tem acesso a esta área
//        'uses' => 'Processo\ProcessoController@index'
//    ]);
//    Rotas gerais
    Route::get('', 'Auth\AuthController@getLogin');

    Route::get('home', ['middleware' => 'auth',
        'uses' => 'HomeController@index']);


    Route::get('dashboard', ['middleware' => 'auth.role:admin',
        //somente administradores tem acesso a esta área
        function () {
            return View::make('dashboard');
        }]);
});
