
<?php
	//Declaro Variables
	$user_user			=  0;
	$user_pass 			=  "";
	$user_name      	=  "";
	$user_apellido		= "";
	$telefono     		= "";
	$direccion     		= "";
	$email     		    = "";
	$num_tarjeta   		= "";
	$ciudad        		= "";
	$pais	    		= "";
	//Código para incluir las librerias
	 include_once("../src/conexion.php");
	 //Conexión con el servidor
	 $link=ConectarseServidor();

	 
	 //Conexión con la base de datosrecepcion
	 ConectarseBaseDatos($link);

		 //realiza consulta a la base de datos
	 $sql = "SELECT *
				FROM user
				order by user_user";
				
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
		<script src="../js/ReporteUser.js"></script>
		<script src="../js/reportes.js"></script>
		
<title>Consultar Usuarios</title>
</head>
	<body>
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="../utils/manualUsuario.pdf">Manual</a></li>
		  <li><a href="#!">Acerca de</a></li>
		  <li class="divider"></li> 
		</ul>
		<ul id="dropdown2" class="dropdown-content">
		<li><a href="../utils/manualUsuario.pdf">Manual</a></li>
		  <li><a href="#!">Acerca de</a></li>
		  <li class="divider"></li> 
		</ul>
		<ul id="dropdown3" class="dropdown-content">
			<li><center>XML Usuario</center>
				<li><a href="../xmls/leerXMLuser.php">leer XML usuario</a>
				<li><a href="../xmls/generalXMLuser.php">Generar XML Usuario</a></li>
				<li><a href="../xmls/Usuarios.xml">Ver XML usuario</a></li>
				<li class="divider"></li>
			</li>
			<li><center>XML Reservas</center>
				<li><a href="../xmls/leerXMLreserva.php">leer XML Reservas</a>
				<li><a href="../xmls/genertaXMLreserva.php">Generar XML Reservas</a></li>
				<li><a href="../xmls/Reserva.xml">Ver XML reservas</a></li>
				<li class="divider"></li>
			</li>
		</ul>
		<ul id="dropdown4" class="dropdown-content">
		<li><a href="#!" onclick="generarExcel();">Tipo de Habitacion</li></a>
		  <li><a href="#!">Acerca de</a></li>
		  <li class="divider"></li> 
		</ul>
     <!--menu-->
		<nav class="nav-extended blue">
		<!--menu superir-->
			<div class="nav-wrapper">
			  <a href="../index.html" class="brand-logo left">HOTEL MISTICK</a>
			  <a class="brand-logo center">Administrador</a>
			  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			  <ul id="nav-mobile" class="right hide-on-med-and-down">
				
				<li><a class="dropdown-button" href="#!" data-activates="dropdown3">Reportes XML<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown4">Reportes EXCEL<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a id="closeSession" href="#">Cerrar Sesion</a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Ayuda<i class="material-icons right">arrow_drop_down</i></a></li>
				
			  </ul>
			  <!--menu movil-->
			  <ul class="side-nav" id="mobile-demo">
				
				<li><a class="dropdown-button" href="#!" data-activates="dropdown2">Ayuda<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			</div>
			<!--menu inferir-->
			
			
			  </nav>
	<div class="row">
		<div class="row col s12 center">
		<div class="row col s2"></div>
		 <form method="post" name="formUsuario" class="col s8">
			
		  <Center><b><h1>LISTAR  LOS REGISTROS USUARIOS</h1></b></Center>
		  <!-- Info General-->  
			<br>
			
			
			<div class="row col L1">	
			
			<div id=ConsultaLista>
				<table class="striped">
			
			<!-- //////////////////////////////// INICIO TITULOS/////////////////////////////////////////-->  
					<!-- Titulos de la Tabla-->	 
					<tr align ="center">
					
						<input name="txtAgrupacionInfoSQL" type="hidden" id="txtAgrupacionInfoSQL" size="20"  value="" ><br>
						<td class="col s9"><label for"txtCodigo" width="58">Buscar por Cedula</label></td>		  
						<td class="col s9">
						<input name="txtCodigo" type="text" id="txtCodigo"   style="width : 40px;"  onkeyup = "BuscarLista(';  
						$sbHtml.="'BusquedaListaUser.php',formUsuario";   
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
				 
					
				 <tr>
					
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
				$user_user     	= $row["user_user"];
				$user_name      = $row["user_name"];
				$user_apellido	= $row["user_apellido"];
				$telefono     	= $row["telefono"];
				$direccion     	= $row["direccion"];
				$email     		= $row["email"];
				$ciudad     	= $row["ciudad"];
				$pais     		= $row["pais"];
				
				
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
			</table> <br>
			<center>
				
				<div class="waves-effect waves-light btn-large blue"><input type="button" name="btnPDF" value="Generar PDF" onClick="generarUserbasicPDF();"><i class="material-icons center">play_for_work</i></div>
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
			
			