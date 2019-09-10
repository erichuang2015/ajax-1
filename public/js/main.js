

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


/*      Busqueda
 */

var buscarIN = document.querySelector('#buscarCliente').addEventListener('keyup', buscar);
function buscar( event ){
    var rfc = document.querySelector('#buscarCliente').value;
    console.log( rfc.length );
    if( rfc.length > 0 ){
        var mxl = new XMLHttpRequest();
        mxl.open( 'GET', 'http://localhost/ajax/cliente/findRFC/'+rfc, true );
        mxl.send();
        mxl.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
                var tbody = document.querySelector( '#tbody-clientes' );
                var clie = JSON.parse(this.responseText);
                var fila = "";
                console.log(clie);
                //var fila = '<tr id="'+clie[0][1]+'"><td>'+clie[0][0]+'</td><td>'+clie[0][1]+'</td><td>'+clie[0][2]+'</td><td>'+clie[0][3]+'</td></tr>';
                tbody.innerHTML = "";
                //tbody.innerHTML = fila;
                clie.forEach( cliente =>{
                    fila += fila + '<tr id="'+cliente[1]+'"><td>'+cliente[0]+'</td><td>'+cliente[1]+'</td><td>'+cliente[2]+'</td><td>'+cliente[5]+'</td><td>'+cliente[6]+'</td><td><a href="http://localhost/ajax/cliente/editarCliente/'+cliente['ID_CLIENTE']+'/'+cliente['RAZON_SOCIAL'].replace(' ', '-')+'/'+cliente['RFC']+'/'+cliente['CORREO']+'/'+cliente['TELEFONO']+'/'+cliente['DIRECCION'].replace(' ', '-')+'/'+cliente['NOMBRE'].replace(' ', '-')+'/'+cliente['APATERNO']+'/'+cliente['AMATERNO']+'/'+cliente['CORREO_REPRE']+'/'+cliente['CELULAR_REPRE']+'" class="btn btn-info text-white">Editar</a><button class="btn btn-danger" id="btnEliminar">Eliminar</button></td><td><a href="http://localhost/ajax/cliente/perfilCliente/'+cliente['RFC']+'" class="btn btn-outline-dark">ver perfil</a></td></tr>';
                                
                } );
                tbody.innerHTML = fila;
            }
        } // fin de la función anonima
    }
}