<?php

namespace App\Http\Controllers;

use App\Models\Deseos;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class DeseosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deseos = Deseos::all();
        return view('backend.deseo.index', ['deseos' => $deseos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $productos = Producto::all();
        return view('backend.deseo.create', ['usuarios' => $usuarios, 'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Deseos($request->all());
        try {
            $result = $object->save();    
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($object -> id > 0) {
            $response = ['op' => 'store', 'r' => $result, 'id' => $object->id];
            return redirect('backend/deseo')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deseos  $deseos
     * @return \Illuminate\Http\Response
     */
    public function show(Deseos $deseos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deseos  $deseos
     * @return \Illuminate\Http\Response
     */
    public function edit(Deseos $deseos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deseos  $deseos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deseos $deseos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deseos  $deseos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deseos $deseos)
    {
        //
    }
}
