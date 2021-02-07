@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
    <a href="{{ url('backend/deseo/create') }}" class="btn btn-primary">Añadir deseo</a>
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
        <th scope="col">idusuario</th>
        <th scope="col">idproducto</th>
        
        <th scope="col">show</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($deseos as $deseo)
        <tr>
            <td scope="row">{{ $deseo->id }}</td>
            <td>{{ $deseo->usuario->name }}</td>
            <td>{{ $deseo->producto->nombre }}</td>
            
            <td><a href="{{ url('backend/deseo/' . $deseo->id) }}">show</a></td>
            <td><a href="{{ url('backend/deseo/' . $deseo->id . '/edit') }}">edit</a></td>
            <td><a data-id="{{ $deseo->id }}" class="enlaceBorrar" href="#">delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/deseo') }}" method="post">
    @method('delete')
    @csrf
</form>


@endsection