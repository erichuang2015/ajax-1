

/*      ELIMINAR CLIENTES MEDIANTE AJAX
------------------------------------------------- */
var botones = document.querySelectorAll( '#btnEliminar' );

//console.log( botones );
botones.forEach( boton => {
    boton.addEventListener( 'click', function(){
        const rfc = boton.parentElement.parentElement.getAttribute('id');
        // Function AJAX
        const res = window.confirm('¿Desea eliminar el cliente con el RFC: ' + rfc + '?');

        if( res ){
            var ajax = new XMLHttpRequest();
            ajax.open( 'GET', 'http://localhost/ajax/cliente/eliminarCliente/' + rfc, true );
            ajax.send();
            ajax.onreadystatechange = function(){
                if( this.readyState == 4 && this.status == 200 ){
                    var tbody = document.querySelector( '#tbody-clientes' );
                    var fila = document.querySelector('#'+rfc);
                    tbody.removeChild( fila );
                }
            }
        } // fin de la confirmación
    } );
} );
