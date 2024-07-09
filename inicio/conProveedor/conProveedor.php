
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

                       <h2>Consultar Proveedores</h2>
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
<input type="text" name="Nombre_proveedores" placeholder="Nombre Proveedores" id="Nombre_proveedores">
	<input type="number" name="NIT" placeholder="NIT" id="NIT">
</form>
<input type="button" value="exportar pdf" onclick="exportar_pdf()">
<input type="button" value="exportar excel" onclick="exportar_excel()">
	<input type="button" value="Consultar" onclick="Consulta_Automatica()">
	 	<input type="button" class="button" data-type="zoomin" value="ayuda" >
	<div id="contenedor_consulta"></div>
		</section>
<div id="contenedor"></div>
		</body>
	</html>	
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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=17 order by ayuda.terAyuda";
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

$("#Nombre_proveedores").keyup(Consulta_Automatica);
$("#Nombre_proveedores").keyup(validar_nombre);
$("#NIT").keyup(Consulta_Automatica);
$("#NIT").keyup(validar_codigo);

var fecha1=document.getElementById('fecha1').value;
	var fecha2=document.getElementById('fecha2').value;



}

function Consulta_Automatica() {

if (validar_nombre()==true || validar_codigo()==true ) {	
var Nombre_proveedores=document.getElementById('Nombre_proveedores').value;
var NIT=document.getElementById('NIT').value;





$("#contenedor_consulta").load("Consulta_Automatica.php",{Nombre_proveedores:Nombre_proveedores,NIT:NIT})

}else{


}

}

	function validar_nombre() {
			var Nombre_proveedores=document.getElementById('Nombre_proveedores').value; Nombre_proveedores=Nombre_proveedores.toLowerCase();
			if(Nombre_proveedores==null  || Nombre_proveedores.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_proveedores)){
			var Nombre_proveedores=document.getElementById('Nombre_proveedores').style.border="2px solid red"
				return false;

			}else if (isNaN(Nombre_proveedores)==false) {
				var Nombre_proveedores=document.getElementById('Nombre_proveedores').style.border="2px solid red"
				return false;

			}else if (Nombre_proveedores.length>50) {
				var Nombre_proveedores=document.getElementById('Nombre_proveedores').style.border="2px solid red"
				return false;

			}else{

var Nombre_proveedores=document.getElementById('Nombre_proveedores').style.border="2px solid green"

				return true;
			}


		}


				function validar_codigo () {

			var NIT=parseFloat(document.getElementById('NIT').value);

			if(NIT==null  || NIT.length==0 || /^\s+$/.test(NIT) || NIT<0){


			var NIT=document.getElementById('NIT').style.border="2px solid red"
				return false;

			}
			else if (isNaN(NIT)) {
			var NIT=document.getElementById('NIT').style.border="2px solid red"
				return false;

			}else {

			var NIT=document.getElementById('NIT').style.border="2px solid green"

				return true;
			}

		}


</script>