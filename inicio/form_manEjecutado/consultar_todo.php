<?php 

$id_mantenimiento_ejecutado=$_POST["id_mantenimiento_ejecutado"];


$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT `idManEjecutado`, `id`, `idTipMantenimiento`, `idProveedor`, `fecEjecutado`, `procedimiento`, `recomendaciones`, `garantia`, `nomPerMantenimiento`, `cedPerMantenimiento` FROM `manejecutado` WHERE idManEjecutado=$id_mantenimiento_ejecutado";
$resource=mysqli_query($connection,$query);
$resource=mysqli_fetch_row($resource);

echo "<script>


var idTipMantenimiento=document.getElementById('idTipMantenimiento').value='$resource[2]';
var idProveedor=document.getElementById('idProveedor').value='$resource[3]';
var fecEjecutado=document.getElementById('fecEjecutado').value='$resource[4]';
var procedimiento=document.getElementById('procedimiento').value='$resource[5]';
var recomendaciones=document.getElementById('recomendaciones').value='$resource[6]';
var garantia=document.getElementById('garantia').value='$resource[7]';
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').value='$resource[8]';
var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').value='$resource[9]';

</script>";

 ?>