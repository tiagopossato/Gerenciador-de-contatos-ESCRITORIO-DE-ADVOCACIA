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
                $left = 4;
                $top = 10;
                break;
            case 2:
                $left = 106;
                $top = 10;
                break;
            case 3:
                $left = 4;
                $top = 102;
                break;
            case 4:
                $left = 106;
                $top = 102;
                break;
            case 5:
                $left = 4;
                $top = 194;
                break;
            case 6:
                $left = 106;
                $top = 194;
                break;
            default :
                $left = 4;
                $top = 10;
                break;
        }
//        $html = '<style>html{	margin: 0;	padding: 0;	border:0;}'.///* HTML5 display-role reset for older browsers */article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block;}body {	line-height: 1;}ol, ul {	list-style: none;}blockquote, q {	quotes: none;}blockquote:before, blockquote:after,q:before, q:after {	content: \'\';	content: none;}</style>'.
//                'body{margin-left: 4mm; margin-top: 10mm;} table{width: 99mm; height: 92mm; border:1px solid;}</style>'.
//                '<table >' .
//                '<thead><tr><th colspan="2"><h2>Amarante e Amarante Advogados</h2></th></tr></thead>' .
//                '<tbody><tr>' .
//                '<td><h2> Pasta N<sup>o</sup></h2></td>' .
//                '<td><h2>' . $proc['id'] . '</h2></td>' .
//                '</tr><tr>' .
//                '<td valign=top><b>Cliente</b></td><td valign=top> ' . $proc['cliente'] . '</td>' .
//                '</tr><tr>' .
//                '<td valign=top><b>Advogado</b></td><td valign=top>' . $proc['advogado'] . '</td>' .
//                '</tr><tr>' .
//                '<td valign=top><b>Parte Contrária</b></td><td valign=top> ' . $proc['partecontraria'] . '</td>' .
//                '</tr><tr>' .
//                '<td valign=top><b>Ação</b></td><td valign=top>' . $proc['acaotipo'] . '</td>' .
//                '</tr></tbody></table>';

        $html = '<style>html{	margin: 0;	padding: 0;	border:0;}' . ///* HTML5 display-role reset for older browsers */article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block;}body {	line-height: 1;}ol, ul {	list-style: none;}blockquote, q {	quotes: none;}blockquote:before, blockquote:after,q:before, q:after {	content: \'\';	content: none;}</style>'.
                'body{margin-left: ' . $left . 'mm; margin-top: ' . $top . 'mm;} table{width: 99mm; height: 90mm;}</style>' .
                '<table >' .
                '<thead><tr><th colspan="2"><h1>Pasta N<sup>o</sup>: ' . $proc['id'] . '</h1></th></tr></thead>' .
                '<tbody><tr>' .
                '<td colspan="2"><hr></td>' .
                '</tr><tr>' .
                '<td valign=top><b>Cliente</b></td><td valign=top> ' . $proc['cliente'] . '</td>' .
                '</tr><tr>' .
                '<td valign=top><b>Advogado</b></td><td valign=top>' . $proc['advogado'] . '</td>' .
                '</tr><tr>' .
                '<td valign=top><b>Parte Contrária</b></td><td valign=top> ' . $proc['partecontraria'] . '</td>' .
                '</tr><tr>' .
                '<td valign=top><b>Ação</b></td><td valign=top>' . $proc['acaotipo'] . '</td>' .
                '</tr></tbody></table>';

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Pasta ' . $proc['id'] . '.pdf');
    }

}
