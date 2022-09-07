$( document ).ready(function(){
 
    //valida el boton para generar las acciones del evento
	$("#btnAceptar").click(function(){
	
	   //obtiene la informacion de la caja de texto de Usuario
    	user_user = getUsuario();
	
    	//obtiene la informacion de la caja de texto de Clave
 		user_pass = getClave();
		
		//llamado a funcion que valida el usuario
		validarUsuario(user_user, user_pass);

		//almacena usuario en ssesionStorge
		setSesion(user_user);		
		
	});

	
	//Limpia cajas de texto
	$("#btnLimpiar").click(function(){
		$("#txtUsuario").val("");
		$("#txtClave").val("");
	});	
	
	
});

//funcion para obtener los datos y mostrarlos en el formulario
function validarUsuario(user_user, user_pass){
			
		//envia url, datos (login y clave) 
		$.getJSON( "src/validarUsuario.php", {user_user:user_user,user_pass:user_pass}, function( data ) {
				
		//reaiza captura de los datos devueltos por php, en formato JSON		
		$.each( data, function( key, val ) {
		
		    //valida si la cosulta en validarUsuario obtuvo datos
			if (val.id_perfil != null){
			
			   if (val.id_perfil == 1){
					//llama  la funcion que muestra el menu del Admin
					parent.location="menu/menuAdmin.html";
			   }
   			   else if (val.id_perfil == 2){
					//llama  la funcion que muestra el menu de consulta
					parent.location="menu/menuConsulta.html";
			   }
		
			}
			else{
				 alert ("Usuario No Válido");		
			}
		});
	
	});

}//fin del metodo validarUsuario


//obtiene la informacion de la caja de texto usuario
function getUsuario(){

	user_user  = $("#txtUsuario").val();
	return user_user;

}//fin del metodo getUsuario

//obtiene la informacion de la caja de texto clave
function getClave(){

	user_pass  = $("#txtClave").val();
	return user_pass;

}//fin del metodo getClave
