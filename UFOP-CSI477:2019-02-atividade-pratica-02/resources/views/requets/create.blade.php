@extends('principal')

@section('conteudo')

  <form method="post" action="{{ route('requets.store') }}">

    @csrf
    
    
    
    
    <div>
        <div class="row">
            <div class="col col-md-4">
                <p>Subject: 
                <select name="subject_id">
                    <option disabled selected value>--Escolha um protocolo--</option>
                    @foreach ($subject as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select></p>
            </div>
            <div class="col col-md-4">
                <p>Descrição: <input type="text" name="description"></p>
            </div>
            <div class="col col-md-4">
                <p>Data: <input name="date" type="date"></p>
            </div>
        </div>
        <input id="user_id" name="user_id" value={{Auth::user()->id}} hidden>

        
    </div>
    <div class="row">
        <div class=" col col-md-4">
        </div>
        <div class=" col col-md-4">
            <input type="submit" name="btnSalvar" value="Incluir">
        </div>
    </div>






  </form>

@endsection
