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
				FROM user
				WHERE user_user LIKE '%".$_infoAgrupada."%'
				order by user_user";
				
	 $result=mysql_query($sql,$link);
	
  	 
	 
$sbHtml='

		
			<table   align="center">
			 <tr>
					<th>
						#
	    			</th>
					
	    			<th>
						Cedula
	    			</th>
	    			<th>
	    				Nombre
	    			</th>
	    			<th>
	    				Apellido
	    			</th>
					<th>
	    				Email
	    			</th>
					<th>
	    				Telefono
					</th> 
					<th>
						Direccion
					</th>
					<th>
						Ciudad
					</th>
					<th>
						Pais 
	    			</th>
					
	    		</tr>	
			 			 
			 <!-- //////////////////////////////// FIN TITULOS/////////////////////////////////////////-->  
			
			
			
			
			';
		
			while($row=mysql_fetch_array($result))
			    {
			   	  
			//Asigno Variables
			$user_user     	=	$row[0];
			$user_name      =   $row[1];
			$user_apellido	=  $row[2];
			$telefono     	=  $row[4];
			$direccion     	=  $row[5];
			$email     		=  $row[3];
	        $ciudad       	=  $row[6];
			$pais     		=  $row[7];
			
			$sbHtml.='<tr align ="center" id = "ejemplo">';
				$sbHtml.='<td>'.$user_user.'</td>';
				$sbHtml.='<td>'.$user_name.'</td>';
				$sbHtml.='<td>'.$user_apellido.'</td>';
				$sbHtml.='<td>'.$email.'</td>';
				$sbHtml.='<td>'.$telefono.'</td>';
				$sbHtml.='<td>'.$direccion.'</td>';
				$sbHtml.='<td>'.$ciudad.'</td>';
				$sbHtml.='<td>'.$pais.'</td></tr>';
			}
	    																
	 
		         
			  //libera memoria
			  mysql_free_result ($result);	
			  
			  
	$sbHtml.='
		</table> 
		 <br>
		 
		<center>
			 
			 <input type="button" name="btnPDF" value="Generar PDF" onClick="generarUserbasicPDF();">
		</center>';

echo $sbHtml;

?>
	</div>
	<br/>
	<br/>
		
