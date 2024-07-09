<?php 

$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$nombre_maquina=$_POST["nombre_maquina"];
$codigo_interno=$_POST["codigo_interno"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];

$fecha1=date("d-m-Y",strtotime($fecha1)); 

$fecha2=date("d-m-Y",strtotime($fecha2)); 


$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT `idSolicitudes`, novedades.fecNovedad,maqyequipo.nomElemento, criticidad.nomCriticidad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, tipmantenimiento.nomTipMantenimiento, `tipServicio`, solicitudes.prioridad, `lugMantenimiento` FROM `solicitudes` INNER JOIN novedades ON solicitudes.idNovedad=novedades.idNovedad INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo inner JOIN criticidad ON solicitudes.idCriticidad=criticidad.idCriticidad INNER JOIN tipmantenimiento ON solicitudes.idtipMantenimiento=tipmantenimiento.idTipMantenimiento WHERE  maqyequipo.nomElemento LIKE '%$nombre_maquina%' OR maqyequipo.codInterno LIKE '%$codigo_interno%' OR solicitudes.fecSolicitud BETWEEN '$fecha1' AND '$fecha2' ORDER BY solicitudes.fecSolicitud";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){
echo "<div class='tbl-consulta'>
	<div class='fila'>
		<div class='celda'>

		<div class='nom-celda'>Novedad:</div> 
		<div class='conte-celda nom-maquina'>$fila[1]--$fila[2]</div>
					
		</div>

		<div class='celda'>

		<div class='nom-celda'>Criticidad:</div> 
		<div class='conte-celda'>$fila[3]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Numero Orden:</div> 
		<div class='conte-celda'>$fila[4]</div>
				
		</div>
		<div class='celda'>

		<div class='nom-celda'>Solicitante:</div> 
		<div class='conte-celda'>$fila[5]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Fecha Solicitud:</div> 
		<div class='conte-celda'>$fila[6]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Trabajo Realizado:</div> 
		<div class='conte-celda'>$fila[7]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Tipo Mantenimiento:</div> 
		<div class='conte-celda'>$fila[8]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Tipo Servicio:</div> 
		<div class='conte-celda'>$fila[9]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Prioridad:</div> 
		<div class='conte-celda'>$fila[10]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Lugar Mantenimiento:</div> 
		<div class='conte-celda'>$fila[11]</div>
				
		</div>

		</div>
			

</div>

		</div>";

}



}else{


	echo "No hay Solicitudes";
}
echo "</table>";


 ?>