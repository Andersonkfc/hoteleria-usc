 <?php
       ini_set("display_errors", "off");
       //Código para incluir las librerias
	   include_once("conexion.php");

	   //Conexión con el servidor
	   $link=ConectarseServidor();

	   //Conexión con la base de datos
	    ConectarseBaseDatos($link);

	  	
		//obtiene la informacion de las variables inmersas en el calculo del indice de masa corporal
		$user_user     	= $_POST["user_user"];
		$user_pass 		= $_POST["user_pass"];
		$user_name      = $_POST["user_name"];
		$user_apellido	= $_POST["user_apellido"];
		$telefono     	= $_POST["telefono"];
		$direccion     	= $_POST["direccion"];
		$email     		= $_POST["email"];
		$num_tarjeta    = $_POST["num_tarjeta"];
		$ciudad     	= $_POST["ciudad"];
		$pais     		= $_POST["pais"];
		
		//construye cadena con sentencia sql
		$query = "INSERT INTO user ( id_user, user_user, user_pass, num_tarjeta, user_name, user_apellido, email, telefono, direccion, ciudad, pais, id_perfil) VALUES ( 0, $user_user, '$user_pass', $num_tarjeta, '$user_name', '$user_apellido', '$email', '$telefono', '$direccion', '$ciudad', '$pais', '2')";
		
		/*Ejecución de la inserción*/
	     $respuesta=consultas($query);
	
		echo ("USUARIO REGISTRADO CORRECTAMENTE");
		
    	/*Función para desconectarse de la base de datos*/
	    desconectarse($link);//cierra la conexion
 	
?>