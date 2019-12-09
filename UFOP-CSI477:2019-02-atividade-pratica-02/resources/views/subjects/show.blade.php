@extends('principal')

@section('conteudo')

  <h1>Protocolo: {{ $subject->name}}</h1>


  <p>Preço: {{ $subject->price }}</p>

  <p>Data de criação: {{ $subject->created_at }}</p>
  <p>Última atualização: {{ $subject->updated_at }}</p>

  
  <!-- Voltar para a lista de cidades //-->
  <a class="btn btn-primary" href="{{ route('subjects.index') }}">Voltar</a>
  <!-- Editar a cidade corrente //-->
  <a class="btn btn-success" href="{{ route('subjects.edit', $subject->id) }}">Editar</a>

  <!-- Excluir a cidade corrente //-->
  <form method="post" action="{{ route('subjects.destroy', $subject->id) }}"
    onsubmit="return confirm('Confirma exclusão do requerimento?');">

    @csrf
    @method('DELETE')

    <input class="btn btn-danger" type="submit" value="Excluir">

  </form>

  

@endsection