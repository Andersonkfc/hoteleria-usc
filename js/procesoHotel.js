$( document ).ready(function(){
  
   
		
    //valida el boton para generar las acciones del evento
			//Limpia cajas de texto
		
	$("#btnReservar").click(function(){
  //obtiene la informacion de la caja de texto de cedula de usuario
    	catidad_persona = getCatidad();
		
	   //obtiene la informacion de la caja de texto de contraseña de usuario
    	fecha_inicio = geInicio();
		
		//obtiene la informacion de la caja de texto de nombre
    	fecha_fin = getFin();
		
		//obtiene la informacion de la caja de texto de apellido
    	id_user = getUser();
		
		//obtiene la informacion de la caja de texto de numero de tarjeta
    	tipo_habitacion_id_tipo_habitacion = getTipo();
		
		
		
		//proceso para enviar datos a php por medio de ajax
		//las variables son capturadas con JSON (  key:value)
        //donde key es la variable definida y debe ser igual a la que reciba el servidor php y value es la variable local)  
		
		$.ajax({
			//construye la ruta donde se encuentra el archivo php
			url: "../src/GuardarReserva.php",
			//define las variables
			data: {
					catidad_persona: catidad_persona,
					fecha_inicio: fecha_inicio,
					fecha_fin: fecha_fin,
					id_user: id_user,
					tipo_habitacion_id_tipo_habitacion: tipo_habitacion_id_tipo_habitacion
										
			},
			type: "POST",
			context: document.body
		}).done(function( data ) {		
			//llamado a metodo que obtiene datos
			alert(data);
			
			
			
		});

	});
$("#btnLimpiar").click(function(){
		$("#id_user").val("");
		$("#catidad_persona").val("");
		$("#fecha_inicio").val("");
		$("#fecha_fin").val("");
		$("#tipoHabitacion").val("");
		
	});
});
function obtenerDatos(){
	
		//Consulta de Datos por medio de Formato JSON
		$.getJSON( "../src/ConsultarReserva.php", function( data ) {
		
		//indica el sitio donde se mostrara la ubicacion en el formulario html
		$("#BodyTable").html("");
		
		
				
		//realiza ciclo para recorrer por (llave, valor) y mostrar los registros		
		$.each( data, function( key, val ) {
		
			//adiciona los elementos 
			$("#BodyTable").append("<tr>\
										<th>" + val.id_reserva + "</th>\
										<th>" + val.id_user + "</th>\
										<th>" + val.catidad_persona + "</th>\
										<th>" + val.fecha_inicio + "</th>\
										<th>" + val.fecha_fin + "</th>\
										<th>" + val.tipo_habitacion_id_tipo_habitacion + "</th>\
									</tr>");
		});
	
	});
	

}
//obtiene la informacion de la caja de texto cantida de persobsas
function getCatidad(){

	catidad_persona  = $("#catidad_persona").val();
	return catidad_persona;

}

//obtiene la informacion de la caja de texto dehca inicio
function geInicio(){

	fecha_inicio  = $("#fecha_inicio").val();
	return fecha_inicio;

}//fin del metodo getEstatura

//obtiene la informacion de la caja de texto fecha fon
function getFin(){

	fecha_fin = $("#fecha_fin").val();
	return fecha_fin;

}
//obtiene la informacion de la caja de texto usuario
function getUser(){

	id_user  = $("#id_user").val();
	return id_user;

}
//obtiene la informacion de la caja de texto numero de numerode tipo de habitacion
function getTipo(){

	tipo_habitacion_id_tipo_habitacion  = $("#tipoHabitacion").val();
	return tipo_habitacion_id_tipo_habitacion;

}
