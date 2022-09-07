 <?php
       ini_set("display_errors", "off");
       //Código para incluir las librerias
	   include_once("conexion.php");

	   //Conexión con el servidor
	   $link=ConectarseServidor();

	   //Conexión con la base de datos
	    ConectarseBaseDatos($link);

	  	
		
		//obtiene la informacion de las variables inmersas en el calculo del indice de masa corporal
		$id_user									= $_POST["id_user"];
		$catidad_persona     						= $_POST["catidad_persona"];
		$fecha_inicio 								= $_POST["fecha_inicio"];
		$fecha_fin      							= $_POST["fecha_fin"];
		$tipo_habitacion_id_tipo_habitacion     	= $_POST["tipo_habitacion_id_tipo_habitacion"];
		
		
		//construye cadena con sentencia sql
		$query = "INSERT INTO reserva (id_reserva, catidad_persona, fecha_inicio, fecha_fin, id_user, tipo_habitacion_id_tipo_habitacion) VALUES ('0', '$catidad_persona', '$fecha_inicio', '$fecha_fin', '$id_user', '$tipo_habitacion_id_tipo_habitacion')";
		
		/*Ejecución de la inserción*/
	     $respuesta=consultas($query);
	
		echo ("reserva registrada");
		
    	/*Función para desconectarse de la base de datos*/
	    desconectarse($link);//cierra la conexion
 	
?>