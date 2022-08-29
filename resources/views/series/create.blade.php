<x-layout title="Nova Série">

  <form action="{{route('series.store')}}" method="post">
    <!-- Corrige Cross-site request forgery -->
    @csrf
    <div>
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Nome"></input>
    </div>
    <button type="submit" class="btn btn-dark mt-3">Adicionar</button>
  </form>

</x-layout>