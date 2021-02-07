<?php

namespace App\Http\Controllers;

use App\Models\Deseos;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendDeseoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $deseos = Deseos::all();
        $productos = Producto::all();
        $productos_deseados = array();
        $deseos_deseados = array();
        
        foreach($deseos as $deseo) {
            foreach($productos as $producto) {
                if($deseo->idproducto == $producto->id && $deseo->idusuario == $user->id) {
                    array_push($productos_deseados, $producto);
                    array_push($deseos_deseados, $deseo);
                }
            }
        }
        // dd($deseos_deseados)
        // dd($productos_deseados);
        
        return view('frontend.deseo.index', ['deseos' => $deseos_deseados, 'user' => $user, 'productos' => $productos_deseados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $idproducto)
    {
        $user = Auth::user();
        $iduser = $user->id;
        $deseo = new Deseos();
        
        try {
            $deseo->idusuario = $iduser;
            $deseo->idproducto = (int)$idproducto;
            // dd($deseo);
            $result = $deseo->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        
        // dd($result);
        if($deseo -> id > 0) {
            $response = ['op' => 'store', 'r' => $result, 'id' => $deseo->id];
            return redirect('home')->with($response);
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
        dd('show');
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
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deseos  $deseos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deseos $deseos, $id)
    {
        // dd('destroy');
        // $id = $ticket->id;
        $deseo = Deseos::find($id);
        // dd($deseo);
        try {
            $result = $deseo->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        // dd($result);
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $deseo->id];
        return redirect('deseo')->with($response);
    }
}
