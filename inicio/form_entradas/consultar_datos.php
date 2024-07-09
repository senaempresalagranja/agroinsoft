<?php 

$id=$_POST["id"];
$fecha_consulta=$_POST["fecha_consulta"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM entradas WHERE idMaqEquipo='$id' AND  fecEntrada='$fecha_consulta' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);

if ($resource==true) {
	echo "<script>

var fecEntrada=document.getElementById('fecEntrada').value='$resource[2]';
var estMaqEntrada=document.getElementById('estMaqEntrada').value='$resource[3]';
var idUbicacion=document.getElementById('idUbicacion').value='$resource[4]';
var procedimiento=document.getElementById('procedimiento').value='$resource[5]';
var nomPer=document.getElementById('nomPer').value='$resource[6]';
var cedPer=document.getElementById('cedPer').value='$resource[7]';


	</script>";
}else{


	echo "<script>


alert('No se Encuentran Entradas Registradas de esa maquina en esa fecha')
	</script>";
}


	

 ?> 