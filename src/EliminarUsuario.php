<HTML>
<title>
   Usuario
</title>

<BODY>
<?php
	/*Código para incluir las librerias*/
	include_once("conexion.php");

	/*Recuperación de variables*/
	 $nuCodigo        =  $_GET["codigo"];	
	 	
	 

			
	/*Conexión con el servidor*/
	$link=ConectarseServidor();

	/*Conexión con la base de datos*/
	ConectarseBaseDatos($link);

	/*Expresión SQL para insertar datos en una tabla*/
 	$consulta="Delete From reserva Where id_user = $nuCodigo";


	/*Ejecución de la inserción*/
	$respuesta=consultas($consulta);

        //valida que se haya insertado correctamente el registro
        if ( $respuesta == 1  ){
	
     	  $sbCadena =  "<script language='javascript'>";
          $sbCadena .= "alert(  'Se Elimino Correctamente el Usuario ' )";
     	  $sbCadena .= "</script>";
     	  echo $sbCadena;
		 
 	  //retorna a la pagina anterior
          $sbCadena = '<script>window.history.back();</script>';
	  echo $sbCadena;  	
        }
	else{
	
	      $sbCadena =  "<script language='javascript'>";
	      $sbCadena .= "alert(  'Error al Eliminar el Usuario, Verifique los Datos' )";
       	      $sbCadena .= "</script>";
              echo $sbCadena;
		 
	      //retorna a la pagina anterior
	      $sbCadena = '<script>window.history.back();</script>';
	      echo $sbCadena;  	
    
	}
	

	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion


?>
</BODY>
</HTML>
