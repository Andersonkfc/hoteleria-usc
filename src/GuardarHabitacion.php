<?php
       ini_set("display_errors", "off");
       //Código para incluir las librerias
	   include_once("conexion.php");

	   //Conexión con el servidor
	   $link=ConectarseServidor();

	   //Conexión con la base de datos
	    ConectarseBaseDatos($link);

		//obtiene la informacion de las variables inmersas en el calculo del indice de masa corporal
		$id_habitacion								= $_POST["id_habitacion"];
		$estado										= $_POST["estado"];
		$hotel_id_hotel								= $_POST["hotel_id_hotel"];
		$tipo_habitacion_id_tipo_habitacion     	= $_POST["tipo_habitacion_id_tipo_habitacion"];
		
		
		//construye cadena con sentencia sql
		$query = "INSERT INTO habitacion (id_habitacion, estado, hotel_id_hotel, tipo_habitacion_id_tipo_habitacion) VALUES ('$id_habitacion', '$estado', '$hotel_id_hotel', '$tipo_habitacion_id_tipo_habitacion')";
		
		/*Ejecución de la inserción*/
	     $respuesta=consultas($query);
	
		echo ("reserva registrada");
		
    	/*Función para desconectarse de la base de datos*/
	    desconectarse($link);//cierra la conexion
 	
?>