<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Episode;

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
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
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
