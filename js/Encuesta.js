$( document ).ready(function(){
  
   
	
    //valida el boton para generar las acciones del evento
			//Limpia cajas de texto
		
	$("#btnEncuesta").click(function(){
  //obtiene la informacion de la caja de texto de cedula de usuario
    	satisfaccion = getSatisfaccion();
		
	   //obtiene la informacion de la caja de texto de o
    	hospedaje = getHospedaje();
		
		//obtiene la informacion de la caja de texto de
    	oferta = getOferta();
		
		//obtiene la informacion de la caja de texto deo
    	
		habitacion = getHabitacion();
		
		limpieza = getLimpieza();
		
		recomendacion = getRecomendacion();
		//proceso para enviar datos a php por medio de ajax
		//las variables son capturadas con JSON (  key:value)
        //donde key es la variable definida y debe ser igual a la que reciba el servidor php y value es la variable local)  
		
		$.ajax({
			//construye la ruta donde se encuentra el archivo php
			url: "../src/GuardarEncuesta.php",
			//define las variables
			data: {
					satisfaccion: satisfaccion,
					hospedaje: hospedaje,
					oferta: oferta,
					habitacion: habitacion,
					limpieza: limpieza,
					recomendacion: recomendacion
										
			},
			type: "POST",
			context: document.body
		}).done(function( data ) {		
			//llamado a metodo que obtiene datos
			alert(data);
		});

	});
});

//obtiene la informacion de la caja de texto cantida de persobsas
function getSatisfaccion(){

	satisfaccion  = $("#satisfaccion").val();
	return satisfaccion;

}
function getHospedaje(){

	hospedaje  = $("#hospedaje").val();
	return hospedaje;

}
//obtiene la informacion de la caja de texto dehca inicio
function getOferta(){

	oferta  = $("#oferta").val();
	return oferta;

}//fin del metodo getEstatura

//obtiene la informacion de la caja de texto fecha fon
function getHabitacion(){

	habitacion = $("#habitacion").val();
	return habitacion;

}
function getLimpieza(){

	limpieza = $("#limpieza").val();
	return limpieza;

}
function getRecomendacion(){

	recomendacion = $("#recomendacion").val();
	return recomendacion;

}