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
	 $sql = "select * from user"; 
     
     $result=mysql_query($sql,$link);

	   
	   //inclusión de rutinas para crear informes PDF
	   $pdf=new MyFPDF ('l','mm', 'a4');
	   $pdf->AddPage('L');
	   $pdf->SetFont('Arial','B',11);
	   $pdf->Cell(0,0,"USUARIOS",0,0,'C',0);
	   $pdf->Cell(0,15,"",0,1,'',0);
	   

		//titulos de las columnas
		$pdf->SetTextColor(0,0,0); //rgb
		$pdf->Cell(10,5,'#',1,0,'C');		
		$pdf->Cell(20,5,'Cedula',1,0,'C');	
		$pdf->Cell(20,5,'Nombre',1,0,'C');	
		$pdf->Cell(20,5,'Apellido',1,0,'C');	
		$pdf->Cell(50,5,'Email',1,0,'C');	
		$pdf->Cell(20,5,'Telefono',1,0,'C');
		$pdf->Cell(35,5,'Direcion',1,0,'C');
		$pdf->Cell(20,5,'Ciudad',1,0,'C');
		$pdf->Cell(25,5,'Pais',1,0,'C');
		$pdf->Cell(5,5,'Tipo Usuario',1,1,'C');
		$pdf->SetFont('Arial','',10);

		//impresion de datos obtenidos desde la BD
		 while($row = mysql_fetch_array($result)){
			  $pdf->Cell(10,4,$row["id_user"],1,0,'C');
			  $pdf->Cell(20,4,$row["user_user"],1,0,'C');
			  $pdf->Cell(20,4,$row["user_name"],1,0,'C');
			  $pdf->Cell(20,4,$row["user_apellido"],1,0,'C');
			  $pdf->Cell(50,4,$row["email"],1,0,'C');
			  $pdf->Cell(20,4,$row["telefono"],1,0,'C');
			  
			  $pdf->Cell(35,4,$row["direccion"],1,0,'C');
			  $pdf->Cell(20,4,$row["ciudad"],1,0,'C');
			  $pdf->Cell(25,4,$row["pais"],1,0,'C');
			  $pdf->Cell(5,4,$row["usuario"],1,1,'C');
			  
			  
		  }//fin del while	
		
		 //libera memoria
		mysql_free_result ($result);

		//genera el PDF en el Navegador
		$pdf->Output();  
		//genera el PDF en un archivo
	    $pdf->Output("d:\ReporteUser.pdf");  			 
?>