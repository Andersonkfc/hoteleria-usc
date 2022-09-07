<?php
     ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 require_once ("../utils/jpgraph/src/jpgraph.php");
	 require_once ("../utils/jpgraph/src/jpgraph_pie.php");	 
	 require_once ("../utils/jpgraph/src/jpgraph_bar.php");
	
	//Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);
	$sql = "select satisfaccion, habitacion, oferta from encuesta"; 
      $result=mysql_query($sql,$link);
			
	  //define un arreglo
	  $satisfaccion = array(); 
	  $oferta = array(); 
	  $habitacion = array(); 
	   $hospedaje = array();
	  //realiza consulta a la base de datos
	  while ($row = mysql_fetch_array($result)){
			$satisfaccion[] = $row['satisfaccion']; //almacenas en un array todos los resultados 
			$hospedaje[] = $row['hospedaje'];
			$habitacion[] = $row['habitacion'];
			$oferta[] = $row['oferta'];
      }//fin del while  
		

$grafica = new Graph(500, 400);
$grafica->img->SetMargin(50,40,20,0);

$grafica->SetScale("textlin", 0, 5);

//Asigna el titulo al grafico
$grafica->title->Set("Calificaciones");

//Asigna el titulo al eje x
$grafica->xaxis->SetTitle("Categoria");

//Asigna el titulo y alineacion al eje y
$grafica->yaxis->SetTitle("total","middle");



//Asigna las etiquetas para los valores del eje x
$grafica->xaxis->SetTickLabels(array($satisfaccion, $oferta, $habitacion, $hospedaje));

//crea una serie para un grafico de barras
$satisfaccion = new BarPlot($satisfaccion);

//asigna la leyenda para la serie fisica
$satisfaccion->SetLegend("satisfaccion");

//asigna el color de relleno de las barras en formato hexadecimal
$satisfaccion->SetFillColor("#E234A9");

//crea una serie para el grafico de barras
$oferta = new BarPlot($oferta);
$oferta->SetFillColor("#E234A9");
//asigna la leyenda para la serie matematicas
$oferta->SetLegend("oferta");

//asigna el color de relleno de las barras con el nombre del color
//$matematicas->SetFillColor("blue");

//crea una serie para el grafico de barras
$habitacion = new BarPlot($habitacion);

//asigna la leyenda para la serie quimica
$habitacion->SetLegend("habitacion");



/*asigna el color de relleno de las barras, en este caso un relleno
degradado vertical que va de naranja a rojo, los tipos de degradado
los encuentras en la documentación*/
//$satisfaccion->SetFillgradient('orange','red',GRAD_VER); 

// agrupa las series del grafico
$encuesta = new GroupBarPlot(array($satisfaccion,$oferta,$habitacion,));

//agrega al grafico el grupo de series
$grafica->Add($encuesta);

//muestra el grafico
$grafica->Stroke(); 	
?>