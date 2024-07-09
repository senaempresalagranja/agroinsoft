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
$query="SELECT `id`, maqyequipo.nomElemento, `title`, `inicio_normal`, `final_normal` FROM `manprogramado` INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo WHERE maqyequipo.codInterno LIKE '%$codigo_interno%' AND maqyequipo.nomElemento LIKE '%$nombre_maquina%' AND manprogramado.inicio_normal BETWEEN '$fecha1' AND '$fecha2'";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){
echo "

<div class='tbl-consulta'>
	<div class='fila'>
		<div class='celda'>

		<div class='nom-celda'>Nombre Maquinaria:</div> 
		<div class='conte-celda nom-maquina'>$fila[1]</div>
					
		</div>

		<div class='celda'>

		<div class='nom-celda'>Titulo Matenimiento:</div> 
		<div class='conte-celda'>$fila[2]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Fecha Inicio:</div> 
		<div class='conte-celda'>$fila[3]</div>
				
		</div>
		<div class='celda'>

		<div class='nom-celda'>Fecha Final:</div> 
		<div class='conte-celda'>$fila[4]</div>
				
		</div>

		</div>
			

</div>

		</div>";

}


}else{


	echo "No hay Mantenimientos";
}
echo "</table>";


 ?>