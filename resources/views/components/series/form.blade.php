<x-layout title="">


  <form action="{{$action}}" method="post">
    <!-- Corrige Cross-site request forgery -->
    @csrf

    @if($update)
    @method('PUT')
    @endif

    <div>
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" @isset($nome) value="{{$nome}}" @endisset></input>
    </div>
    <button type="submit" class="btn btn-dark mt-3">Adicionar</button>
  </form>

</x-layout>