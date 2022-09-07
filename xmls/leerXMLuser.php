<HTML>
<title>
   LEER XML
</title>

<BODY>
<?php
ini_set("display_errors", "off");
//*********************************************************************
//Funcion que Lee el Archivo XML
//*********************************************************************

function LeerArchivoXML($archivo) {

	//conexion a la BD
	include_once("../src/conexion.php");

	//Conexión con el servidor
	$link=ConectarseServidor();

	//Conexión con la base de datos
	ConectarseBaseDatos($link);
    
	//llamado a funcion que lee archivo xml
	$doc = simplexml_load_file($archivo);
	
	//declara variables
	$text = "";
	
	//realiza ciclo para obtener los datos del xml a partir de los item
	foreach ($doc->datos as $result) :
	
		
		$id_user		 = $result -> id_user;
		$user_user		 = $result -> user_user;
		$user_pass 		 = $result -> user_pass;
		$num_tarjeta 	 = $result -> num_tarjeta;
		$user_name 		 = $result -> user_name;
		$user_apellido   = $result -> user_apellido;
		$email			 = $result -> email;
		$telefono		 = $result -> telefono;
		$direccion		 = $result -> direccion;
		$ciudad  		 = $result -> ciudad;
		$pais  			 = $result -> pais;
		$id_perfil  	 = $result -> id_perfil;
		
		//Se ingresan los datos a la BD
		$sql = "insert into user values ('$id_user','$user_user','$user_pass','$num_tarjeta','$user_name','$user_apellido','$email','$telefono','$direccion','$ciudad','$pais','$id_perfil')";  
		$resultado=mysql_query($sql,$link);

	//fin del ciclo	
	endforeach;
	
	//retora el resultado
	return $text;
}

 //***********************************************************************
 //LLamado a Funcion que Lee el XML
 echo LeerArchivoXML("Estudiante.xml");
 //***********************************************************************
	
 //Muestra Mensaje de Almacenamiento Exitoso en la BD
 $sbCadena =  "<script language='javascript'>";
 $sbCadena .= "alert(  'Datos Ingresados a la BD con Exito' )";
 $sbCadena .= "</script>";
 echo $sbCadena;


?>
</BODY>
</HTML>
