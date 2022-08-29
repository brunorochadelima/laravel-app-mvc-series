<x-layout title="Séries">
  <a href={{route('series.create')}} class="btn btn-primary mb-3">Adicionar</a>

  <ul class="list-group">
    <!-- Usando Blade -->
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
    {{$serie->nome}}
      <form action="{{route('series.destroy', $serie->id)}}" method="post">
        @csrf
        <button class="btn btn-danger">Excluir</button>
      </form>
    </li>
    @endforeach
  </ul>
</x-layout>