<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contacto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idproducto)
    {
        $user = Auth::user();
        $contactos = Contacto::all();
        $producto = Producto::find($idproducto);
        $usuario2 = User::find($producto->idusuario);
        // dd($usuario2);
        return view('frontend.contacto.index', ['user' => $user, 'user2' => $usuario2 ,'producto' => $producto, 'contactos' => $contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idproducto)
    {
        // dd((int)$idproducto);
        // $user = Auth::user();
        // $producto = Producto::find($idproducto);
        // // $current_product = null;
        
        // // foreach($productos as $producto) {
        // //     if($user->id == $idproducto) {
        // //         $current_product = $producto;
        // //     }
        // // }
        
        // // dd($current_product);
        
        // return view('frontend.contacto.create', ['user' => $user, 'producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Contacto($request->all());
        // dd($object);
        try {
            $result = $object->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($object -> id > 0) {
            $response = ['op' => 'store', 'r' => $result, 'id' => $object->id];
            return redirect('contacto/' . $object->idproducto . '/index')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        dd('shw');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        dd('ed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto, $id)
    {
        $contactobueno = Contacto::find($id);
        // dd($contactobueno);
        try {
            $result = $contactobueno->delete();
        } catch(\Exception $e) {
            $result = 0;
        }

        $response = ['op' => 'destroy', 'r' => $result, 'id' => $contactobueno->id];
        return redirect('contacto/' . $contactobueno->idproducto . '/index')->with($response);
    }
}
