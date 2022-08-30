<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Series::all();
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

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        /* Criação individual
         $nomeSerie = $request->input('nome');
         $serie = new Serie();
         $serie->nome = $nomeSerie;
         $serie->save();*/

        //Criação em massa
        $serie = Series::create($request->all());

        for ($i = 1; $i <= $request->seasonsQtd; $i++) {
            $season = $serie->seasons()->create([
                'number' => $i,
            ]);

            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    'number' => $j,
                ]);
            }
            ;
        }
        // $request->session()->flash('mensagem.sucesso', "Série $serie->nome adicionada com sucesso");

        return to_route('series.index')->with('mensagem.sucesso', "Série $serie->nome adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Serie $series->nome atualizada com sucesso");
    }
}
