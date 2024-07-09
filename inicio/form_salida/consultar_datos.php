<?php 

$id=$_POST["id"];
$fecha_consulta=$_POST["fecha_consulta"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM salidas WHERE idMaqEquipo='$id' AND  fecSalida='$fecha_consulta' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);

if ($resource==true) {
		
		echo "<script>


var fecSalida=document.getElementById('fecSalida').value='$resource[2]';
var fecLimRegreso=document.getElementById('fecLimRegreso').value='$resource[3]';
var idProveedor=document.getElementById('idProveedor').value='$resource[4]';
var idUbicacion=document.getElementById('idUbicacion').value='$resource[5]';
var idCuentadante=document.getElementById('idCuentadante').value='$resource[6]';
var destino=document.getElementById('destino').value='$resource[7]';



	</script>";
}else{


	echo "<script>


alert('No se Encuentran Salidas ')
	</script>";
}



 ?> 