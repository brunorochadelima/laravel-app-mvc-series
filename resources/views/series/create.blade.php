<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        <!-- Corrige Cross-site request forgery -->
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" autofocus name="nome" class="form-control"  value="{{ old('nome') }}"
                   ></input>
            </div>

            <div class="col-2">
                <label for="seasonsQtd" class="form-label">Nº Temporadas</label>
                <input type="text" name="seasonsQtd" class="form-control" value="{{ old('seasonsQtd') }}"
                    ></input>
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps. por Temporada</label>
                <input type="text" name="episodesPerSeason" class="form-control"  value="{{ old('episodesPerSeason') }}"
                   ></input>
            </div>
        </div>

        <button type="submit" class="btn btn-dark mt-3">Adicionar</button>
    </form>
</x-layout>