@extends('principal')

@section('conteudo')

  <form method="post" action="{{ route('subjects.store') }}">

    @csrf
    
    <div>
        <div class="row">
            <div class="col col-md-6 text-center">
                <p>Protocolo: <input type="text" name="name"></p>
            </div>
            <div class="col col-md-6 text-center">
                <p>Preço: <input type="text" name="price", id="price"></p>
            </div>
        </div>
        {{-- <input id="user_id" name="user_id" value={{Auth::user()->id}} hidden> --}}

        
    </div>
    <div class="row">
        <div class=" col col-md-12 text-center" >
            <input type="submit" name="btnSalvar" value="Incluir">
        </div>
    </div>






  </form>

@endsection
