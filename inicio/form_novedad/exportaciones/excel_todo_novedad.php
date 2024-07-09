<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Novedades.xls");

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
    <td colspan="7" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="8"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE NOVEDADES</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>CODIGO INTERNO MAQUINA</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>TIPO NOVEDAD</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>PERSONA QUE REPORTA</strong></td>
    <td><strong>DOCUMENTO</strong></td>
    <td><strong>ESPECIFICACIÓN</strong></td>
    <td><strong>PRIORIDAD</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, tipNovedad, fecNovedad, perNovedad, cedPerNovedad, espNovedad, prioridad FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo ");


while($res=mysqli_fetch_array($sql)){		


	$tipNovedad=$res["tipNovedad"];
	$fecNovedad=$res["fecNovedad"];
	$perNovedad=$res["perNovedad"];
	$cedPerNovedad=$res["cedPerNovedad"];
	$espNovedad=$res["espNovedad"];	
	$prioridad=$res["prioridad"];					

?>  
 <tr>
	<td><?php echo $res[1]; ?></td>
  <td><?php echo $res[0] ?></td>
	<td><?php echo $tipNovedad; ?></td>
	<td><?php echo $fecNovedad; ?></td>
	<td><?php echo $perNovedad; ?></td>
	<td><?php echo $cedPerNovedad; ?></td>
	<td><?php echo $espNovedad; ?></td>
	<td><?php echo $prioridad; ?></td>                     
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>