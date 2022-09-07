<!DOCTYPE html>
<html>
    <head>
        <title>Autenticación</title>
        
        <script type="text/JavaScript" src="js/jQuery.js"></script>
        <script type="text/JavaScript" src="js/Validar.js"></script> 		
		<script type="text/JavaScript" src="js/Sesiones.js"></script> 	
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
    </head>
    <body data-twttr-rendered="true">
		<div class="container">
			<div class="row">
			    <div class="col l12" align="center">
					<form role="form">
						<input type="hidden" id="hidden" name="new"  value="new">
						<center><h3>INGRESAR</h3></center>
						<center><img src ="img/login.png" width="150" height="150"></center>
						
						<div class="col s12">
							<input type="text" id="txtUsuario" data-length="11" tabindex="1" autofocus>
							<label for="txtClave">Usuario</label>
						</div>
						
						
						<div class="col s12">
							<input type="password" id="txtClave"  tabindex="2">
							<label for="txtClave">Contrase&ntilde;a</label>
						</div>
												
						<hr class="colorgraph">
						</p>
						<div class="row">
							<div class="col s6">
								<div class="waves-effect waves-light btn-large blue" tabindex="3" id="btnAceptar"><i class="material-icons right">input</i>Aceptar</div>							
							</div>
							
						
							<div class="col s6">
							<div class="waves-effect waves-light btn-large blue" tabindex="4" id="btnLimpiar"><i class="material-icons right">loop</i>Limpiar</div>							
							</div> 
						 
						</div>	       	
					</form>
				
			
				</div>
			</div>
		</div>
	</div>
    </body>    
</html>