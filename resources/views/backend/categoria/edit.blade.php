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

<form role="form" action="{{ url('backend/categoria/' . $categoria->id) }}" method="post" id="createCategoriaForm">
    @csrf
    @method('put')
    
    <div class="card-body">
      
      <div class="form-group">
        <label for="categoria">Nombre de la categoría</label>
        @error('categoria')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" maxlength="60" minlength="2" required class="form-control" id="categoria" placeholder="Nombre de la categoría" name="categoria" value="{{ old('categoria', $categoria->categoria) }}">
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