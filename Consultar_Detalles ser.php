<html>


	<head>
		<title>Consultar Maquinaria</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../../login/demo.css">
	<link rel="stylesheet" type="text/css" href="../estilos/detalles.css">
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
<link rel="stylesheet" href="../estilos/buscador.css">

<script src="jquery.js" charset="utf-8"></script>
	</head>
	<body>
<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Detalles Maquinaria</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">
                       <h2>Detalles Maquinaria</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>

				  
</div>

<?php 

$id=$_POST["id"];
$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";

$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT maqyequipo.idMaqEquipo, `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`,  `estElemento`,imagen, `numFicTecnica`, clasificacion.nomClasificacion, ubicacion.nomUbicacion FROM `maqyequipo` INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion WHERE maqyequipo.idMaqEquipo=$id order by nomElemento";
$resource=mysqli_query($conexion,$query);

$fila=mysqli_fetch_row($resource);




 ?>

<section id="contenedor-detalles">


<div id="buscador " class="input_conteiner-top">


	<div id="item_buscardor">
		<button disabled="true" class="boton-item-top" type="button"><label>Buscar Maquinaria</label></button>
       
        <input type="text" autocomplete="off" class="busqueda" name="nombre_cultivo"  style="text-transform: uppercase;"  id="nombre_maquinaria" class="form-control">
     
                <div id="contenedor">
  
     			 </div>
    	</div>

	    

</div>




	



<div id="contendor_maquina">
<form action="" method="post" id="formulario">
<input type="text" name="id_maquinaria" style="opacity: 0" value="<?php echo $id ?>" id="">
</form>
<h1><?php echo $fila[1] ?></h1>
codigo inventario <?php echo $fila[2]  ?><br>
codigo interno  <?php echo $fila[3] ?><br>
serial  <?php echo $fila[5] ?><br>
capacidad  <?php echo $fila[7] ?><br>
fecha adquisicion  <?php echo $fila[8] ?><br>
Clasificacion  <?php echo $fila[12] ?><br>
ubicacion  <?php echo $fila[3] ?><br>
estado  <?php echo $fila[9] ?><br>
<img src="../form_maquina/imagenes/<?php echo $fila[10] ?>" alt="">

<input type="button" value="Exportar pdf" onclick="exportar_pdf()">
<input type="button" value="Exportar Excel" onclick="exportar_excel()">
<input type="button" value="ficha tecnica" onclick="cargar_fichatecnica()">
<input type="button" value="Novedades" onclick="cargar_novedades()" >
<input type="button" value="mantenimientos programados" onclick="cargar_manprogramado()">
<input type="button" value="man ejecutados" onclick="cargar_manejecutado()">

<div id="contenedor_novedades" style="display: none">





	 <table>
	 	<tr>
	 	<td>Tipo Novedad</td>
	 	<td>Fecha de Novedad</td>
	 	<td>Prioridad</td>
    <td>Realizador de la novedad</td>
    <td>Cedula realizador</td>
    <td>Especificaiones</td>

	 	<td></td>
	 	</tr>
	<?php 

$query="SELECT * FROM `novedades`  WHERE idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	$numeros=1;
	while($fila=mysqli_fetch_row($resource)){





	echo "<tr>
	<td>$fila[2]</td>
	<td>$fila[3]</td>
	<td>$fila[7]</td>
    <td>$fila[4]</td>
    <td>$fila[5]</td>
    <td>$fila[6]</td>
	</tr>";


}
}else{

	echo "<tr>
		<td colspan='3'>No hay novedades</td>
	
	</tr>";	
}


	 ?>
	 </table>

</div>
	<div id="contenedor_ficha" style="display: none">
<?php 
$query="SELECT `funUsos`, `desFisica`, `espTecnica`, `conSeguridad`, `alistamiento`, `verCalibracion`, `instrucciones`, `condiciones`, `mantenimiento`, `limDesinfeccion`, `conManejo` FROM `fictecnica` WHERE idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_fetch_row($resource);
 ?>

 Funciones y usos: <?php echo "$filas[0]"; ?> <br>
 Descripcion fisica :<?php echo "$filas[1]"; ?> <br>
 especificaciones tecnicas: <?php echo "$filas[2]"; ?> <br>
 condiciones de seguridad: <?php echo "$filas[3]"; ?> <br>
 alistamiento: <?php echo "$filas[4]"; ?> <br>
 verificacion o calibracion:<?php echo "$filas[5]"; ?> <br>
 instrucciones de uso: <?php echo "$filas[6]"; ?> <br>
 condiciones del equipo:<?php echo "$filas[7]"; ?> <br>
 mantenimiento:<?php echo "$filas[8]"; ?> <br>
 limpieza:<?php echo "$filas[9]"; ?> <br>


</div>
<div id="contenedor_manejecutado" style="display: none" >


	 <table>
	 	<tr>
	 	<td>TIPO DE MANTENIMIENTO</td>
	 	<td>PROVEEDOR</td>
	 	<td>FECHA EJECUTADA </td>
	 	<td>PROCEDIMIENTO</td>
	 	<td>RECOMENDACIONES</td>
	 	<td>GARANTIA</td>
	 	<td>NOMBRE PERSONA MANTENIMIENTO</td>
	 	<td>CEDULA</td>


	 	</tr>
<?php 
$query="SELECT `idManEjecutado`, manejecutado.id, tipmantenimiento.nomTipMantenimiento, proveedor.nomProveedor, `fecEjecutado`, `procedimiento`, `recomendaciones`, `garantia`, `nomPerMantenimiento`, `cedPerMantenimiento` FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor WHERE manprogramado.idMaqEquipo=$id";
  $numeros=1;
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){



	echo "<tr>
		<td>$fila[2]</td>
		<td>$fila[3]</td>
		<td>$fila[4]</td>
		<td>$fila[5]</td>
		<td>$fila[6]</td>
		<td>$fila[7]</td>
		<td>$fila[8]</td>
		<td>$fila[9]</td>

	</tr>";

}
echo"</table>";

}else{

	echo "<tr>
		<td colspan='3'>No hay mantenimientos</td>
	
	</tr>";	
	echo"</table>";
}
 ?>


</div>
<div id="contenedor_manprogramado" style="display: none">
	 <table>
	 	<tr>
	 	<td>TITULO</td>
	 	<td>cuerpo</td>
	 	<td>inicio </td>
	 	<td>Fin</td>
	 	</tr>
<?php 
$query="SELECT `id`, `idMaqEquipo`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal` FROM `manprogramado` where idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){



	echo "<tr>
		<td>$fila[2]</td>
		<td>$fila[3]</td>
		<td>$fila[8]</td>
		<td>$fila[9]</td>
	</tr>";
}
}else{

	echo "<tr>
		<td colspan='3'>No hay mantenimientos</td>
	
	</tr>";	
}
 ?>


</div>
</div>
</section>
</body>	
</html>
<script>
	
function cargar_novedades() {
	var contenedor_novedades=document.getElementById("contenedor_novedades").style.display="block";
	var contenedor_ficha=document.getElementById("contenedor_ficha").style.display="none";
	var contenedor_manejecutado=document.getElementById("contenedor_manejecutado").style.display="none";
	var contenedor_manprogramado=document.getElementById("contenedor_manprogramado").style.display="none";
}
function cargar_fichatecnica() {
	var contenedor_ficha=document.getElementById("contenedor_ficha").style.display="block";
	var contenedor_novedades=document.getElementById("contenedor_novedades").style.display="none";
	var contenedor_manejecutado=document.getElementById("contenedor_manejecutado").style.display="none";
	var contenedor_manprogramado=document.getElementById("contenedor_manprogramado").style.display="none";
}
function cargar_manprogramado() {
	var contenedor_manprogramado=document.getElementById("contenedor_manprogramado").style.display="block";
	var contenedor_manejecutado=document.getElementById("contenedor_manejecutado").style.display="none";
	var contenedor_ficha=document.getElementById("contenedor_ficha").style.display="none";
	var contenedor_novedades=document.getElementById("contenedor_novedades").style.display="none";
}

function cargar_manejecutado() {
	var contenedor_manejecutado=document.getElementById("contenedor_manejecutado").style.display="block";
	var contenedor_manprogramado=document.getElementById("contenedor_manprogramado").style.display="none";
	var contenedor_ficha=document.getElementById("contenedor_ficha").style.display="none";
	var contenedor_novedades=document.getElementById("contenedor_novedades").style.display="none";
}

	$(document).ready(inicio)
function inicio() {

$("#nombre_maquinaria").keyup(consulta_automatica);
$("#nombre_maquinaria").keyup(validar_consulta_automatica);
}

function consulta_automatica() {

	if (validar_consulta_automatica()==true) {
var boton=document.getElementById('contenedor').style.display='block';
var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
nombre_maquinaria= nombre_maquinaria.toUpperCase();

$("#contenedor").load("consulta_automatica_maquinaria.php", {nombre_maquinaria:nombre_maquinaria});

	}



}

function validar_consulta_automatica() {
		var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
			if(nombre_maquinaria==null  || nombre_maquinaria.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_maquinaria)){
	var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid red"
				return false;

			}else if (nombre_maquinaria.length>50) {
var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid red"
				return false;

			} else{
var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid green"

			return true;
			}
}


function buscar_maquina(id) {
	$("#contendor_maquina").load("contendor_maquina.php", {id:id})

	}


	function exportar_pdf() {
	var formulario=document.getElementById("formulario").action="exportar_detalles_pdf.php";
var formulario=document.getElementById("formulario").submit();


}

	function exportar_excel() {
	var formulario=document.getElementById("formulario").action="exportar_excel_detalles.php";
var formulario=document.getElementById("formulario").submit();


}

</script>



<script src="jquery.js" charset="utf-8"></script>
