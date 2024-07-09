<?php 

$local="localhost";
$usuario="root";
$contra="";
$bd="bdagroinsoft";

$hoy=$_POST["hoy"];
$nombre=$_POST["nombre"];



$conexion=mysqli_connect($local,$usuario,$contra,$bd);




$query="SELECT  id,inicio_normal,final_normal  FROM manprogramado";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {



$fecha_inicio=$fila[1];
$fecha_inicio = str_replace('/', '-', $fecha_inicio);
$fecha_inicio=date("Y-m-d",strtotime($fecha_inicio)); 


$query="SELECT DATEDIFF('$fecha_inicio','$hoy') as dias_faltantes, nomElemento, inicio_normal,final_normal  FROM manprogramado inner join maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo WHERE id='$fila[0]' AND nomElemento like '%$nombre%'";
$resource1=mysqli_query($conexion,$query);
while ($fila1=mysqli_fetch_row($resource1)) {


if ($fila1[0]<=0) {
	$color="#F029E0";
	$alerta="TIEMPO PARA MANTENIMIENTO AGOTADO";
	$fila1[0]=0;

}else if ($fila1[0]<=7) {
	$color="red";
	$alerta="URGENTE MATENIMIENTO PROXIMO";

}else if ($fila1[0]<=20) {
	$color="#FF5400";
	$alerta=" PERIODO CONSIDERABLE";
}else if($fila1[0]>=21 ){

	$color="green";
	$alerta=" A TIEMPO";
}


echo "
    

<div class='container-fluid'>
    <br>
    <div class='row'>
        

        <div class='col-md-12'>
            <label for=''> $fila1[1]</label> <label for='' style=' color:$color;'>$alerta</label> <label for=''> FECHA INICIO MANTENIMIENTO '$fila1[2]' </label>
            <div class='progress'>
                <div class='progress-bar ' role='progressbar' style='width: 13%; min-width:15%; background: $color;' >
                  <label for=''> $fila1[0] Dias </label>
                </div>
                <br/><hr/>
            </div>
        </div>
    </div>
</div>  

";

}

}

 ?>
