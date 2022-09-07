<?php

   ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 

	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);
 
	  
	  //realiza consulta a la base de datos
	  $sql = "select * from user"; 
     
	 	 
     $result=mysql_query($sql,$link);
	   
	   
     //crea nombre del archivo excel
    $nomArchivo = "user.csv";
	
	//permite lecto escritura (w+)
	$arch = fopen($nomArchivo,"w+");

	//pinta las columnas del excel (los encabezados)
	fwrite($arch,"Cedula;Nombre;Apellidos;Email;Telefono;Direccion;Ciudad;Pais;Tipo Usuario"."\n");	
     
		 
	 //almacena en vector la informacion
	 while ($row = mysql_fetch_array($result)){
		
		fwrite($arch,$row["user_user"].";". $row["user_name"].";".$row["user_apellido"].";".$row["email"].";".$row["telefono"].";".$row["direccion"].";".$row["ciudad"].";".$row["pais"].";".$row["id_perfl"]."\n");	
				
	}//fin del while
		
	//permite descargar Archivo de excel
	$basefichero = basename("user.csv");

	header( "Content-Type: application/octet-stream");
	header( "Content-Length: ".filesize("user.csv"));
	header( "Content-Disposition: attachment; filename=".$basefichero."");
	readfile("user.csv");	
			 
	 //cierra el archivo
	 fclose($arch);
		
	 //libera memoria
	 mysql_free_result ($result);

		
	 	
?>