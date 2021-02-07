<a class="navbar-brand" href="{{ route('home') }}">Wallapop</a>

<form role="form" action="{{ route('contacto.store') }}" method="post" id="createContactoForm">
    @csrf
    <input type="text" id="textoContacto" name="textoContacto" placeholder="Escribe aqui tu mensaje">
    <input type="hidden" id="idusuario1" name="idusuario1" value="{{ $user->id }}">
    <input type="hidden" id="idusuario2" name="idusuario2" value="{{ $producto->idusuario }}">
    <input type="hidden" id="idproducto" name="idproducto" value="{{ $producto->id }}">
    <input type="submit" value="Enviar">    
</form>

@foreach($contactos as $contacto)
@if($user->id != $user2->id)
<p>{{ $user->name }}: {{ $contacto->textoContacto }}</p><a href="{{ url('contacto/' . $contacto->id . '/delete') }}">Borrar</a>
@else
<p>{{ $user2->name }}: {{ $contacto->textoContacto }}</p><a href="{{ url('contacto/' . $contacto->id . '/delete') }}">Borrar</a>
@endif
@endforeach