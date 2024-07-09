<?php 

$local="localhost";
$usuario="root";
$contra="";
$bd="bdagroinsoft";

$hoy=$_POST["hoy"];
$numero_menor=$_POST["numero_menor"];
$numero_mayor=$_POST["numero_mayor"];
$nombre=$_POST["nombre"];

$conexion=mysqli_connect($local,$usuario,$contra,$bd);


$query="SELECT  id,inicio_normal,final_normal  FROM manprogramado";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {



$fecha_inicio=$fila[1];
$fecha_inicio = str_replace('/', '-', $fecha_inicio);
$fecha_inicio=date("Y-m-d",strtotime($fecha_inicio)); 






$query="SELECT DATEDIFF('$fecha_inicio','$hoy') as dias_faltantes, nomElemento, inicio_normal,final_normal  FROM manprogramado inner join maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo WHERE DATEDIFF('$fecha_inicio','$hoy') BETWEEN '$numero_menor' AND '$numero_mayor' and nomElemento like '%$nombre%' and id=$fila[0]";
$resource1=mysqli_query($conexion,$query);
while ($fila1=mysqli_fetch_row($resource1)) {



if ($fila1[0]<=0) {
    $color="#F029E0";
    $alerta="TIEMPO PARA MANTENIMIENTO AGOTADO";
    $fila1[0]=0;
    $porcentaje_actual=0;

}else if ($fila1[0]<=7) {
    $color="red";
    $alerta="URGENTE MATENIMIENTO PRÓXIMO";
    $porcentaje_actual=20;

}else if ($fila1[0]<=20) {
    $color="#FF5400";
    $alerta=" PERIODO CONSIDERABLE";
    $porcentaje_actual=50;
}else if($fila1[0]>=21 ){

    $color="green";
    $alerta=" A TIEMPO";
    $porcentaje_actual=80;
}


echo "
    

    <br>
    <div class='padre'>
        

        <div class='hijo'>
            <label for=''> $fila1[1]</label> <label for='' style=' color:$color;'>$alerta</label>  <label for=''>FECHA INICIO MANTENIMIENTO '$fila1[2]'</label>
            <div class='espiritu1'>
                <div class='progress-bar ' role='progressbar' style='width: $porcentaje_actual%; min-width:15%; background: $color;' >
                   <label for=''> $fila1[0] Dias </label>
                </div>
                <br/><hr/>
            </div>
        </div>
    </div>
 
";


}

}

 ?>
   
 </style>