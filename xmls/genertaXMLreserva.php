<HTML>
<title>
   XML
</title>

<BODY>
<?php
   ini_set("display_errors", "off");
	/*Código para incluir las librerias*/
	include_once("../src/conexion.php");

	 //Conexión con el servidor
  $link=ConectarseServidor();

 //Conexión con la base de datos
  ConectarseBaseDatos($link);

 //realiza consulta a la base de datos
  $sql = "select * from reserva"; 
  $result=mysql_query($sql,$link);

     //crea nombre del archivo xml
    $nomArchivo="Reserva.xml";
	$arch = fopen($nomArchivo,"w+");

	fwrite($arch,'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\n".
						'<reserva xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">'."\n");	
           	
	
    //impresion de datos obtenidos desde la BD
	 while($row = mysql_fetch_array($result)){
	 
			$id_reserva							= $row[0];
			$catidad_persona					= $row[1];
			$fecha_inicio 						= $row[2];
			$fecha_fin		 					= $row[3];
			$id_user	 						= $row[4];			
			$tipo_habitacion_id_tipo_habitacion  = $row[5];
				 
          
		   fwrite($arch,"\t".'<datos>'."\n". 						
						"\t\t".'<documento>'.$id_reserva.'</documento>'."\n".
						"\t\t".'<id_user>'.$catidad_persona.'</id_user>'."\n".
						"\t\t".'<user_user>'.$fecha_inicio.'</user_user>'."\n".
						"\t\t".'<user_pass>'.$fecha_fin.'</user_pass>'."\n".
						"\t\t".'<num_tarjeta>'.$id_user.'</num_tarjeta>'."\n".
						"\t\t".'<user_name>'.$tipo_habitacion_id_tipo_habitacion.'</user_name>'."\n".
						"\t".'</datos>'."\n");	
              
		  
      }//fin del while	
     	fwrite($arch,'</reserva>');	
	 
	 
	 //cierra el archivo
	 fclose($arch);
	 
	 
     //libera memoria
 	mysql_free_result ($result);
	
	
	 $sbCadena =  "<script language='javascript'>";
	 $sbCadena .= "alert(  'Archivo Reserva.xml Generado con Exito' )";
     $sbCadena .= "</script>";
     echo $sbCadena;
		 	
	//retorna a la pagina anterior
	$sbCadena = '<script>window.history.back();</script>';
	echo $sbCadena;  	   

	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion


?>
</BODY>
</HTML>
