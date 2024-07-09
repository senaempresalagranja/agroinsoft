<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Fichas Tecnicas Agroindustria.xls");

		$conexion=mysqli_connect("localhost","root","", "bdagroinsoft");
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Novedades</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="24" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="25"  bgcolor="#99CCFF"><CENTER><strong>FICHAS TECNICAS AREA AGROINDUSTRIAL</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>NOMBRE MAQUINA</strong></td>
    <td><strong>CODIGO INTERNO</strong></td>
    <td><strong>CODIGO INVENTARIO </strong></td>
    <td><strong>MARCA ELEMENTO</strong></td>
    <td><strong>SERIAL</strong></td>
    <td><strong>MODELO</strong></td>
    <td><strong>CAPACIDAD</strong></td>
    <td><strong>FECHA ADQUISICION</strong></td>
    <td><strong>UBICACION</strong></td>
    <td><strong>ESTADO ELEMENTO</strong></td>
    <td><strong>CUENTADANTE </strong></td>
    <td><strong>NUMERO FICHA TECNICA</strong></td>
    <td><strong>CLASIFICACION</strong></td>
    <td><strong>IMAGEN</strong></td>
    <td><strong>FUNCIONES Y USOS</strong></td>
    <td><strong>DESCRIPCION FISICA</strong></td>
    <td><strong>ESPECIFICACIONES TECNICAS</strong></td>
    <td><strong>CONDICIONES DE SEGURIDAD</strong></td>
    <td><strong>ALISTAMIENTO </strong></td>
    <td><strong>VERIFICACION O CALIBRACION</strong></td>
    <td><strong>INSTRUCCIONES DE USO</strong></td>
    <td><strong>CONDICIONES DEL EQUIPO DESPUES DEL USO</strong></td>
    <td><strong>MANTENIMIENTO</strong></td>
    <td><strong>LIMPIEZA Y DESINFECCION</strong></td>
    <td><strong>CONTROL DURANTE EL MANEJO</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, codInventario, marElemento, seriale, modelo, capacidad, fecAdquisicion, nomUbicacion, estElemento, nomCuentadante, apeCuentadante, numFicTecnica, nomClasificacion, imagen, funUsos, desFisica, espTecnica, conSeguridad, alistamiento, verCalibracion, instrucciones, condiciones, mantenimiento, limDesinfeccion, conManejo FROM `maqyequipo` INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion INNER JOIN cuentadante ON maqyequipo.idCuentadante=cuentadante.idCuentadante INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN fictecnica ON maqyequipo.idMaqEquipo=fictecnica.idMaqEquipo ");


while($res=mysqli_fetch_array($sql)){		

        $nomElemento=$res["nomElemento"];
        $codInterno=$res['codInterno'];
        $codInventario=$res['codInventario'];
        $marElemento=$res['marElemento'];
        $seriale=$res['seriale'];
        $modelo=$res['modelo'];
        $capacidad=$res['capacidad'];
        $fecAdquisicion=$res['fecAdquisicion'];
        $nomUbicacion=$res['nomUbicacion'];
        $estElemento=$res['estElemento'];
        $nomCuentadante=$res['nomCuentadante'];
        $apeCuentadante=$res['apeCuentadante'];
        $numFicTecnica=$res['numFicTecnica'];
        $nomClasificacion=$res['nomClasificacion'];
        $imagen=$res['imagen'];
        $funUsos=$res["funUsos"];
        $desFisica=$res["desFisica"];
        $espTecnica=$res["espTecnica"];
        $conSeguridad=$res["conSeguridad"];
        $alistamiento=$res["alistamiento"];
        $verCalibracion=$res["verCalibracion"];
        $instrucciones=$res["instrucciones"];
        $condiciones=$res["condiciones"];
        $mantenimiento=$res["mantenimiento"];
        $limDesinfeccion=$res["limDesinfeccion"];
        $conManejo=$res["conManejo"];		

?>  
 <tr>

  <td><?php echo $res[0]; ?></td> 
  <td><?php echo $res[1]; ?></td>
  <td><?php echo $res[2]; ?></td>
  <td><?php echo $res[3]; ?></td>
  <td><?php echo $res[4]; ?></td>
  <td><?php echo $res[5]; ?></td>
  <td><?php echo $res[6]; ?> </td>
  <td><?php echo $res[7]; ?></td>
  <td><?php echo $res[8]; ?></td> 
  <td><?php echo $res[9];?></td>
  <td><?php echo $res[10]; $res[11]; ?></td>
  <td><?php echo $res[12]; ?></td>
  <td><?php echo $res[13]; ?></td>
  <td><?php echo $res[14] ?></td>
  
  <td><?php echo $res[15] ?></td> 
  <td><?php echo $res[16] ?></td>
  <td><?php echo $res[17] ?></td>
  <td><?php echo $res[18] ?></td>
  <td><?php echo $res[19] ?></td>
  <td><?php echo $res[20] ?></td>
  <td><?php echo $res[21] ?> </td>   
  <td><?php echo $res[22] ?></td>
  <td><?php echo $res[23] ?></td> 
  <td><?php echo $res[24] ?></td> 
  <td><?php echo $res[25] ?></td>                      
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>