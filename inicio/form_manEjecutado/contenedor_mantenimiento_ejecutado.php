<?php 

$id=$_POST["id"];
$fecha_3=$_POST["fecha_3"];
$fecha_4=$_POST["fecha_4"];


$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT manejecutado.idManEjecutado, maqyequipo.nomElemento, manejecutado.fecEjecutado FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo WHERE manprogramado.idMaqEquipo =$id AND manejecutado.fecEjecutado BETWEEN '$fecha_3' AND '$fecha_4'";

echo "<option value='Selecciona'>Selecciona</option>";
$resource=mysqli_query($connection,$query);
while ($fila=mysqli_fetch_row($resource)) {
	echo "<option value='$fila[0]'>$fila[1]--$fila[2]</option>";
}
 ?>
