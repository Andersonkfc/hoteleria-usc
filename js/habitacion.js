$( document ).ready(function(){
  
   
		obtenerDatos();
    //valida el boton para generar las acciones del evento
			//Limpia cajas de texto
		
	$("#btnHabitacion").click(function(){
  //obtiene la informacion de la caja de texto de cedula de usuario
    	estado = getEstado();
		
	   //obtiene la informacion de la caja de texto de o
    	tipo_habitacion_id_tipo_habitacion = getTipo();
		
		//obtiene la informacion de la caja de texto de
    	hotel_id_hotel = getHotel();
		
		//obtiene la informacion de la caja de texto deo
    	
		id_habitacion = getid();
		
		
		
		//proceso para enviar datos a php por medio de ajax
		//las variables son capturadas con JSON (  key:value)
        //donde key es la variable definida y debe ser igual a la que reciba el servidor php y value es la variable local)  
		
		$.ajax({
			//construye la ruta donde se encuentra el archivo php
			url: "../src/GuardarHabitacion.php",
			//define las variables
			data: {
					id_habitacion: id_habitacion,
					estado: estado,
					hotel_id_hotel: hotel_id_hotel,
					tipo_habitacion_id_tipo_habitacion: tipo_habitacion_id_tipo_habitacion
										
			},
			type: "POST",
			context: document.body
		}).done(function( data ) {		
			//llamado a metodo que obtiene datos
			obtenerDatos();
			
			
			
		});

	});
});
function obtenerDatos(){
	
		//Consulta de Datos por medio de Formato JSON
		$.getJSON( "../src/ConsultarHabitacion.php", function( data ) {
		
		//indica el sitio donde se mostrara la ubicacion en el formulario html
		$("#TableHabitacion").html("");
		
		
				
		//realiza ciclo para recorrer por (llave, valor) y mostrar los registros		
		$.each( data, function( key, val ) {
		
			//adiciona los elementos 
			$("#TableHabitacion").append("<tr>\
										<th>" + val.id_habitacion + "</th>\
										<th>" + val.estado + "</th>\
										<th>" + val.tipo_habitacion_id_tipo_habitacion + "</th>\
										<th>" + val.hotel_id_hotel + "</th>\
									</tr>");
		});
	
	});
	

}
//obtiene la informacion de la caja de texto cantida de persobsas
function getEstado(){

	estado  = $("#estado").val();
	return estado;

}
function getid(){

	id_habitacion  = $("#id_habitacion").val();
	return id_habitacion;

}
//obtiene la informacion de la caja de texto dehca inicio
function getTipo(){

	tipo_habitacion_id_tipo_habitacion  = $("#tipoHabitacion").val();
	return tipo_habitacion_id_tipo_habitacion;

}//fin del metodo getEstatura

//obtiene la informacion de la caja de texto fecha fon
function getHotel(){

	hotel_id_hotel = $("#hotel_id_hotel").val();
	return hotel_id_hotel;

}
