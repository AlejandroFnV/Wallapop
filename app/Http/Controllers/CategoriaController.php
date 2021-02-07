<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('backend.categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Categoria($request->all());
        try {
            $result = $object->save();    
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($object -> id > 0) {
            $response = ['op' => 'store', 'r' => $result, 'id' => $object->id];
            return redirect('backend/categoria')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria, $id)
    {
        $categori = Categoria::find($id);
        return view('backend.categoria.edit', ['categoria' => $categori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria, $id)
    {
        $categori = Categoria::find($id);
        // dd($categori);
        try {
            $result = $categori->update($request->all());
        } catch(\Exception $e) {
            $result = 0;
        }
        
        // dd($request->all());
        
        if($result > 0) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $categori->id];
            return redirect('backend/categoria')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria, $id)
    {
        // $producto_categoria_id = $categoria->
        $categori = Categoria::find($id);
        // $id = $categori->id;
        try {
            $result = $categori->delete();
        } catch(\Exception $e) {
            $result = 0;
        }

        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/categoria')->with($response);
    }
}
