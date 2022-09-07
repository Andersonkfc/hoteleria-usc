<?php

   ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 

	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);
 
	  
	  //realiza consulta a la base de datos
	  $sql = "select * from habitacion"; 
     
	 	 
     $result=mysql_query($sql,$link);
	   
	   
     //crea nombre del archivo excel
    $nomArchivo = "DisponibilidadHabitaciones.csv";
	
	//permite lecto escritura (w+)
	$arch = fopen($nomArchivo,"w+");

	//pinta las columnas del excel (los encabezados)
	fwrite($arch,"Nuemero de Habitacion;EStado;Tipo Habtacion"."\n");	
     
		 
	 //almacena en vector la informacion
	 while ($row = mysql_fetch_array($result)){
		
		fwrite($arch,$row["id_habitacion"].";". $row["estado"].";".$row["tipo_habitacion_id_tipo_habitacion"]."\n");	
				
	}//fin del while
		
	//permite descargar Archivo de excel
	$basefichero = basename("DisponibilidadHabitaciones.csv");

	header( "Content-Type: application/octet-stream");
	header( "Content-Length: ".filesize("DisponibilidadHabitaciones.csv"));
	header( "Content-Disposition: attachment; filename=".$basefichero."");
	readfile("DisponibilidadHabitaciones.csv");	
			 
	 //cierra el archivo
	 fclose($arch);
		
	 //libera memoria
	 mysql_free_result ($result);

		
	 	
?>