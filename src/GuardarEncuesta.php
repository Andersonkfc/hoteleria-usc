<?php
       ini_set("display_errors", "off");
       //Código para incluir las librerias
	   include_once("conexion.php");

	   //Conexión con el servidor
	   $link=ConectarseServidor();

	   //Conexión con la base de datos
	    ConectarseBaseDatos($link);

		//obtiene la informacion de las variables inmersas en el calculo del indice de masa corporal
		$satisfaccion		= $_POST["satisfaccion"];
		$hospedaje			= $_POST["hospedaje"];
		$oferta				= $_POST["oferta"];
		$habitacion	     	= $_POST["habitacion"];
		$limpieza	     	= $_POST["limpieza"];
		$recomendacion	    = $_POST["recomendacion"];
		
		//construye cadena con sentencia sql
		$query = "INSERT INTO encuesta (id_encuesta, satisfaccion, hospedaje, oferta, habitacion, limpieza, recomendacion) VALUES ('0', '$satisfaccion', '$hospedaje', '$oferta', '$habitacion', '$limpieza', '$recomendacion')";
		
		/*Ejecución de la inserción*/
	     $respuesta=consultas($query);
	
		echo ("Encuesta registrada");
		
    	/*Función para desconectarse de la base de datos*/
	    desconectarse($link);//cierra la conexion
 	
?>