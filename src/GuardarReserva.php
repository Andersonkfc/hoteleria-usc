 <?php
       ini_set("display_errors", "off");
       //C�digo para incluir las librerias
	   include_once("conexion.php");

	   //Conexi�n con el servidor
	   $link=ConectarseServidor();

	   //Conexi�n con la base de datos
	    ConectarseBaseDatos($link);

	  	
		
		//obtiene la informacion de las variables inmersas en el calculo del indice de masa corporal
		$id_user									= $_POST["id_user"];
		$catidad_persona     						= $_POST["catidad_persona"];
		$fecha_inicio 								= $_POST["fecha_inicio"];
		$fecha_fin      							= $_POST["fecha_fin"];
		$tipo_habitacion_id_tipo_habitacion     	= $_POST["tipo_habitacion_id_tipo_habitacion"];
		
		
		//construye cadena con sentencia sql
		$query = "INSERT INTO reserva (id_reserva, catidad_persona, fecha_inicio, fecha_fin, id_user, tipo_habitacion_id_tipo_habitacion) VALUES ('0', '$catidad_persona', '$fecha_inicio', '$fecha_fin', '$id_user', '$tipo_habitacion_id_tipo_habitacion')";
		
		/*Ejecuci�n de la inserci�n*/
	     $respuesta=consultas($query);
	
		echo ("reserva registrada");
		
    	/*Funci�n para desconectarse de la base de datos*/
	    desconectarse($link);//cierra la conexion
 	
?>