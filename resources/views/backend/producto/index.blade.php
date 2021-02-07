@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
    <a href="{{ url('backend/producto/create') }}" class="btn btn-primary">Añadir producto</a>
</div>

@if(Session::get('op') != null)
<div class="alert alert-success" role="alert">
  Enterprise created successfully: {{ Session::get('id') }}
</div>
<br>
@endif

<!-- 
op -> store, update, destroy
r -> numero negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->
@if(session()->has('op'))
<div class="alert alert-success" role="alert">
  Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
</div>
<br>
@endif

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">id #</th>
        <th scope="col">Usuario</th>
        <th scope="col">Categoria</th>
        <th scope="col">nombre</th>
        <th scope="col">descripcion</th>
        <th scope="col">uso</th>
        <th scope="col">precio</th>
        <th scope="col">fecha</th>
        <th scope="col">estado</th>
        <th scope="col">foto</th>
        
        <th scope="col">show</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td scope="row">{{ $producto->id }}</td>
            <td>{{ $producto->usuario->name }}</td>
            <td>{{ $producto->categorias->categoria }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->uso }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->fecha }}</td>
            <td>{{ $producto->estado }}</td>
            <td><img src="data:image/jpeg;base64,{{ $producto->foto }}" class="img-fluid" alt="Colorlib Template"></td>
            
            <td><a href="{{ url('backend/producto/' . $producto->id) }}">show</a></td>
            <td><a href="{{ url('backend/producto/' . $producto->id . '/edit') }}">edit</a></td>
            <td><a data-id="{{ $producto->id }}" class="enlaceBorrar" href="#">delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/producto') }}" method="post">
    @method('delete')
    @csrf
</form>


@endsection