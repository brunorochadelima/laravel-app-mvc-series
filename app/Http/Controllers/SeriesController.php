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
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        // encerrar a seçção caso usar putno lugar de flash
        //$request->session()->forget('mensagem.sucesso');

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

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function criarSerie()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        /* Criação individual
         $nomeSerie = $request->input('nome');
         $serie = new Serie();
         $serie->nome = $nomeSerie;
         $serie->save();*/

        //Criação em massa
        $serie = Serie::create($request->all());
        // $request->session()->flash('mensagem.sucesso', "Série $serie->nome adicionada com sucesso");

        return to_route('series.index')->with('mensagem.sucesso', "Série $serie->nome adicionada com sucesso");
    }

    public function destroy(Request $request)
    {
        $serie = Serie::find($request->series);
        Serie::destroy($request->serie);
        return to_route('series.index')->with('mensagem.sucesso', 'Série removida com sucesso');
    }
}
