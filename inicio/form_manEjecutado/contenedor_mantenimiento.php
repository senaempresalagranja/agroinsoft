<?php 

$id=$_POST["id"];
$fecha_1=$_POST["fecha_1"];
$fecha_2=$_POST["fecha_2"];


$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT manprogramado.id, maqyequipo.nomElemento, inicio_normal FROM `manprogramado` INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo WHERE maqyequipo.idMaqEquipo='$id' AND manprogramado.inicio_normal BETWEEN '$fecha_1' AND '$fecha_2'";

$resource=mysqli_query($connection,$query);
$numero=mysqli_num_rows($resource);

if ($numero>0) {
	echo "<option value='Selecciona'>Selecciona</option>";
	while ($fila=mysqli_fetch_row($resource)) {
	
echo "<option value='$fila[0]'>$fila[1]--$fila[2]</option>";
	}

}else{

echo "<option value='No hay Mantenimientos'>No hay Mantenimientos programados</option>";
 }

 ?>
