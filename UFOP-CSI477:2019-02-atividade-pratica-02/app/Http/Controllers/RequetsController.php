<?php

namespace App\Http\Controllers;

use App\Requets;
use App\Subject;
use Illuminate\Http\Request;

class RequetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requets = Requets::orderBy('date','DESC')->get()->sortBy('protocols.name');

        // View -> apresentar
        return view('requets.index', ['requets'=>$requets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $subjects = Subject::orderBy('name')->get();
        return view('requets.create', 
        ['subject'=> $subjects ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Requets::create($request->all());

        return redirect()->route('requets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function show(Requets $requet)
    {
        return view('requets.show', ['requet' => $requet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function edit(Requets $requet)
    {
        $subjects = Subject::orderBy('name')->get();

        return view('requets.edit', 
        ['requet' => $requet,
         'subjects' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requets $requet)
    {
        $requet->fill($request->all());
        // Persiste no BD
        $requet->save();

        session()->flash('mensagem', 'Requerimento atualizado com sucesso!');

        return redirect()->route('requets.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requets $requet)
    {
        $requet->delete();
        session()->flash('mensagem', 'Requerimento deletado com sucesso');
        return redirect()->route('requets.index');
    }
}
