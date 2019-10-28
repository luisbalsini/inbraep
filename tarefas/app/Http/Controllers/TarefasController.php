<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefas;
use App\Usuario;
use App\Estado;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $tarefas = Tarefas::with(['usuario','estado'])->get();
        
        return view('tarefas.index',['tarefas'=>$tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novo = array();
        $status = Estado::all();
        $status = $status->toArray();
        foreach ($status as $estado) {
            $novo[$estado['id']] = $estado['nome'];            
        }
            
        $novouser = array();
        $usuario = Usuario::all();
        $usuario = $usuario->toArray();
        foreach ($usuario as $user) {
            $novouser[$user['id']] = $user['nome'];
        }
        
        return view('tarefas.create')->with(['status' => $novo, 'usuario' => $novouser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nome' => 'required|max:255',
            'usuarios_id' => 'required|max:1',
        ]);
        
        $form = $request->all();
        Tarefas::create($form);
        
        return redirect()->route('tarefas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefas::find($id);
        $novostatus = array();
        $status = Estado::all();
        $status = $status->toArray();
        foreach ($status as $estado) {
            $novostatus[$estado['id']] = $estado['nome'];
        }
        
        $novouser = array();
        $usuario = Usuario::all();
        $usuario = $usuario->toArray();
        foreach ($usuario as $user) {
            $novouser[$user['id']] = $user['nome'];
        }       
        
        return view('tarefas.edit', compact('tarefa'))->with(['status'=> $novostatus,'usuario'=>$novouser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'usuarios_id' => 'required',
            'comentario' => 'required|max:255',
            'estados_id'     => 'required'
        ]);
        
        Tarefas::find($id)->update($request->all());
        
        return redirect()->route('tarefas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarefas::find($id)->delete();
        return redirect()->route('tarefas');
    }
}
