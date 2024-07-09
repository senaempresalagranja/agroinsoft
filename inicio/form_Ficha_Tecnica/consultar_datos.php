<?php 

$id=$_POST["id"];



$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM fictecnica WHERE idMaqEquipo='$id' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);

if ($resource==true) {
	echo "<script>

var funUsos=document.getElementById('funUsos').value='$resource[2]';
var desFisica=document.getElementById('desFisica').value='$resource[3]';
var espTecnica=document.getElementById('espTecnica').value='$resource[4]';
var conSeguridad=document.getElementById('conSeguridad').value='$resource[5]';
var alistamiento=document.getElementById('alistamiento').value='$resource[6]';
var verCalibracion=document.getElementById('verCalibracion').value='$resource[7]';
var instrucciones=document.getElementById('instrucciones').value='$resource[8]';
var condiciones=document.getElementById('condiciones').value='$resource[9]';
var mantenimiento=document.getElementById('mantenimiento').value='$resource[10]';
var limDesinfeccion=document.getElementById('limDesinfeccion').value='$resource[11]';
var conManejo=document.getElementById('conManejo').value='$resource[12]';



	</script>";
}else{


	echo "<script>


alert('No se Encuentran Fichas Tecnicas ')
	</script>";
}



 ?> 