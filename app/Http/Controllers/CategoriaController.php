<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = categoria::all();
        return view('categorias.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'nombreCategoria' => 'required|max:30']);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        categoria::create($request->all());
        return redirect('categorias')->with('type','success')
                                     ->with('msn','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datos = categoria::find($id);
        
        return view('categorias.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'nombreCategoria' => 'required|max:30']);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $categoria = categoria::find($id);
        $categoria->update($request->all());
        return redirect('categorias')->with('type','success')
                                     ->with('msn','Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = categoria::find($id);
        $categoria->delete();
        return redirect('categorias')->with('type','danger')
                                     ->with('msn','Registro eliminado exitosamente');
    }
}
