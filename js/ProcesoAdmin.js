$( document ).ready(function(){
	obtenerDatos();
    //valida el boton para generar las acciones del evento
	$("#btnCalcular").click(function(){
	
	   //obtiene la informacion de la caja de texto de cedula de usuario
    	user_user = getuser();
	   
	   //obtiene la informacion de la caja de texto de contraseña de usuario
    	user_pass = getPass();
		user_pass1 = getPass1();
		//obtiene la informacion de la caja de texto de nombre
    	user_name = getName();
		
		//obtiene la informacion de la caja de texto de apellido
    	user_apellido = getApellido();
		
		//obtiene la informacion de la caja de texto de numero de tarjeta
    	num_tarjeta = getTarjeta();
		
		//obtiene la informacion de la caja de texto de correo
    	email = getEmail();
		
		//obtiene la informacion de la caja de texto de felefono
    	telefono = getTelefono();
		
		//obtiene la informacion de la caja de texto de numero celular
    	direccion = getDireccion();
		
		//obtiene la informacion de la caja de texto de cuidad
    	ciudad = getCiudad();
		
		//obtiene la informacion de la caja de texto de pais
    	pais = getPais();
		
		/*if ($("#txtClave").val() !==null && $("#txtClave1").val()!==null )
				{
					if($("#txtClave").val()!== $("#txtClave1").val())
					{
						alert ("contrasenas no coinciden");
					}
					else if($("#txtClave").val()== $("#txtClave1").val())
					{
						alert ("segir registro");
					}
				}
		else
			alert ("contraseña vacia");*/
		//proceso para enviar datos a php por medio de ajax
		//las variables son capturadas con JSON (  key:value)
        //donde key es la variable definida y debe ser igual a la que reciba el servidor php y value es la variable local)  
		
		$.ajax({
			//construye la ruta donde se encuentra el archivo php
			url: "../src/GuardarAdmin.php",
			//define las variables
			data: {
					user_user: user_user,
					user_pass: user_pass,
					user_name: user_name,
					user_apellido: user_apellido,
					num_tarjeta: num_tarjeta,
					email: email,
					telefono: telefono,
					direccion: direccion,
					ciudad: ciudad,
					pais: pais
					
			},
			type: "POST",
			context: document.body
		}).done(function( data ) {		
			//llamado a metodo que obtiene datos
			//console.log(data);
			alert(data);
			//obtenerDatos();
		});

	});

});

function obtenerDatos(){
	
		//Consulta de Datos por medio de Formato JSON
		$.getJSON( "../src/ConsultarUser.php", function( data ) {
		
		//indica el sitio donde se mostrara la ubicacion en el formulario html
		$("#TableUser").html("");
		
		
				
		//realiza ciclo para recorrer por (llave, valor) y mostrar los registros		
		$.each( data, function( key, val ) {
		
			//adiciona los elementos 
			$("#TableUser").append("<tr>\
										<th>" + val.user_user + "</th>\
										<th>" + val.user_name + "</th>\
										<th>" + val.user_apellido + "</th>\
										<th>" + val.email + "</th>\
										<th>" + val.telefono + "</th>\
										<th>" + val.direccion + "</th>\
										<th>" + val.ciudad + "</th>\
										<th>" + val.pais + "</th>\
										<th>" + val.id_perfil + "</th>\
									</tr>");
		});
	
	});

}

//obtiene la informacion de la caja de texto peso
function getuser(){

	user_user  = $("#txtCedula").val();
	return user_user;

}

//obtiene la informacion de la caja de texto estatura
function getPass(){

	user_pass  = $("#txtClave").val();
	return user_pass;

}//fin del metodo getEstatura
function getPass1(){

	user_pass1  = $("#txtClave1").val();
	return user_pass1;

}//fin del metodo getEstatura

//obtiene la informacion de la caja de texto imc
function getName(){

	user_name = $("#txtNombre").val();
	return user_name;

}
//obtiene la informacion de la caja de texto apellido
function getApellido(){

	user_apellido  = $("#txtApellido").val();
	return user_apellido;

}
//obtiene la informacion de la caja de texto numero de tarjeta
function getTarjeta(){

	num_tarjeta  = $("#txtTarjeta").val();
	return num_tarjeta;

}
//obtiene la informacion de la caja de texto email.

function getEmail(){

	email  = $("#txtEmail").val();
	return email;

}
//obtiene la informacion de la caja de texto telefono
function getTelefono(){

	telefono  = $("#txtTelefono").val();
	return telefono;

}
//obtiene la informacion de la caja de texto celular
function getDireccion(){

	direccion  = $("#txtDireccion").val();
	return direccion;

}
//obtiene la informacion de la caja de texto cuidad
function getCiudad(){

	ciudad  = $("#txtCiudad").val();
	return ciudad;

}
//obtiene la informacion de la caja de texto pais
function getPais(){

	pais  = $("#txtPais").val();
	return pais;

}
