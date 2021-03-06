<?php

namespace App\Http\Controllers\Processo;

use App;
use App\Http\Controllers\Controller;
use App\Processoativo;
use Input;

//use Response;

class ProcessoImprime extends Controller {

    public function __construct(Processoativo $processo) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        $this->proc = $processo;
    }

    public function imprimeProcesso() {
        $input = Input::all();
        $proc = $this->proc->getProcesso($input['id']);
        $posicao = $input['pos'];
        switch ($posicao) {
            case 1:
                $left = 3;
                $top = 21;
                break;
            case 2:
                $left = 112.6;
                $top = 21;
                break;
            case 3:
                $left = 3;
                $top = 55;
                break;
            case 4:
                $left = 112.6;
                $top = 55;
                break;
            case 5:
                $left = 3;
                $top = 88;
                break;
            case 6:
                $left = 112.6;
                $top = 88;
                break;
            case 7:
                $left = 3;
                $top = 128;
                break;
            case 8:
                $left = 112.6;
                $top = 128;
                break;
            case 9:
                $left = 3;
                $top = 157;
                break;
            case 10:
                $left = 112.6;
                $top = 157;
                break;
            case 11:
                $left = 3;
                $top = 190;
                break;
            case 12:
                $left = 112.6;
                $top = 190;
                break;
            case 13:
                $left = 3;
                $top = 224;
                break;
            case 14:
                $left = 112.6;
                $top = 224;
                break;
            default :
                $left = 3;
                $top = 21;
                break;
        }
        // $html = '<style>html{	margin: 0;	padding: 0;	border:0;}' . ///* HTML5 display-role reset for older browsers */article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block;}body {	line-height: 1;}ol, ul {	list-style: none;}blockquote, q {	quotes: none;}blockquote:before, blockquote:after,q:before, q:after {	content: \'\';	content: none;}</style>'.
        //         'body{margin-left: ' . $left . 'mm; margin-top: ' . $top . 'mm;}'.
        //         'table{width: 66mm; height: 25mm;}</style>' .
        //         '<table style="border: 1px solid black;">' .
        //         '<thead><tr><th colspan="2"><h1>Pasta N<sup>o</sup>: ' . $proc['id'] . '</h1></th></tr></thead>' .
        //         '<tbody><tr>' .
        //         '<td colspan="2"><hr></td>' .
        //         '</tr><tr>' .
        //         '<td valign=top><b>Cliente</b></td><td valign=top> ' . $proc['cliente'] . '</td>' .
        //         '</tr><tr>' .
        //         '<td valign=top><b>Advogado</b></td><td valign=top>' . $proc['advogado'] . '</td>' .
        //         '</tr><tr>' .
        //         '<td valign=top><b>Parte Contrária</b></td><td valign=top> ' . $proc['partecontraria'] . '</td>' .
        //         '</tr><tr>' .
        //         '<td valign=top><b>Ação</b></td><td valign=top>' . $proc['acaotipo'] . '</td>' .
        //         '</tr></tbody></table>';

        $html = '<style>html{margin: 0;padding: 0;border:0;}'.
                '	body{margin-left:' . $left . 'mm;margin-top: ' . $top . 'mm;}'.
                '	.etiqueta {/*border:1px solid black; */width: 101mm;height: 33mm;margin: 0;padding: 0;}'.
                '</style>'.
                '<body><div class="etiqueta">'.
                '		<div style="text-align: center;"><h1>Pasta N<sup>o</sup>: ' . $proc['id'] . '</h1></div>'.
//                '		<hr>'.
                '		<div style="text-align: left;"><b>Cliente:&nbsp;</b><span>' . $proc['cliente'] . '</span></div>'.
                '	</div></body>';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('Pasta ' . $proc['id'] . '.pdf');
    }

}
