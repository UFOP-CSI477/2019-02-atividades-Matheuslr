<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Requets;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::orderBy('name')->get();

        // View -> apresentar
        return view('subjects.index', 
        ['subjects'=>$subjects,
         'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::orderBy('name')->get();
        return view('subjects.create', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = new Subject();
        $s->name = $request->name;
        $s->price = $request->price;
        $s->price = str_replace(",",".",$s->price);
        $s->save();
        // Subject::create($request->all());
        
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subjects.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {

        return view('subjects.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->fill($request->all());
        $subject->save();

        session()->flash('mensagem', 'subject atualizado com sucesso');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {

        $requets = Requets::orderBy('date')->get();

        $count = 0;
        foreach($requets as $r){
            if($r->subject_id == $subject->id){
                $count++;
            }
        }
        if($count == 0){
            $subject->delete();
            session()->flash('mensagem_sucesso', 'Protocolo deletado');
        }else{
            $erro_string="O protocolo possui {$count} requerimento(s) vinculado(s)";
            session()->flash('mensagem_erro',$erro_string );
        }

        return redirect()->route('subjects.index');
    }
}
