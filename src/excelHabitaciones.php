<?php

   ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 

	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);
 
	  
	  //realiza consulta a la base de datos
	  $sql = "select * from tipo_habitacion"; 
     
	 	 
     $result=mysql_query($sql,$link);
	   
	   
     //crea nombre del archivo excel
    $nomArchivo = "Habitaciones.csv";
	
	//permite lecto escritura (w+)
	$arch = fopen($nomArchivo,"w+");

	//pinta las columnas del excel (los encabezados)
	fwrite($arch,"Tipo Habitacion;Descripcion;Precio"."\n");	
     
		 
	 //almacena en vector la informacion
	 while ($row = mysql_fetch_array($result)){
		
		fwrite($arch,$row["nombre"].";". $row["descripcion_tip_hab"].";".$row["precio_hab"]."\n");	
				
	}//fin del while
		
	//permite descargar Archivo de excel
	$basefichero = basename("Habitaciones.csv");

	header( "Content-Type: application/octet-stream");
	header( "Content-Length: ".filesize("Habitaciones.csv"));
	header( "Content-Disposition: attachment; filename=".$basefichero."");
	readfile("Habitaciones.csv");	
			 
	 //cierra el archivo
	 fclose($arch);
		
	 //libera memoria
	 mysql_free_result ($result);

		
	 	
?>