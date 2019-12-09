@extends('principal')

@section('conteudo')

<form method="post" action="{{ route('requets.update', $requet->id) }}">

    @csrf
    @method('PATCH')

    <p>Protocolo: 

    <select name="subject_id">

      @foreach ($subjects as $s)
        <option value="{{ $s->id }}"

            @if ( $s->id == $requet->subject_id )
              selected
            @endif

          >{{ $s->name }}</option>
      @endforeach


    </select></p>

    <p>Data: <input name="date" type="date" value={{$requet->date}}></p>

    <input type="submit" name="btnSalvar" value="Alterar">






  </form>

@endsection
