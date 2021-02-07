@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/producto/' . $producto->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="card-footer">
    <a href="{{ url('backend/producto') }}" class="btn btn-primary">Atrás</a>
    <a href="{{ url('backend/producto/create') }}" class="btn btn-primary">Añadir producto</a>
    <a href="#" id="enlaceBorrar" data-id="{{ $producto->id }}" data-name="{{ $producto->nombre }}" class="btn btn-primary">Borrar producto</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Usuario</td>
            <td>{{ $producto->usuario->name }}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>{{ $producto['nombre'] }}</td>
        </tr>
        
        <tr>
            <td>Categoria</td>
            <td>{{ $producto->categorias->categoria }}</td>
        </tr>
        
        <tr>
            <td>Descripción</td>
            <td>{{ $producto['descripcion'] }}</td>
        </tr>
        
        <tr>
            <td>Uso</td>
            <td>{{ $producto['uso'] }}</td>
        </tr>
        
        <tr>
            <td>Precio</td>
            <td>{{ $producto['precio'] }} €</td>
        </tr>
        
        <tr>
            <td>Fecha</td>
            <td>{{ $producto['fecha'] }}</td>
        </tr>
        
        <tr>
            <td>Estado</td>
            <td>{{ $producto['estado'] }}</td>
        </tr>
        
        <tr>
            <td>Foto</td>
            <td><img src="data:image/jpeg;base64,{{ $producto->foto }}" class="img-fluid" alt="Colorlib Template"></td>
        </tr>
    </tbody>
</table>

@endsection