//obtiene la informacion de la caja de texto clave
function getInfoSesion(){
		
	//obtiene usuario del ssesionStorge
	usuarioSesion = getSesion('sessionUsuario');
	
	//muestra el usuario autenticado de la sesion en el menu
	//se pasa por parametro el mensaje y el id del elemento html
	mostrarMensaje("Usuario: " + usuarioSesion, 'contenido');				

}//fin del metodo getClave

 $( document ).ready(function(){
	$("#closeSession").click(function(){
		removeSesion('sessionUsuario');
        parent.location="../index.html";
		
	});
});
