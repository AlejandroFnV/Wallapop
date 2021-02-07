@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
    <a href="{{ url('backend/categoria/create') }}" class="btn btn-primary">Añadir categoria</a>
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
        <th scope="col">nombre de la categoria</th>
        
        <th scope="col">edit</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td scope="row">{{ $categoria->id }}</td>
            <td>{{ $categoria->categoria }}</td>
            
            <!--<td><a href="{{-- url('backend/categorias/' . $categoria->id . '/edit') --}}">edit</a></td>-->
            <td><a href="{{ route('backend.categoria.edit', $categoria->id) }}">edit</a></td>
            <td><a data-id="{{ $categoria->id }}" class="enlaceBorrar" href="#">delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/categoria') }}" method="post">
    @method('delete')
    @csrf
</form>

@endsection