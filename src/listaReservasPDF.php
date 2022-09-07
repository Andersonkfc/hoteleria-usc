<?php
 //Código para incluir las librerias
 include_once("conexion.php");
 include('MyReservaPDF.php');


 //Conexión con el servidor
  //Declaro Variables
	$_infoAgrupada 		= $_POST ['txtAgrupacionInfoSQL'];
	
	//Declaro Variables
	
	
	//Código para incluir las librerias
	 
	 //Conexión con el servidor
	 $link=ConectarseServidor();

	 
	 //Conexión con la base de datosrecepcion
	 ConectarseBaseDatos($link);

		 //realiza consulta a la base de datos
	 

		 //realiza consulta a la base de datos
	 $sql = "SELECT *
				FROM reserva
				WHERE id_user LIKE '%".$_infoAgrupada."%'
				order by id_user";
				
	 $result=mysql_query($sql,$link);
	
  	 

   //inclusión de rutinas para crear informes PDF
   $pdf=new MyFPDF();
   $pdf->AddPage('P');
   $pdf->SetFont('Arial','B',11);
   $pdf->Cell(0,8,"RESERVAS REGISTRADOS",0,0,'C',0);
   $pdf->Cell(0,20,"",0,1,'',0);

    //titulos de las columnas
    $pdf->SetTextColor(0,0,0); //rgb	
    	
    $pdf->Cell(30,5,'CEDULA',1,0,'C');	
    $pdf->Cell(27,5,'# PERSONAS',1,0,'C');	
	$pdf->Cell(40,5,'FECHA DE RESERVA',1,0,'C');
	$pdf->Cell(40,5,'FIN DE RESERVA',1,0,'C');	
	$pdf->Cell(50,5,'TIPO HABITACION',1,1,'C');		
    $pdf->SetFont('Arial','',10);

    //impresion de datos obtenidos desde la BD
	 while($row = mysql_fetch_array($result)){
         	
		  $pdf->Cell(30,4,$row["id_user"],1,0,'C');
          $pdf->Cell(27,4,$row["catidad_persona"],1,0,'C');
		  $pdf->Cell(40,4,$row["fecha_inicio"],1,0,'C');
		   $pdf->Cell(40,4,$row["fecha_fin"],1,0,'C');
		    $pdf->Cell(50,4,$row["tipo_habitacion_id_tipo_habitacion"],1,1,'C');
      }//fin del while	
    
     //libera memoria
 	mysql_free_result ($result);

    //genera el PDF en el Navegador
    $pdf->Output();  
?>
