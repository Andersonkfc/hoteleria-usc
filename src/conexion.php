<?php
    ini_set("display_errors", "off");
	
	function ConectarseServidor()
	{
		if (!($link=mysql_connect("localhost","root","")))
		{
			echo "Error conectando a la base de datos.";
			exit();
		}
		//echo "Conexión con la base de datos conseguida.<br>";
		return $link;
	}

	function ConectarseBaseDatos($link)
	{
		if (!mysql_select_db("bdhoteleria",$link))
		{
			echo "Error seleccionando la base de datos.";
			exit();
		}
		//echo "Selección con la base de datos conseguida.<br>";
	}

	function desconectarse($link)
	{
		if(!mysql_close($link))
		{
			echo "FALLO CERRANDO LA CONEXION";
			exit();
		}; //cierra la conexion
		//echo "se cerro la base de datos";
	}

	function consultas($consulta)
	{
		$respuesta=mysql_query($consulta);
		return $respuesta;
	}
	
	
?>