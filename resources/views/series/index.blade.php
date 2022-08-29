<x-layout title="Séries">
  <a href={{route('series.create')}} class="btn btn-primary mb-3">Adicionar</a>

  @isset($mensagemSucesso)
  <div class="alert alert-success">
    {{ $mensagemSucesso }}
  </div>
  @endisset


  <ul class="list-group">
    <!-- Usando Blade -->
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{$serie->nome}}
      <span class="d-flex">
        <a href={{route('series.edit', $serie->id)}} class="btn btn-primary">Editar</a>
        <form action="{{route('series.destroy', $serie->id)}}" method="post" class="ms-2">
          @csrf
          <button class="btn btn-danger">Excluir</button>
        </form>
      </span>
    </li>
    @endforeach
  </ul>
</x-layout>