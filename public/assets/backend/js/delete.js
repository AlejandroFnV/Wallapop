$(document).ready(function () {
    var request = function (deleteId) {
        $.ajax({
            type: 'get',
            url: "https://informatica.ieszaidinvergeles.org:9048/laraveles/thirdApplication/public/deletefoto",
            data: { id: deleteId },
            dataType: 'json',
            success: function (data) {
                console.log('ok');
                // eliminar la foto de la página
            }, error: function () {
                console.log('no');
            }
        });
    };
    let enlacesBorrar = document.getElementsByClassName('delete');
    
    for(var i = 0; i < enlacesBorrar.length; i++) {
        enlacesBorrar[i].addEventListener('click', borrar);
    }
    
    function borrar(event) {
        let id = event.target.dataset.id;
        request(id);
    }
});