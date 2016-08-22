<?php

namespace App\Http\Middleware;

use Closure;
use Input;
use Response;

class VerificaCPF {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $input = Input::all();
        if (isset($input['cpf']) && strlen($input['cpf']) > 2) {

            $entrada = $input['cpf'];
// Verifica se um número foi informado
            if (empty($entrada)) {
                return Response::json('CPF Invalido', 412);
            }

// Elimina possivel mascara

            $c = preg_replace('/\D+/', '', $entrada);
            $cpf = str_pad($c, 11, '0', STR_PAD_LEFT);

// Verifica se o numero de digitos informados é igual a 11 
            if (strlen($cpf) != 11) {
                return Response::json('CPF Invalido', 412);
            }
// Verifica se nenhuma das sequências invalidas abaixo 
// foi digitada. Caso afirmativo, retorna falso
            else if ($cpf == '00000000000' ||
                    $cpf == '11111111111' ||
                    $cpf == '22222222222' ||
                    $cpf == '33333333333' ||
                    $cpf == '44444444444' ||
                    $cpf == '55555555555' ||
                    $cpf == '66666666666' ||
                    $cpf == '77777777777' ||
                    $cpf == '88888888888' ||
                    $cpf == '99999999999') {
                return Response::json('CPF Invalido', 412);
// Calcula os digitos verificadores para verificar se o
// CPF é válido
            } else {
                for ($t = 9; $t < 11; $t++) {
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                        return Response::json('CPF Invalido', 412);
                    }
                }
            }
        }
        return $next($request);
    }

}
