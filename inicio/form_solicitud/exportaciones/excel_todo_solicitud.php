<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Solicitudes.xls");

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
    <td colspan="10" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="10"  bgcolor="#99CCFF"><CENTER><strong>FICHAS TECNICAS AREA AGROINDUSTRIAL</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
          <td>Novedad</td>
          <td>Criticidad</td>
          <td># Orden</td>
          <td>Solicitante</td>
          <td>Fecha Solicitud</td>
          <td>Trabajos Realizados</td>
          <td>Tipo Mantenimiento</td>
          <td>Tipo Servicio</td>
          <td>Prioridad</td>
          <td>Lugar Mantenimiento</td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT `idSolicitudes`, novedades.fecNovedad,maqyequipo.nomElemento, criticidad.nomCriticidad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, tipmantenimiento.nomTipMantenimiento, `tipServicio`, solicitudes.prioridad, `lugMantenimiento` FROM `solicitudes` INNER JOIN novedades ON solicitudes.idNovedad=novedades.idNovedad INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo inner JOIN criticidad ON solicitudes.idCriticidad=criticidad.idCriticidad INNER JOIN tipmantenimiento ON solicitudes.idtipMantenimiento=tipmantenimiento.idTipMantenimiento");


while($res=mysqli_fetch_array($sql)){		

  $fecNovedad=$res["fecNovedad"];
  $nomElemento=$res["nomElemento"];
  $nomCriticidad=$res["nomCriticidad"];
  $numOrden=$res["numOrden"];
  $solicitante=$res["solicitante"];
  $fecSolicitud=$res["fecSolicitud"];
  $traRealizar=$res["traRealizar"];
  $nomTipMantenimiento=$res["nomTipMantenimiento"];
  $tipServicio=$res["tipServicio"];
  $prioridad=$res["prioridad"];
    $lugMantenimiento=$res["lugMantenimiento"];

?>  
 <tr>

  <td><?php echo "$fecNovedad--$nomElemento"; ?></td> 
  <td><?php echo $nomCriticidad; ?></td>
  <td><?php echo $numOrden; ?></td>
  <td><?php echo $solicitante; ?></td>
  <td><?php echo $fecSolicitud; ?></td>
  <td><?php echo $traRealizar; ?></td>
  <td><?php echo $nomTipMantenimiento; ?> </td>
  <td><?php echo $tipServicio; ?></td>
  <td><?php echo $prioridad; ?></td> 
  <td><?php echo $lugMantenimiento;?></td>
                   
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>