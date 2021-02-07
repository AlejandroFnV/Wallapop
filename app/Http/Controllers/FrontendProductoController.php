<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FrontendProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categorias = Categoria::all();
        $producto = Producto::all();
        return view('frontend.producto.uploadproduct', ['user' => $user, 'categorias' => $categorias, 'producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Producto($request->all());
        // dd($object);
        try {
            
            if($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $file = $request->file('foto');
                $path = $file->getRealPath();
                $imagen = file_get_contents($path);
                $base64 = base64_encode($imagen);
                $nombre = $file->getClientOriginalName();
                $object->foto = $base64;
                $r1 = $file->move('images', $nombre);
                // dd($r1);
            }
        
            $object->save();
        } catch(\Exception $e) {
            $result = 0;
            // dd($object);
        }
        
        if($object -> id > 0) {
            $response = ['op' => 'store', /*'r' => $result,*/'id' => $object->id];
            return redirect('home')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $user = Auth::user();
        $contactos = Contacto::all();
        $current_contacto = array();
        foreach($contactos as $contacto) {
            if($contacto->idproducto == $producto->id) {
                array_push($current_contacto, $contacto);
            }
        }
        // dd($current_contacto);
        
        return view('frontend.producto.single', ['producto' => $producto, 'user' => $user, 'contacto' => $current_contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $user = Auth::user();
        $categorias = Categoria::all();
        return view('frontend.producto.edit', ['producto' => $producto, 'user' => $user, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        try {
            $result = $producto->update($request->all());
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($result > 0) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $producto->id];
            return redirect('producto/' . $producto->id)->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        // $id = $ticket->id;
        try {
            $result = $producto->delete();
        } catch(\Exception $e) {
            $result = 0;
        }

        $response = ['op' => 'destroy', 'r' => $result, 'id' => $producto->id];
        return redirect('home')->with($response);
    }
}