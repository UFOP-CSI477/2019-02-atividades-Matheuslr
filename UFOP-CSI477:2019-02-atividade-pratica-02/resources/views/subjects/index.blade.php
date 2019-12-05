
@extends('principal')

@section('conteudo')

<table class="table table-striped table-bordered">
    <thead class="table-light">
        <tr>
                <th>Id do protocolo</th>
                <th>Nome do protocolo</th>
                <th>preço</th>
        </tr>
    </thead>
    <tbody>
@foreach($subjects as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->price}}</td>
    </tr>
@endforeach
    </tbody>
  </table>
@endsection