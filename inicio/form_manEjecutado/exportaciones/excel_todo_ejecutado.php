<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Mantenimiento Ejecutado.xls");

        $conexion=mysqli_connect("localhost","root","", "bdagroinsoft");	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Maquinas</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td colspan="9" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>

  <tr>
    <td colspan="10"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE MAQUINAS</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>CODIGO INTERNO</strong></td>
    <td><strong>NOMBRE </strong></td>
    <td><strong>TIPO MANTENIMIENTO </strong></td>
    <td><strong>PROVEEDOR</strong></td>
    <td><strong>FECHA MANTENIMIENTO</strong></td>
    <td><strong>PROCEDIMIENTO</strong></td>
    <td><strong>RECOMENDACIONES</strong></td>
    <td><strong>GARANTIA</strong></td>
    <td><strong>REGISTRADO POR</strong></td>
    <td><strong>DOCUMENTO</strong></td>
  </tr>
  
<?PHP

$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, nomTipMantenimiento, nomProveedor, fecEjecutado, procedimiento, recomendaciones, garantia, nomPerMantenimiento, cedPerMantenimiento FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor ");



while($res=mysqli_fetch_array($sql)){       


$fecEjecutado=$res['fecEjecutado'];
$procedimiento=$res['procedimiento'];
$recomendaciones=$res['recomendaciones'];
$garantia=$res['garantia'];
$nomPerMantenimiento=$res['nomPerMantenimiento'];
$cedPerMantenimiento=$res['cedPerMantenimiento'];
     			


?>  


 <tr>
  <td><?php echo $res[1]; ?></td>
  <td><?php echo $res[0] ?></td>
  <td><?php echo $res[2]; ?></td> 
	<td><?php echo $res[3]; ?></td>
	<td><?php echo $fecEjecutado; ?></td>
	<td><?php echo $procedimiento; ?></td>
	<td><?php echo $recomendaciones; ?></td>
	<td><?php echo $garantia; ?></td> 
	<td><?php echo $nomPerMantenimiento; ?></td>
	<td><?php echo $cedPerMantenimiento; ?></td>
     
 </tr> 
 
  <?php
}
  ?>
 
</table>
</body>
</html>