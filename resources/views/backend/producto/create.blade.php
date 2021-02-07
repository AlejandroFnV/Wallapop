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

<form role="form" action="{{ url('backend/producto') }}" method="post" id="createProductoForm">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="60" minlength="2" required class="form-control" id="nombre" placeholder="Nombre del producto" name="nombre" value="{{ old('nombre') }}">
      </div>
      
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        @error('descripcion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea minlength="20" required class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto">{{ old('descripcion') }}</textarea>
      </div>
      
      <div class="form-group">
        <label for="uso">Uso</label>
        @error('uso')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="15" minlength="3" required class="form-control" id="uso" placeholder="Uso" name="uso" value="{{ old('uso') }}">
      </div>
      
      <div class="form-group">
        <label for="estado">Estado</label>
        @error('estado')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="15" minlength="3" required class="form-control" id="estado" placeholder="Estado del producto" name="estado" value="{{ old('estado') }}">
      </div>
      
      <div class="form-group">
        <label for="precio">Precio</label>
        @error('precio')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" maxlength="100" minlength="2" required class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
      </div>
      
      <div class="form-group">
        <label for="fecha">Fecha</label>
        @error('fecha')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="date" required class="form-control" id="fecha" name="fecha" value="">
      </div>
      
      <div class="form-group">
        <label for="foto">Foto</label>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="40" minlength="5" required class="form-control" id="foto" placeholder="Foto del producto" name="foto" value="{{ old('foto') }}">
      </div>
      
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection