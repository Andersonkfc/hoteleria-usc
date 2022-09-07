 <?php
   //  header('Content-Type: text/txt; charset=ISO-8859-1');
	ini_set("display_errors", "off");
	//Código para incluir las librerias
	 include_once("conexion.php");

	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);

	 //obtiene la informacion de las variables usuario y clave
	 $user_user = $_REQUEST["user_user"];
	 $user_pass   = $_REQUEST["user_pass"];
	  
	 //realiza consulta a la base de datos
	 $sql = "select * from user where user_user = '$user_user' and user_pass = '$user_pass' "; 
	 
     $result=mysql_query($sql,$link);
	 
		$row     = mysql_fetch_array($result);
		$datos   = array('id_perfil' => $row['id_perfil'] );
		$rows[]  = $datos;
		
		
	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion
	
    echo json_encode($rows);
 	
?>