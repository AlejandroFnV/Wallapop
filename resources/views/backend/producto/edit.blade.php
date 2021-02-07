@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="card-footer">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Atrás</a>
<a href="#" id="enlaceBorrar" data-id="{{ $producto->id }}" data-name="{{ $producto->nombre }}" class="btn btn-warning">Borrar producto</a>    
</div>


@if(Session::get('error') != null)
  <h2>{{ Session::get('error') }}</h2>
@endif

<form id="formDelete" action="{{ url('backend/producto/' . $producto->id) }}" method="post">
    @method('delete')
    @csrf
</form>

<!--mostrar todos los errores juntos-->
@if ($errors->any())
  <div class="alert alert-danger">
        <ul>            
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>            
            @endforeach        
        </ul>    
  </div>
@endif

<form role="form" action="{{ url('backend/producto/' . $producto->id) }}" method="post" id="editProductoForm" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="card-body">
        
      <div class="form-group">
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="nombre">Nombre del producto</label>
        <input type="text" maxlength="60" minlength="2" required class="form-control" id="nombre" placeholder="Nombre del producto" name="nombre" value="{{ old('nombre' , $producto->nombre) }}">
      </div>
      
      <div class="form-group">
        <label for="idcategoria">Categoria</label>
        
        @if(isset($categorias))
        <select name="idcategoria" id="idcategoria" required class="form-control">
            <option value="" disabled>Selecciona una categoría</option>
            @foreach($categorias as $categoria)
            @if($categoria->id == old('idcategoria', $producto->idcategoria))
                <option selected value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @else
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endif
            @endforeach
        @endif
        </select>
      </div>
      
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        @error('descripcion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea minlength="20" required class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto">{{ old('descripcion', $producto->descripcion) }}</textarea>
      </div>
      
      <div class="form-group">
        <label for="uso">Uso</label>
        @error('uso')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="15" minlength="3" required class="form-control" id="uso" placeholder="Uso" name="uso" value="{{ old('uso', $producto->uso) }}">
      </div>
      
      <!--<div class="form-group">-->
      <!--  <label for="estado">Estado</label>-->
      <!--  @error('estado')-->
      <!--  <div class="alert alert-danger">{{ $message }}</div>-->
      <!--  @enderror-->
      <!--  <input type="text" maxlength="15" minlength="3" required class="form-control" id="estado" placeholder="Estado del producto" name="estado" value="{{ old('estado', $producto->estado) }}">-->
      <!--</div>-->
      
      
      
      <div class="form-group">
        <label for="estado">Estado</label>
        
        <select name="estado" id="estado" required class="form-control">
            <option value="{{ $producto->estado }}" disabled selected>{{ $producto->estado }}</option>
            @if($producto->estado == old('estado', $producto->estado))
                <!--<option selected value="{{ $producto->estado }}">{{-- $producto->estado --}}</option>-->
                <option value="En venta">En venta</option>
                <option value="Vendido">Vendido</option>
                <option value="Retirado">Retirado</option>
                <option value="Censurado">Censurado</option>
            @else
              <option value="En venta">En venta</option>
              <option value="Vendido">Vendido</option>
              <option value="Retirado">Retirado</option>
              <option value="Censurado">Censurado</option>
            @endif
            <!--<option {{--old('job_status',$profile->job_status)=="unemployed"? 'selected':''--}}  value="unemployed">Unemployed</option>-->
        </select>
                    
      </div>
      
      <div class="form-group">
        <label for="precio">Precio</label>
        @error('precio')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" maxlength="100" minlength="2" required class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
      </div>
      
      <div class="form-group">
        <label for="fecha">Fecha</label>
        @error('fecha')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="date" required class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d') }}">
      </div>
      
      <div class="form-group">
        <label for="foto">Foto</label>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
      
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection