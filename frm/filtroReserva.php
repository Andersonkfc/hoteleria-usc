
<?php
	//Declaro Variables
	$nuCodigo			=  0;
	$nuCatidad			=  0;
	$fecha_inicio		= "";
	$fecha_fin			= "";
	$tipoHabitacion		= 0;
	
	//Código para incluir las librerias
	 include_once("../src/conexion.php");
	 //Conexión con el servidor
	 $link=ConectarseServidor();

	 
	 //Conexión con la base de datosrecepcion
	 ConectarseBaseDatos($link);

		 //realiza consulta a la base de datos
	 $sql = "SELECT *
				FROM reserva
				order by id_user";
				
	 $result=mysql_query($sql,$link);
	
  	 
	 
$sbHtml='

<html>
<head>
<script language="JavaScript" src="../js/index.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css materialize-->
		<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<!--JQUERY-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!--js materialize-->
		<script src="../js/materialize.js"></script>
		
<title>Consultar Reserva</title>
</head>
	<body>
	<div class="row">
		<div class="row col s12 center">
		<div class="row col s2"></div>
		 <form method="post" name="formUsuario" class="col s8">
			
		  <Center><b><h3>LISTAR  LOS REGISTROS USUARIOS</h3></b></Center>
		  <!-- Info General-->  
			<br>
			
			
			<div class="row col s2">	
			
			<div id=ConsultaLista>
				<table class="striped">
			
			<!-- //////////////////////////////// INICIO TITULOS/////////////////////////////////////////-->  
					<!-- Titulos de la Tabla-->	 
					<tr align ="center">
					
						<input name="txtAgrupacionInfoSQL" type="hidden" id="txtAgrupacionInfoSQL" size="20"  value="" ><br>
						<td class="col s9><label for"txtCodigo" width="58">Buscar</label></td>		  
						<td class="col s8">
						<input name="txtCodigo" type="text" id="txtCodigo"   style="width : 40px;"  onkeyup = "BuscarLista(';  
						$sbHtml.="'BusquedaLista.php',formUsuario";   
						$sbHtml.='); return false">
						
						</td>
					
					</tr>
				</table   >
			</div>
			
			</div>
			
			<div class="row"></div>
			<div id=Listado>
				<table class="striped">
				 <tr>
				 
					
				 <TH width="200">
				  <label>CODIGO</label>
				 </TH>
				 <TH width="150">
				  <label># PERSONAS</label>
				 </TH>
				  <TH width="150">
				  <label>FECHAECHA INICIO</label>
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
			</table> <br>
			<center>
				
				<div class="waves-effect waves-light btn-large blue"><input type="button" name="btnPDF" value="Generar PDF" onClick="generarPDF();"><i class="material-icons center">play_for_work</i></div>
				<div class="waves-effect waves-light btn-large white"><a href="../menu/menuAdmin.html">menu Admin<i class="material-icons center">skip_previous</i></a></div>
			
			</center>
		</div>
		</form>
	</div>
   </div>

	</body> 

</html>';

echo $sbHtml;

?> 
			
			