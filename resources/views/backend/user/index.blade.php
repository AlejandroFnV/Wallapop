@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
    <a href="{{ url('backend/usuario/create') }}" class="btn btn-primary">Create user</a>
</div>

@if(Session::get('op') != null)
<div class="alert alert-success" role="alert">
  Enterprise created successfully: {{ Session::get('id') }}
</div>
<br>
@endif


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
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td scope="row">{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            
            <td><a href="{{ url('backend/usuario/' . $user->id . '/edit') }}">edit</a></td>
            <td><a data-table="user" data-id="{{ $user->id }}" class="enlaceBorrar" href="#">delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/usuario') }}" method="post">
    @method('delete')
    @csrf
</form>


@endsection