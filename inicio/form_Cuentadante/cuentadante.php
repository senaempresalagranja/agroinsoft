 <!DOCTYPE html>
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<head>
	<title>Cuentadante</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="../../login/demo.css">
	<!-- fondo y distribucion -->

	<!--  estilos formularios  -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	<link rel="stylesheet" type="text/css" href="../estilos/buscador.css">

	<!--  estilos formularios  -->

	<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>
		<script src="../../login/demo.js"></script>
	<!--MENU -->	

	<script src="../js/query.js"></script>
	 
	
	<script src="../js/sweetalert-dev.js"></script>
	<script src="../js/sweetalertmin.js"></script> 
	
<style type="text/css" media="screen">
		form{
		margin-top: 40px;
	}
	

	@media (min-width: 530px ) {
	form{
 	margin-top: 60px;
  }
}
</style>
</head> 

<body>
<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Cuentadante</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Cuentadante</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>             
				  
</div>
</header>

	<section class="contenido">

	<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
	<!--==================================
	=            formulario             =
	===================================-->
	<form   id="formulario"  name="formulario" action="" method="POST" >

<div class="input_conteiner">

	<div class="input_item">
	 <label >Tipo Documento:  </label>   
				<select name="tipDocumento" id="tipDocumento" onclick="validar_tipo_documento()">
				<option value="Selecciona">Selecciona</option>
			<option value="TARJETA DE IDENTIDAD">Tarjeta de Identidad</option>
			<option value="CEDULA DE CIUDADANIA">Cedula de Ciudadania</option>
			<option value="CEDULA EXTRANJERA">Cedula Extranjera</option>
			<option value="PASAPORTE">Pasaporte</option>
		</select>
	</div>

	<div class="input_item">
	
		<label>Numero Documento:</label>	 
		<input type="number" name="numDocumento" id="numDocumento">
			
	</div>

</div>

<div class="input_conteiner">
	<div class="input_item">

		<label>Nombre Cuentadante: </label>
	 	<input type="text" name="nomCuentadante" id="nomCuentadante">  

	</div>
	<div class="input_item">

		<label>Apellido Cuentadante:  </label>
	 	<input type="text" name="apeCuentadante" id="apeCuentadante" >

	</div>

		<div class="input_item">

		<label>Fecha de Nacimiento: </label>
	 	<input type="date" name="fecNacimiento" id="fecNacimiento">

	</div>

</div>	
	






<div class="input_conteiner">



	<div class="input_item">

		 <label>Cargo:</label>
	 
		<select   name="idCargo" id="idCargo" required="" onclick="cargo()">
		<option value="Selecciona">Selecciona</option>
			 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idCargo, CONCAT( nomCargo) AS idCargonomCargo FROM cargo ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
      
		</select>   

	</div>



	<div class="input_item">

		<label>Telefono:  </label>
	 	<input type="number" name="telCuentadante" id="telCuentadante">

	</div>

	<div class="input_item">

		<label>Email: </label>
	 	<input type="email" name="emaCuentadante" id="emaCuentadante" required="">

	</div>

	<div class="input_item">

		<label>Dirección: </label>
	 	<input type="text" name="dirCuentadante" id="dirCuentadante">

	</div>

	

</div>
	
<div class="conteiner_botones">

		
    	<button class="btn btn-3" type="button" value="Registrar" onclick="enviar()"><img  class="icon" src="../iconos/guardar.svg" alt="x" /></button> 
  
    	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 

    	<button  class="btn btn-3" type="button" ><img onclick="actualizar_datos()" class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button  type="button"  class="btn btn-3" value="Exportar"><img onclick="exportarpdf()" class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
 
    	<button class="btn btn-3"  type="button"><img class="icon" onclick="exportarexcel()" src="../iconos/expexcel.svg" alt="x" /></button> 
  
		<button class="btn btn-3" type="button"><img class="icon" onclick="consultar_datos()" src="../iconos/consultar.svg" alt="x" /></button>
    	
		<button class="btn btn-3" type="button"><img class="icon" onclick="eliminar_datos()" src="../iconos/eliminar.svg" alt="x" /></button> 

  <button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
 
 	
</div>

<div id="contenedor">  
</div>

	</form>
	


	</section>

	<div class="overlay-container">

		<div class="window-container zoomin">

		<div class="title-poad">Ayuda</div>
		<div class="body-poad">
		
		<select name="" id="id_consulta" class="ayuda" onclick="consultar_ayuda()">
						<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=7 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

		<textarea name="" disabled="" type="button" value="" id="conAyuda">
						
					</textarea>		
			<input class="bnt-poad close" type="button"  align="center"   name="" value="cerrar">	
		

		</div>

		</div>
		</div>
<script>

function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar1.php",{id_consulta:id_consulta})
}

	


function consulta_automatica() {
var boton=document.getElementById('contenedor').style.display='block';
var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
nombre_maquinaria= nombre_maquinaria.toUpperCase();

$("#contenedor").load("consulta_automatica_maquinaria.php", {nombre_maquinaria:nombre_maquinaria});


}


function exportarpdf() {


swal({   title: "Opciones de Exportación",   text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 
        document.formulario.action="exportaciones/pdf_todo_cuentadante.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_cuentadante.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_cuentadante.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_cuentadante.php";
        document.formulario.submit();
        alert('Exportando Formulario Actual');

        } });



}



</script>


<script type="text/javascript">
	
	function prueba(){
      //un confirm
      alertify.confirm("<p>Aquí confirmamos algo.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
            if (e) {
                  alertify.success("Has pulsado '" + alertify.labels.ok + "'");
            } else { 
                        alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
            }
      }); 
      return false
}
</script>

	                         


<script>
	
// function buscar_maquina() {
// var codInterno=document.getElementById('codInterno').value;
// $("#contenedor").load("consultar_maquina.php",{codInterno:codInterno});

// }

	$(document).ready(inicio);

function inicio() {


 $("#nombre_maquinaria").keyup(consulta_automatica);
 $("#numDocumento").keyup(validar_numDocumento);
 $("#nomCuentadante").keyup(validar_nomCuentadante);
  $("#apeCuentadante").keyup(validar_apeCuentadante);
  $("#telCuentadante").keyup(validar_telCuentadante);
    $("#emaCuentadante").keyup(validar_emaCuentadante);
      $("#dirCuentadante").keyup(validar_dirCuentadante);



}
function enviar() {

if (validar_tipo_documento()==true && validar_numDocumento()==true && validar_nomCuentadante()==true && validar_apeCuentadante()==true && validar_fecNacimiento()==true && cargo()==true && validar_telCuentadante()==true && validar_emaCuentadante()==true && validar_dirCuentadante()==true) {

var tipDocumento=document.getElementById('tipDocumento').value;
var numDocumento=document.getElementById('numDocumento').value;
var nomCuentadante=document.getElementById('nomCuentadante').value;
var apeCuentadante=document.getElementById('apeCuentadante').value;
var fecNacimiento=document.getElementById('fecNacimiento').value;
var idCargo=document.getElementById('idCargo').value;
var telCuentadante=document.getElementById('telCuentadante').value;
var emaCuentadante=document.getElementById('emaCuentadante').value;
var dirCuentadante=document.getElementById('dirCuentadante').value;


$("#contenedor").load("enviar_datos.php",{tipDocumento:tipDocumento, numDocumento:numDocumento, nomCuentadante:nomCuentadante, apeCuentadante:apeCuentadante, fecNacimiento:fecNacimiento,  idCargo:idCargo,  telCuentadante:telCuentadante,  emaCuentadante:emaCuentadante,  dirCuentadante:dirCuentadante });



}else{


	alert("Algunos Campos estan Incorrectos porfavor Reviselos")
}
	


}



function consultar_datos() {
	
var numDocumento=document.getElementById('numDocumento').value;

$("#contenedor").load("consultar_datos.php",{numDocumento:numDocumento});



}




function actualizar_datos() {
	
var tipDocumento=document.getElementById('tipDocumento').value;
var numDocumento=document.getElementById('numDocumento').value;
var nomCuentadante=document.getElementById('nomCuentadante').value;
var apeCuentadante=document.getElementById('apeCuentadante').value;
var fecNacimiento=document.getElementById('fecNacimiento').value;
var idCargo=document.getElementById('idCargo').value;
var telCuentadante=document.getElementById('telCuentadante').value;
var emaCuentadante=document.getElementById('emaCuentadante').value;
var dirCuentadante=document.getElementById('dirCuentadante').value;


$("#contenedor").load("actualizar_datos.php",{tipDocumento:tipDocumento, numDocumento:numDocumento, nomCuentadante:nomCuentadante, apeCuentadante:apeCuentadante, fecNacimiento:fecNacimiento,  idCargo:idCargo, telCuentadante:telCuentadante,  emaCuentadante:emaCuentadante,  dirCuentadante:dirCuentadante });


}



function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



}

function validar_tipo_documento() {
	var tipDocumento=document.getElementById("tipDocumento").value;
	if (tipDocumento=="Selecciona") {

var tipDocumento=document.getElementById("tipDocumento").style.border="2px solid red";
return false

	}else{
var tipDocumento=document.getElementById("tipDocumento").style.border="2px solid green";
return true

	}
}


function validar_numDocumento() {
				var numDocumento=parseFloat(document.getElementById('numDocumento').value);

			if(numDocumento==null  || numDocumento.length==0 || /^\s+$/.test(numDocumento) || numDocumento<0){


var numDocumento=document.getElementById('numDocumento').style.border="2px solid red"
				return false;

			}
			else if (isNaN(numDocumento)) {
var numDocumento=document.getElementById('numDocumento').style.border="2px solid red"
				return false;

			}else {

		var numDocumento=document.getElementById('numDocumento').style.border="2px solid green"
				return true;
			}
}

function validar_nomCuentadante() {
		var nomCuentadante=document.getElementById('nomCuentadante').value;
			nomCuentadante=nomCuentadante.toLowerCase();
			if(nomCuentadante==null  || nomCuentadante.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nomCuentadante)){
	var nomCuentadante=document.getElementById('nomCuentadante').style.border="2px solid red"
				return false;

			}else if (isNaN(nomCuentadante)==false) {
var nomCuentadante=document.getElementById('nomCuentadante').style.border="2px solid red"
				return false;

			}else if (nomCuentadante.length>50) {
var nomCuentadante=document.getElementById('nomCuentadante').style.border="2px solid red"
				return false;

			}else{
var nomCuentadante=document.getElementById('nomCuentadante').style.border="2px solid green"

			return true;
			}
}


function validar_apeCuentadante() {
			var apeCuentadante=document.getElementById('apeCuentadante').value;
			apeCuentadante=apeCuentadante.toLowerCase();
			if(apeCuentadante==null  || apeCuentadante.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(apeCuentadante)){
	var apeCuentadante=document.getElementById('apeCuentadante').style.border="2px solid red"
				return false;

			}else if (isNaN(apeCuentadante)==false) {
var apeCuentadante=document.getElementById('apeCuentadante').style.border="2px solid red"
				return false;

			}else if (apeCuentadante.length>50) {
var apeCuentadante=document.getElementById('apeCuentadante').style.border="2px solid red"
				return false;

			}else{
var apeCuentadante=document.getElementById('apeCuentadante').style.border="2px solid green"

			return true;
			}
}


function cargo() {
	var idCargo=document.getElementById("idCargo").value;
	if (idCargo=="Selecciona") {

var idCargo=document.getElementById("idCargo").style.border="2px solid red";
return false

	}else{
var idCargo=document.getElementById("idCargo").style.border="2px solid green";
return true

	}
}


function validar_telCuentadante() {
					var telCuentadante=parseFloat(document.getElementById('telCuentadante').value);

			if(telCuentadante==null  || telCuentadante.length==0 || /^\s+$/.test(telCuentadante) || telCuentadante<0){


var telCuentadante=document.getElementById('telCuentadante').style.border="2px solid red"
				return false;

			}
			else if (isNaN(telCuentadante)) {
var telCuentadante=document.getElementById('telCuentadante').style.border="2px solid red"
				return false;

			}else {

		var telCuentadante=document.getElementById('telCuentadante').style.border="2px solid green"
				return true;
			}
}

function validar_emaCuentadante() {
	var emaCuentadante=document.getElementById('emaCuentadante').value;

	if (/@/.test(emaCuentadante)) {
		var emaCuentadante=document.getElementById('emaCuentadante').style.border="2px solid green"
				return true;


			}else {

			var emaCuentadante=document.getElementById('emaCuentadante').style.border="2px solid red"
				return false;
	
			}
}


function validar_dirCuentadante() {

			var dirCuentadante=document.getElementById('dirCuentadante').value;
			if(dirCuentadante==null  || dirCuentadante.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(dirCuentadante)){
	var dirCuentadante=document.getElementById('dirCuentadante').style.border="2px solid red"
				return false;

			}else if (dirCuentadante.length>50) {
var dirCuentadante=document.getElementById('dirCuentadante').style.border="2px solid red"
				return false;

			} else{
var dirCuentadante=document.getElementById('dirCuentadante').style.border="2px solid green"

			return true;
			}


}

function validar_fecNacimiento() {
	var fecNacimiento=document.getElementById('fecNacimiento').value;
	if(fecNacimiento==null  || fecNacimiento.length==0){
var fecNacimiento=document.getElementById('fecNacimiento').style.border="2px solid red"
				return false;

	}else{

var fecNacimiento=document.getElementById('fecNacimiento').style.border="2px solid green"

			return true;

	}
}
</script>
</body>

</html>
