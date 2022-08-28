<x-layout title="Séries">
  <a href="/series/criar" class="btn btn-primary mb-3">Adicionar</a>
  
  <ul class="list-group">
    <!-- Sintaxe PHP puro
    <?php foreach ($series as $serie) : ?>
      <li><?= $serie ?></li>
    <?php endforeach; ?> -->

    <!-- Usando Blade -->
    @foreach ($series as $serie)
    <li class="list-group-item">{{$serie}}</li>
    @endforeach
  </ul>
</x-layout>