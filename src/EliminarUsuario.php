<HTML>
<title>
   Usuario
</title>

<BODY>
<?php
	/*C�digo para incluir las librerias*/
	include_once("conexion.php");

	/*Recuperaci�n de variables*/
	 $nuCodigo        =  $_GET["codigo"];	
	 	
	 

			
	/*Conexi�n con el servidor*/
	$link=ConectarseServidor();

	/*Conexi�n con la base de datos*/
	ConectarseBaseDatos($link);

	/*Expresi�n SQL para insertar datos en una tabla*/
 	$consulta="Delete From reserva Where id_user = $nuCodigo";


	/*Ejecuci�n de la inserci�n*/
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
	

	/*Funci�n para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion


?>
</BODY>
</HTML>
