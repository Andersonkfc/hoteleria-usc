<?php
     ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 require_once ("../utils/jpgraph/src/jpgraph.php");
	 require_once ("../utils/jpgraph/src/jpgraph_pie.php");	 
	 
	 
	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);
 
	  
	  //realiza consulta a la base de datos
	  $sql = "select satisfaccion from encuesta"; 
      $result=mysql_query($sql,$link);
			
	  //define un arreglo
	  $datos = array(); 
	  
	  
      //obtiene los datos (peso)
      while ($row = mysql_fetch_array($result)){
         $datos[] = $row['satisfaccion']; //almacenas en un array todos los resultados 

      }//fin del while  
		
	 
 
    //****************************************************
	//GENERAR GRAFICO DE TORTA
	//****************************************************

		// Se define el array de valores y el array de la leyenda		
		//$leyenda = array("Peso 1","Peso 2","Peso 3","Peso N");
		 $leyenda = $datos;
		 
		//Se define el grafico
		$grafico = new PieGraph(450,400);
		 
		//Definimos el titulo
		$grafico->title->Set("satisfaccion");
		$grafico->title->SetFont(FF_FONT1,FS_BOLD);
		 
		//Añadimos el titulo y la leyenda
		//$datos es el arreglo que obtiene la informacion de la base de datos
		$imc = new PiePlot($datos);
		$imc->SetLegends($leyenda);
		$imc->SetCenter(0.4);
		 
		//Se muestra el grafico
		$grafico->Add($imc);
		$grafico->Stroke();
	
		
	//****************************************************

	 //libera memoria
	 mysql_free_result ($result);

		
	 	
?>