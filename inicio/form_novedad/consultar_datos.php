<?php 

$id=$_POST["id"];
$fecNovedad=$_POST["fecNovedad"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM novedades WHERE idMaqEquipo='$id' AND  fecNovedad='$fecNovedad' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);
		
if ($resource==true) {
	echo "<script>

var tipNovedad=document.getElementById('tipNovedad').value='$resource[2]';
var fecNovedad=document.getElementById('fecNovedad').value='$resource[3]';
var perNovedad=document.getElementById('perNovedad').value='$resource[4]';
var cedPerNovedad=document.getElementById('cedPerNovedad').value='$resource[5]';
var espNovedad=document.getElementById('espNovedad').value='$resource[6]';
var prioridad=document.getElementById('prioridad').value='$resource[7]';


	</script>";
}else{


	echo "<script>


alert('No se Encuentran Novedades ')
	</script>";
}

	

 ?> 