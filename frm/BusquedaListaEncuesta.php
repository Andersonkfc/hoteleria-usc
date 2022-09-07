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
				FROM encuesta
				WHERE id_encuesta LIKE '%".$_infoAgrupada."%'
				order by id_encuesta";
				
	 $result=mysql_query($sql,$link);
	
  	 
	 
$sbHtml='

		
			<table  class="striped centered">
			  <tr>
					<th>
						# Encuesta
	    			</th>
	    			<th>
						Satisfacion
	    			</th>
	    			<th>
	    				Hospedaje
	    			</th>
	    			<th>
	    				Oferta
	    			</th>
					<th>
	    				Habitacion
	    			</th>
					<th>
	    				Limpieza
					</th> 
					<th>
						Recomendacion
					</th>
					
	    		</tr>	
			 			 
			 <!-- //////////////////////////////// FIN TITULOS/////////////////////////////////////////-->  
			
			
			
			
			';
		
			while($row=mysql_fetch_array($result))
			    {
			   	  
			//Asigno Variables
			$id_encuesta	=	$row[0];
			$satisfaccion 	=   $row[1];
			$hospedaje    	=  $row[2];
			$oferta			=  $row[3];
			$habitacion     =  $row[4];
			$limpieza     	=  $row[5];
	        $recomendacion  =  $row[6];
			
			$sbHtml.='<tr align ="center" id = "ejemplo">';
			$sbHtml.='<td>'.$id_encuesta.'</td>';
			$sbHtml.='<td>'.$satisfaccion.'</td>';
			$sbHtml.='<td>'.$hospedaje.'</td>';
			$sbHtml.='<td>'.$oferta.'</td>';
			$sbHtml.='<td>'.$habitacion.'</td>';
			$sbHtml.='<td>'.$limpieza.'</td>';
			$sbHtml.='<td>'.$recomendacion.'</td></tr>';
			}
	    																
	 
		         
			  //libera memoria
			  mysql_free_result ($result);	
			  
			  
	$sbHtml.='
		</table> 
		 <br>
		 
		<center>
			 <div class="waves-effect waves-light btn-large white"><a href="../menu/menuAdmin.html">menu Admin<i class="material-icons center">skip_previous</i></a></div>
			
			<div class="waves-effect waves-light btn-large white" ><span class="blue-text text-white"><a href="#!" onClick="generarBarra();"><i class="medium material-icons right">trending_up</i>Grafico de Barra</div></a></span>					
			<div class="waves-effect waves-light btn-large white" ><span class="blue-text text-white"><a href="#!" onClick="generarTorta();"><i class="medium material-icons right">av_timer</i>Grafico Circular</div></a></span>					
			
			</center>';

echo $sbHtml;

?>
	</div>
	<br/>
	<br/>
		
