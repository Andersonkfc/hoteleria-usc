 <?php
    ini_set("display_errors", "off");
	//Código para incluir las librerias
	 include_once("conexion.php");


	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);

	 //realiza consulta a la base de datos
	 $sql = "select * from reserva"; 
     
     $result=mysql_query($sql,$link);
	 
		while($row = mysql_fetch_array($result)){
			$datos   = array('id_reserva' => $row['id_reserva'] , 'catidad_persona' => $row['catidad_persona'] , 'fecha_inicio' => $row['fecha_inicio'], 'fecha_fin' => $row['fecha_fin'], 'tipo_habitacion_id_tipo_habitacion' => $row['tipo_habitacion_id_tipo_habitacion']);
		    $rows[]     = $datos;
		}
		echo ($datos);
	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion

    echo json_encode($rows);
 	
?>