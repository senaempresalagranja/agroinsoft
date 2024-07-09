<?php 


$id_mantenimiento_ejecutado=$_POST["id_mantenimiento_ejecutado"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 

		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id WHERE idManEjecutado='$id_mantenimiento_ejecutado' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);

if ($resource==true) {
	
	echo "<script>



 var id_mantenimiento_programado=document.getElementById('id_mantenimiento_programado').value='$resource[1]';

var idTipMantenimiento=document.getElementById('idTipMantenimiento').value='$resource[2]';
var idProveedor=document.getElementById('idProveedor').value='$resource[3]';
var fecEjecutado=document.getElementById('fecEjecutado').value='$resource[4]';
var procedimiento=document.getElementById('procedimiento').value='$resource[5]';
var recomendaciones=document.getElementById('recomendaciones').value='$resource[6]';
var garantia=document.getElementById('garantia').value='$resource[7]';
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').value='$resource[8]';
var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').value='$resource[9]';


	</script>";
	
}else{


	echo "<script>


alert('No se Encuentran Novedades ')
	</script>";
}






 ?> 