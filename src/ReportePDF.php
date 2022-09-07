<?php
     ini_set("display_errors", "off"); 
	//Código para incluir las librerias
	 include_once("conexion.php");
	 include('MyReservaPDF.php');

	 //Conexión con el servidor
	  $link=ConectarseServidor();

	 //Conexión con la base de datos
	  ConectarseBaseDatos($link);

	 //realiza consulta a la base de datos
	 $sql = "select * from reserva"; 
     
     $result=mysql_query($sql,$link);

	   
	   //inclusión de rutinas para crear informes PDF
	   $pdf=new MyFPDF();
	   $pdf->AddPage('P');
	   $pdf->SetFont('Arial','B',11);
	   $pdf->Cell(0,5,"RESERVA",0,0,'C',0);
	   $pdf->Cell(0,15,"",0,1,'',0);

		//titulos de las columnas
		$pdf->SetTextColor(0,0,0); //rgb	
		$pdf->Cell(25,5,'Nro Reserva',1,0,'C');
		$pdf->Cell(35,5,'Usuario',1,0,'C');	
		$pdf->Cell(44,5,'Cantidad de Huspedes',1,0,'C');	
		$pdf->Cell(36,5,'Fecha de Reserva',1,0,'C');	
		$pdf->Cell(36,5,'Fin de Reserva',1,0,'C');	
		$pdf->Cell(25,5,'habitacion',1,1,'C');	
		$pdf->SetFont('Arial','',10);

		//impresion de datos obtenidos desde la BD
		 while($row = mysql_fetch_array($result)){
			  $pdf->Cell(25,4,$row["id_Reserva"],1,0,'C');
			  $pdf->Cell(35,4,$row["id_user"],1,0,'C');
			  $pdf->Cell(44,4,$row["catidad_persona"],1,0,'C');
			  $pdf->Cell(36,4,$row["fecha_inicio"],1,0,'C');
			  $pdf->Cell(36,4,$row["fecha_fin"],1,0,'C');
			  $pdf->Cell(25,4,$row["tipo_habitacion_id_tipo_habitacion"],1,1,'C');
		  }//fin del while	
		
		 //libera memoria
		mysql_free_result ($result);

		//genera el PDF en el Navegador
		$pdf->Output();  
		//genera el PDF en un archivo
	    $pdf->Output("d:\ReporteReseva.pdf");  			 
?>