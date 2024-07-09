
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

	<head>
		<title>Consultar</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/buscador.css">
		<link rel="stylesheet" type="text/css" href="../../login/demo.css">
	<!-- fondo y distribucion -->

	
	<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>

			<script src="../../login/demo.js"></script>

	<!--MENU -->	
	<!--  estilos visor  -->
	
		
	
	<!--  estilos formularios  -->

	<script src="js/query.js"></script>
	 
	</head>



	<body>

	<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Consultar Maquinaria</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Consultar Cuentadantes</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>

		
           </header>         
				  
</div>


	<section class="contenido">
	<br>
	<br>
	<br>
	<form action="" method="post" id="formulario">
<input type="text" name="Nombre_Cuentadante" placeholder="Nombre Cuentadante" id="Nombre_Cuentadante">
	<input type="number" name="Cedula" placeholder="Cedula" id="Cedula">
</form>

<input type="button" value="exportar pdf" onclick="exportar_pdf()">
<input type="button" value="exportar excel" onclick="exportar_excel()">
	<input type="button" value="Consultar" onclick="Consulta_Automatica()">
	 	<input type="button" class="button" data-type="zoomin" value="ayuda" >
	<div id="contenedor_consulta"></div>
		</section>

		</body>
	</html>	
	<div id="contenedor"></div>
	<div class="overlay-container">

		<div class="window-container zoomin">


		<select name="" id="id_consulta" class="ayuda" onclick="consultar_ayuda()">
						<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=16 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

					<input type="button" value="" id="conAyuda">		
			<input class="close" type="button"  align="center"   name="" value="cerrar">	
		


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

$("#Nombre_Cuentadante").keyup(Consulta_Automatica);
$("#Nombre_Cuentadante").keyup(validar_nombre);
$("#Cedula").keyup(Consulta_Automatica);
$("#Cedula").keyup(validar_codigo);

var fecha1=document.getElementById('fecha1').value;
	var fecha2=document.getElementById('fecha2').value;



}

function Consulta_Automatica() {

if (validar_nombre()==true || validar_codigo()==true ) {	
var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').value;
var Cedula=document.getElementById('Cedula').value;





$("#contenedor_consulta").load("Consulta_Automatica.php",{Nombre_Cuentadante:Nombre_Cuentadante,Cedula:Cedula})

}else{


}

}

	function validar_nombre() {
			var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').value; Nombre_Cuentadante=Nombre_Cuentadante.toLowerCase();
			if(Nombre_Cuentadante==null  || Nombre_Cuentadante.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_Cuentadante)){
			var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').style.border="2px solid red"
				return false;

			}else if (isNaN(Nombre_Cuentadante)==false) {
				var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').style.border="2px solid red"
				return false;

			}else if (Nombre_Cuentadante.length>50) {
				var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').style.border="2px solid red"
				return false;

			}else{

var Nombre_Cuentadante=document.getElementById('Nombre_Cuentadante').style.border="2px solid green"

				return true;
			}


		}


				function validar_codigo () {

			var Cedula=parseFloat(document.getElementById('Cedula').value);

			if(Cedula==null  || Cedula.length==0 || /^\s+$/.test(Cedula) || Cedula<0){


			var Cedula=document.getElementById('Cedula').style.border="2px solid red"
				return false;

			}
			else if (isNaN(Cedula)) {
			var Cedula=document.getElementById('Cedula').style.border="2px solid red"
				return false;

			}else {

			var Cedula=document.getElementById('Cedula').style.border="2px solid green"

				return true;
			}

		}


</script>