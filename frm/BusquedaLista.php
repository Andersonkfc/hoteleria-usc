<?php //Código para incluir las librerias
	 include_once("../src/conexion.php");
	 //Conexión con el servidor
	 $link=ConectarseServidor();

	 //Conexión con la base de datosrecepcion
	 ConectarseBaseDatos($link);
 ?>	
 
<?php

	//Declaro Variables
	$_infoAgrupada 		= $_POST ['txtAgrupacionInfoSQL'];
	
	//Declaro Variables
	
	
	//Código para incluir las librerias
	 include_once("../src/conexion.php");
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
	
  	 
	 
$sbHtml='

		
			<table   align="center">
			 <tr>
			 
			 <TH width="32">
			  <label>CODIGO</label>
 	  	     </TH>
			 <TH width="150">
			  <label># PERSONAS</label>
 	  	     </TH>
			  <TH width="150">
			  <label>fECHA INICIO</label>
 	  	     </TH>
			  <TH width="150">
			  <label>FECHA FIN</label>
 	  	     </TH>  
			 <TH width="150">
			  <label>TIPO HABITACION</label>
 	  	     </TH>
  		     </tr>
			 			 
			 <!-- //////////////////////////////// FIN TITULOS/////////////////////////////////////////-->  
			
			
			
			
			';
		
			while($row=mysql_fetch_array($result))
			    {
			   	  
			//Asigno Variables
			$id_reserva		=	$row[0];
			$nuCodigo		=   $row[4];
			$nuCatidad		=  $row[1];
			$fecha_inicio	=  $row[2];
			$fecha_fin		=  $row[3];
			$tipoHabitacion	=  $row[5];
	
			
			$sbHtml.='<tr align ="center" id = "ejemplo">';
			$sbHtml.='<td>'.$nuCodigo.'</td>';
			$sbHtml.='<td>'.$nuCatidad.'</td>';
			$sbHtml.='<td>'.$fecha_inicio.'</td>';
			$sbHtml.='<td>'.$fecha_fin.'</td>';
			$sbHtml.='<td>'.$tipoHabitacion.'</td></tr>';
			}
	    																
	 
		         
			  //libera memoria
			  mysql_free_result ($result);	
			  
			  
	$sbHtml.='
		</table> 
		 <br>
		 
		<center>
			 
			 <input type="button" name="btnPDF" value="Generar PDF" onClick="generarPDF();">
		</center>';

echo $sbHtml;

?>
	</div>
	<br/>
	<br/>
		
