<x-layout title="">
   @isset($nome)
   @method('PUT')
   @endisset
  <form action="{{$action}}" method="post">
    <!-- Corrige Cross-site request forgery -->
    @csrf
    <div>
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" @isset($nome) value="{{$nome}}"
        @endisset></input>
    </div>
    <button type="submit" class="btn btn-dark mt-3">Adicionar</button>
  </form>

</x-layout>