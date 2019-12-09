@extends('principal')

@section('conteudo')

<form method="post" action="{{ route('subjects.update', $subject->id) }}">

    @csrf
    @method('PATCH')

    <p>Nome do protocolo: <input type="text" name="name" value="{{ $subject->name }}"></p>
    <p>Preço do protocolo: <input type="text" name="price" value="{{ $subject->price }}"></p>


    <input type="submit" name="btnSalvar" value="Alterar">






  </form>

@endsection
