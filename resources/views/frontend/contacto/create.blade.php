<form role="form" action="{{ route('contacto.store') }}" method="post" id="createContactoForm">
    @csrf
    <input type="text" id="textoContacto" name="textoContacto" placeholder="Escribe aqui tu mensaje">
    <input type="hidden" id="idusuario1" name="idusuario1" value="{{ $user->id }}">
    <input type="hidden" id="idusuario2" name="idusuario2" value="{{ $producto->idusuario }}">
    <input type="hidden" id="idproducto" name="idproducto" value="{{ $producto->id }}">
    <input type="submit" value="Enviar">    
</form>