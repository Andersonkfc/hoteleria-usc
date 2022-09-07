function isEmptyFields(form) {
  if (form.login.value=='') {
    alert ('El campo login es requerido')
    form.login.focus();
  	return false;
  }
  if (form.clave.value=='') {
	alert ('El campo Clave es requerido')
    form.clave.focus();
    return false;
  }
  return true;
}

//funcion para llamar proceso que genera reporte en pdf
function generarPDF(){
	
  //llama  la funcion que muestra el reporte en pdf
  parent.location="../src/listaReservasPDF.php";
  
}//fin de la funcion generarPDF

function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}//crea la funcion para  validar campos vacios 
function validarIngreso(form){



}//fin de la funcion validarIngreso

function BuscarLista(url,form){
    
	
	form.txtAgrupacionInfoSQL.value = form.txtCodigo.value;
	
	divResultado = document.getElementById('Listado');
	
	sbAgrupacionDias = document.getElementById('txtAgrupacionInfoSQL').value;
	
	ajax=objetoAjax();
	
	ajax.open("POST", url, true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			
			document.getElementById('Listado').innerHTML = ajax.responseText;
		}
	}
        
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		
		 ajax.send('txtAgrupacionInfoSQL='+sbAgrupacionDias);
		 //ajax.send('cbxFuncion='+sbFuncion);
}//crea la funcion para  validar campos vacios 


