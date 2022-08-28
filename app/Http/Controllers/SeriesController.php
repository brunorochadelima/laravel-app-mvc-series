<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = ['greys anatomy', 'the boys', 'hallo'];


        /*retorna a view, o paramentro dentro de [] é para criar
         a variável series com o conteúdo de $series na view

         return view('listarSeries', [
             'series' => $series,
         ]);

         função compact('series') faz a mesma função informada acima
         return view('listarSeries', compact('series'));

         ou com with conforme abaixo:

       */

        return view('series.index')->with('series', $series);
    }

    public function criarSerie(){
        return view('series.create');
    }
}
