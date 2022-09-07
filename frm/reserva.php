<!DOCTYPE html>
  <!---->
  <html>
    <head>
		<title>reservas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--css materialize-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="./../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		
		
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!--js materialize-->
		<script src="./../js/materialize.js"></script>
		<!--js menus-->
		<script src="./../js/init.js"></script>
        <script type="text/JavaScript" src="./../js/Sesiones.js"></script> 	
		<script type="text/JavaScript" src="./../js/Funciones.js"></script> 				
		<script type="text/JavaScript" src="./../js/Menu.js"></script>
		
	</head>
	<body onload="getInfoSesion(); validarSesion1();">
	
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
	<nav class="nav-extended blue">
		<!--menu superir-->
			<div class="nav-wrapper">
			  <a href="../index.html" class="brand-logo left">HOTEL MISTICK</a>
			  <a class="brand-logo center">RESERVAS</a>
			  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			  <ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="../iniciarSesion">Iniciar Sesion</a></li>
				<li><a class="dropdown-button" href="utils/manualUsuario.pdf!" data-activates="dropdown1">Ayuda<i class="material-icons right">arrow_drop_down</i></a></li>
   
			  </ul>
			  <!--menu movil-->
			  <ul class="side-nav" id="mobile-demo">
				<li><a href="../iniciarSesion">Iniciar Sesion</a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown2">Ayuda<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			</div>
			
			
			<!--fin menu-->
		  </nav>
		<div class="row col s12 center">
		<h2>Gestion de Reservas</h2>
			<div class="row col s3"></div>
			<form class="col s6">
					<div class="input-field">
						<input type="number" id="id_user" data-length="1" placeholder="Cedula">
						<label for="id_user">Cedula</label>
					</div>
					
					<div class="input-field">
						<input type="number" id="catidad_persona" data-length="1" placeholder="Numero de huspedes">
						<label for="catidad_persona">Nuemero de personas</label>
					</div>
					<div id="date-picker" class="section scrollspy">
						<label for="fecha_inicio">Fecha inicio de Reserva</label>
						<input id="fecha_inicio" type="text" placeholder="DD-MM-YYYY">
					</div>
					<div id="date-picker" class="section scrollspy">
						<label for="fecha_fin">Fehac Fin de Reserva</label>
						<input id="fecha_fin" type="text" placeholder="DD-MM-YYYY">
					</div>
					<div>
						<select id="tipoHabitacion">
							 <option value="" disabled selected>Selecione el tipo de Suite</option>
							  <option value="2">Suite presidencial</option>
							 <option value="3">Suite Premium</option>
							 <option value="4">Suite Junior</option>
							 <option value="1">Suite individual</option>
						</select>
					</div>
					<hr class="colorgraph">
					<div class="row center">
					<!--botont reservar-->
							<div class="col s4">
								<div class="waves-effect waves-light btn-large blue" id="btnReservar"><i class="material-icons right">input</i>Reservar</div>							
							</div>
					<!--botont buscar-->
							<div class="col s4">
								<div class="waves-effect waves-light btn-large white" ><span class="blue-text text-white"><a href="filtroReserva.php"><i class="material-icons right">search</i>Buscar</div></a></span>					
							</div>
					<!--botont limpiar-->	
							<div class="col s4">
								<div class="waves-effect waves-light btn-large blue" id="btnLimpiar"><i class="material-icons right">loop</i>Limpiar</div>							
							</div> 
							
					</div>
			</form>
			
		</div>	
			
	<script src="./../js/procesoHotel.js"></script>
	<script src="./../js/operacion.js"></script>
	<hr>
    <div id="contenido" align="center"></div>
   </body>
</html>