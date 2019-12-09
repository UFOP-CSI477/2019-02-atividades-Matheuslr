
@extends('principal')

@section('conteudo')
@section('conteudo')
@if(Session::has('mensagem'))
    <div class="alert alert-success">
        <strong>{{Session::get('mensagem')}}</strong>
    </div>


@endif
<table class="table table-striped table-bordered">
    <thead class="table-light">
        <tr>
            <th>Id_requerimento</th>
            <th>Nome do protocolo</th>
            <th>preço</th>
            <th>Data</th>
            @if(!Auth::guest() and Auth::user()->type == 0)
            <th>ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
@foreach($requets as $r)
    <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->subject->name }}</td>
        @if( $r->subject->price != 00.00)
            <td>{{ $r->subject->price}}</td>
        @else
            <td>Grátis</td>
        @endif
        <td>{{ $r->date }}</td>
        @if(!Auth::guest() and Auth::user()->type == 0)
            <td><a href="{{ route('requets.show', $r->id) }}" class="btn btn-primary">Exibir</a></td>
        @endif
    </tr>
@endforeach
    </tbody>
    @if(!Auth::guest() and Auth::user()->type == 0)
    <tfoot>
        <p hidden> 
            {{$cost = 0.00}}
            {{$count = 0}}
                @foreach ($requets as $r)
                {{$cost += $r->subject->price}}
                {{$count += 1}}
                @endforeach
            </p>
        <tr>
            
            <td colspan="1">Número de requisições:</td>
            <td colspan="2">{{$count}}</td>
            <td colspan="1">Preço total:</td>
            <td colspan="1">R$ {{$cost}}</td>
            
        </tr>
    </tfoot>
    @endif
</table>
@endsection