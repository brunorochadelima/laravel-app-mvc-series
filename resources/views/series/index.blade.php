<x-layout title="Séries">
  <a href="/series/criar" class="btn btn-primary mb-3">Adicionar</a>

  <ul class="list-group">
    <!-- Usando Blade -->
    @foreach ($series as $serie)
    <li class="list-group-item">{{$serie->nome}}</li>
    @endforeach
  </ul>
</x-layout>