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
	 
		while($row = mysql_fetch_array($result)){
			$datos   = array('id_habitacion' => $row['id_habitacion'] , 'estado' => $row['estado'] , 'tipo_habitacion_id_tipo_habitacion' => $row['tipo_habitacion_id_tipo_habitacion'], 'hotel_id_hotel' => $row['hotel_id_hotel']);
		    $rows[]     = $datos;
		}
		echo ($datos);
	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion

    echo json_encode($rows);
 	
?>