
@extends('principal')

@section('conteudo')
@if(Session::has('mensagem_sucesso'))
    <div class="alert alert-success">
        <strong>{{Session::get('mensagem_sucesso')}}</strong>
    </div>
@elseif(Session::has('mensagem_erro'))
    <div class="alert alert-danger">
        <strong>{{Session::get('mensagem_erro')}}</strong>
    </div>

@endif
<table class="table table-striped table-bordered">
    <thead class="table-light">
        <tr>
            <th>Id do protocolo</th>
            <th>Nome do protocolo</th>
            <th>preço</th>
            @if(!Auth::guest() and Auth::user()->type == 1)
            <th>ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
@foreach($subjects as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        @if( $s->price != 00.00)
            <td>{{ $s->price}}</td>
        @else
            <td>Grátis</td>
        @endif

        @if(!Auth::guest() and Auth::user()->type == 1)
        <td><a href="{{ route('subjects.show', $s->id) }}" class="btn btn-primary">Exibir</a></td>
        @endif
    </tr>
@endforeach
    </tbody>
  </table>
  @if(!Auth::guest() and Auth::user()->type == 1)
  <td><a href="{{ route('subjects.create') }}" class="btn btn-primary">Criar novo protocolo</a></td>
  @endif
@endsection