<html>
<head>
	<title>Consultas</title>

<script scr="../../jquery-latest.js"></script>
	<?php 
include '../../login/inicio_sesion.php';

 ?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="../../login/demo.css">
		<link rel="stylesheet" type="text/css" href="../estilos/consultas.css">
		<link rel="stylesheet" type="text/css" href="../estilos/consultasdos.css">
		<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	<!-- fondo y distribucion -->

	<!--  estilos formularios  -->

	
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


	</style>

	</head>
	
	<style type="text/css" media="screen">
		 @media (min-width: 1200px) {
	 	#formulario{
	margin-top: 70px;

 }
 
	</style>

	<body>
	<div id="heade">
	<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Consultar Novedad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Consultar Novedad</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>                  
				  
			</div>

<section class="contenido">

		<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 

	
	<form action="" method="POST"  id="formulario">

	<div id="cuadro">
	
	<input class="cam-input" type="text" name="nombre_maquina" placeholder="nombre_maquina" id="nombre_maquina">

	<input class="cam-input" type="number" name="codigo_interno" placeholder="codigo_interno" id="codigo_interno">


	<div class="spa-text">ENTRE FECHAS FECHA 1</div>
	<input class="cam-input" type="date" name="fecha1"  id="fecha1">
	<div class="spa">FECHA 2 </div>
	<input  class="cam-input" type="date" name="fecha2" " id="fecha2">
</div>
	

<div class="botones">

	<button class="cam-button" onclick="Consulta_Automatica()" class="btn btn-3 "  type="button"><img class="icon"  src="../iconos/consultar.svg" alt="x" /></button>

	<button class=" cam-button" onclick="exportar_pdf()"  type="button"  class="btn btn-3 " value="Exportar"><img class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
	
	<button class="cam-button" onclick="exportar_excel()" class="btn btn-3 "  type="button"><img class="icon"  src="../iconos/expexcel.svg" alt="x" /></button>

	</div>  
</form>	
	
	<div id="contenedor_consulta"></div>
		</section>
		</body>
	</html>	
<div id="contenedor"></div>
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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=11 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

		<textarea disabled="" name=""  type="button" value="" id="conAyuda">
						
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

function exportar_pdf() {
var formulario=document.getElementById("formulario").action="exportar_pdf.php";
var formulario=document.getElementById("formulario").submit();
}


function exportar_excel() {
var formulario=document.getElementById("formulario").action="exportar_excel.php";
var formulario=document.getElementById("formulario").submit();
}


		$(document).ready(inicio)
function inicio() {

$("#nombre_maquina").keyup(Consulta_Automatica);
$("#nombre_maquina").keyup(validar_nombre);
$("#codigo_interno").keyup(Consulta_Automatica);
$("#codigo_interno").keyup(validar_codigo);





}

function Consulta_Automatica() {

if (validar_nombre()==true || validar_codigo()==true || validar_fechas()==true ) {	
var nombre_maquina=document.getElementById('nombre_maquina').value;
var codigo_interno=document.getElementById('codigo_interno').value;
var fecha1=document.getElementById('fecha1').value;
var fecha2=document.getElementById('fecha2').value;

$("#contenedor_consulta").load("Consulta_Automatica.php",{nombre_maquina:nombre_maquina,codigo_interno:codigo_interno,fecha1:fecha1,fecha2:fecha2 })

}else{


}

}

	function validar_nombre() {
			var nombre_maquina=document.getElementById('nombre_maquina').value; nombre_maquina=nombre_maquina.toLowerCase();
			if(nombre_maquina==null  || nombre_maquina.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_maquina)){
			var nombre_maquina=document.getElementById('nombre_maquina').style.border="2px solid red"
				return false;

			}else if (isNaN(nombre_maquina)==false) {
				var nombre_maquina=document.getElementById('nombre_maquina').style.border="2px solid red"
				return false;

			}else if (nombre_maquina.length>50) {
				var nombre_maquina=document.getElementById('nombre_maquina').style.border="2px solid red"
				return false;

			}else{

var nombre_maquina=document.getElementById('nombre_maquina').style.border="2px solid green"

				return true;
			}


		}


				function validar_codigo () {

			var codigo_interno=parseFloat(document.getElementById('codigo_interno').value);

			if(codigo_interno==null  || codigo_interno.length==0 || /^\s+$/.test(codigo_interno) || codigo_interno<0){


			var codigo_interno=document.getElementById('codigo_interno').style.border="2px solid red"
				return false;

			}
			else if (isNaN(codigo_interno)) {
			var codigo_interno=document.getElementById('codigo_interno').style.border="2px solid red"
				return false;

			}else {

			var codigo_interno=document.getElementById('codigo_interno').style.border="2px solid green"

				return true;
			}

		}


function validar_fechas() {
	return true
}

	</script>


	