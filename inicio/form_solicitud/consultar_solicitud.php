<?php 

$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
echo "<select name='' id='id_solicitud'  onclick='consultar_solicitud1()'>
<option value='Selecciona'>Selecciona</option>}

";
				$query="SELECT `idSolicitudes`, novedades.idNovedad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, `idtipMantenimiento`, `tipServicio`, solicitudes.prioridad, `lugMantenimiento`,maqyequipo.nomElemento FROM `solicitudes` INNER JOIN novedades ON solicitudes.idNovedad=novedades.idNovedad INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE `fecSolicitud` BETWEEN '$fecha1' AND '$fecha2'";
				$resource=mysqli_query($conexion,$query);
	

while ($fila=mysqli_fetch_row($resource)) {
	echo "<option value='$fila[0]'>$fila[10]--$fila[4]</option>";
}

echo "</select>";
?>