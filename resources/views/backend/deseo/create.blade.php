@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
  <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
</div>


@if(Session::get('error') != null)
  <h2>{{ Session::get('error') }}</h2>
@endif

<!--mostrar todos los errores juntos-->
{{--@if ($errors->any())
  <div class="alert alert-danger">
        <ul>            
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>            
            @endforeach        
        </ul>    
  </div>
@endif--}}

<form role="form" action="{{ url('backend/deseo') }}" method="post" id="createEnterpriseForm">
    @csrf
    <div class="card-body">
      
      <div class="form-group">
        <label for="identerprise">Usuario</label>
        
        @if(isset($usuarios))
        <select name="idusuario" id="idusuario" required class="form-control">
            <option value="" disabled selected>Selecciona usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name . ' - ' . $usuario->email }}</option>
            @endforeach
        </select>
        @else
            {{ $usuario->name . ' - ' . $usuario->email }}
            <input type="hidden" id="idusuario" name="idusuario" value="{{ $usuario->id }}"/>
        @endif
      </div>
      
      
      <div class="form-group">
        <label for="idproducto">Producto</label>
        
        @if(isset($productos))
        <select name="idproducto" id="idproducto" required class="form-control">
            <option value="" disabled selected>Selecciona producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre . ' - ' . $producto->precio }}</option>
            @endforeach
        </select>
        @else
            {{ $producto->nombre . ' - ' . $producto->precio }}
            <input type="hidden" id="idproducto" name="idproducto" value="{{ $producto->id }}"/>
        @endif
        
      </div>
      
      
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection