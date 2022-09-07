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
  $sql = "select * from user"; 
  $result=mysql_query($sql,$link);

     //crea nombre del archivo xml
    $nomArchivo="Usuarios.xml";
	$arch = fopen($nomArchivo,"w+");

	fwrite($arch,'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\n".
						'<user xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">'."\n");	
           	
	
    //impresion de datos obtenidos desde la BD
	 while($row = mysql_fetch_array($result)){
	 
			$id_user		= $row[0];
			$user_user		= $row[1];
			$user_pass 		= $row[2];
			$num_tarjeta 	= $row[3];
			$user_name 		= $row[4];			
			$user_apellido  = $row[5];
			$email			= $row[6];
			$telefono		= $row[7];
			$direccion		= $row[9];
			$ciudad  		= $row[10];
			$pais  			= $row[11];
			$id_perfil  	= $row[12];
	 
          
		   fwrite($arch,"\t".'<datos>'."\n". 						
						"\t\t".'<documento>'.$documento.'</documento>'."\n".
						"\t\t".'<id_user>'.$nombre.'</id_user>'."\n".
						"\t\t".'<user_user>'.$apellido.'</user_user>'."\n".
						"\t\t".'<user_pass>'.$apellido.'</user_pass>'."\n".
						"\t\t".'<num_tarjeta>'.$apellido.'</num_tarjeta>'."\n".
						"\t\t".'<user_name>'.$apellido.'</user_name>'."\n".
						"\t\t".'<user_apellido>'.$direccion.'</user_apellido>'."\n".
						"\t\t".'<email>'.$email.'</email>'."\n".
						"\t\t".'<telefono>'.$telefono.'</telefono>'."\n".
						"\t\t".'<direccion>'.$direccion.'</direccion>'."\n".
						"\t\t".'<ciudad>'.$email.'</ciudad>'."\n".
						"\t\t".'<pais>'.$email.'</pais>'."\n".
						"\t\t".'<id_perfil>'.$email.'</id_perfil>'."\n".
						"\t".'</datos>'."\n");	
              
		  
      }//fin del while	
     	fwrite($arch,'</user>');	
	 
	 
	 //cierra el archivo
	 fclose($arch);
	 
	 
     //libera memoria
 	mysql_free_result ($result);
	
	
	 $sbCadena =  "<script language='javascript'>";
	 $sbCadena .= "alert(  'Archivo Ususarios.xml Generado con Exito' )";
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
