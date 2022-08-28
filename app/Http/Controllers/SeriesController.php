<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('created_at', 'desc')->get();
        // Usar para debugar o conteúdo ao inves de vardump dd($series);


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

    public function criarSerie()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect('/series');
    }
}
