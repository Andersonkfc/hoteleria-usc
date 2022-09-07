
//funcion que permite almacenar en sessionStorage el usuario
function setSesion(usuario){   
   sessionStorage.setItem('sessionUsuario',usuario);	
}//fin del metodo setSesion


//funcion que permite recuperar del sessionStorage el usuario
function getSesion(nombreSesion){
   var sbUsuarioSesion = sessionStorage.getItem(nombreSesion);	
   return sbUsuarioSesion;
}//fin del metodo guardarSesion


//funcion que permite eliminar del sessionStorage el usuario
function  removeSesion(nombreSesion){     
     sessionStorage.removeItem(nombreSesion);	
     
}//fin del metodo removeSesion
	