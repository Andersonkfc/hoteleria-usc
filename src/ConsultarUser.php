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
	 
		while($row = mysql_fetch_array($result)){
			$datos   = array('user_user' => $row['user_user'] , 'user_name' => $row['user_name'] , 'user_apellido' => $row['user_apellido'], 'email' => $row['email'], 'telefono' => $row['telefono'], 'direccion' => $row['direccion'], 'email' => $row['email'], 'direccion' => $row['direccion'], 'ciudad' => $row['ciudad'], 'pais' => $row['pais'], 'id_perfil' => $row['id_perfil']);
		    $rows[]     = $datos;
		}

	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion

    echo json_encode($rows);
 	
?>