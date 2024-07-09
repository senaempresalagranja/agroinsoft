<!DOCTYPE html>
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<head>
	<title>Ayuda en Linea</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">

	<!-- fondo y distribucion -->

	<!--  estilos formularios  -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	<link rel="stylesheet" type="text/css" href="../estilos/buscador.css">

	<!--  estilos formularios  -->

	<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>

	<!--MENU -->	

	<script src="js/query.js"></script>

</head> 
<body>
<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Novedad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Ayuda</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>             
				  
</div>

	<section class="contenido">
	

 	<form class="form" action="consulta_automatica_ayuda.php" method="POST">
<br><br>
<br>
<div class="input_conteiner">

<div class="input_item">

	<div id="buscador">
	<div>
	<label for="">Consulta Inquietud</label>	
	</div>

	<div id="item_buscardor">
	
         		       <input type="text" autocomplete="off" class="busqueda" name="ayuda"  style="text-transform: uppercase;"  id="terAyuda" class="form-control">
                <div id="contenedor">
  
     			 </div>
</div>

</div>

<div class="input_conteiner">

<div class="input_item">

	<div class="input_conteiner">


	<div id="contenedor1">
	


	</div>


	   <div class="input_item">
	<label >  Descripcion: </label> 
		<textarea disabled="" name="conAyuda" id="conAyuda"> </textarea>

	</div>
</div>
</div>
	</div>



</form>
<script>



	
	$(document).ready(inicio);

function inicio() {


 $("#terAyuda").keyup(consulta_automatica);



}

function consulta_automatica() {
var boton=document.getElementById('contenedor').style.display='block';
var terAyuda=document.getElementById('terAyuda').value;
terAyuda= terAyuda.toUpperCase();

$("#contenedor").load("consulta_automatica_ayuda.php", {terAyuda:terAyuda});


}


function exportar() {

$("#formulario").submit();

}

</script>
</body>
</html>