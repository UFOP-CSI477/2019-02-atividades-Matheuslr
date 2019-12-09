@extends('principal')

@section('conteudo')

  <h1>Protocolo: {{ $requet->subject->name  }}</h1>


  <p>Data: {{ $requet->date }}</p>
  <p>Descrição: {{ $requet->description }}</p>
  <p>valor: {{ $requet->subject->price }}</p>

  <p>Data de criação: {{ $requet->created_at }}</p>
  <p>Última atualização: {{ $requet->updated_at }}</p>

  
  <!-- Voltar para a lista de cidades //-->
  <a class="btn btn-primary" href="{{ route('requets.index') }}">Voltar</a>
  <!-- Editar a cidade corrente //-->
  <a class="btn btn-success" href="{{ route('requets.edit', $requet->id) }}">Editar</a>

  <!-- Excluir a cidade corrente //-->
  <form method="post" action="{{ route('requets.destroy', $requet->id) }}"
    onsubmit="return confirm('Confirma exclusão do requerimento?');">

    @csrf
    @method('DELETE')

    <input class="btn btn-danger" type="submit" value="Excluir">

  </form>

  

@endsection