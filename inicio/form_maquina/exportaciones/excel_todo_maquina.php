<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Maquinas.xls");

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
    <td colspan="13" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="14"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE MAQUINAS</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>NOMBRE MAQUINA</strong></td>
    <td><strong>CODIGO INVENTARIO</strong></td>
    <td><strong>CODIGO INTERNO </strong></td>
    <td><strong>MARCA</strong></td>
    <td><strong>SERIAL</strong></td>
    <td><strong>MODELO</strong></td>
    <td><strong>CAPACIDAD</strong></td>
    <td><strong>FECHA ADQUISICION</strong></td>
    <td><strong>UBICACION</strong></td>
    <td><strong>ESTADO</strong></td>
    <td><strong>CUENTADANTE</strong></td>
    <td><strong>N. FICHA TECNICA</strong></td>
    <td><strong>CLASIFICACION</strong></td>
    <td><strong>IMAGEN</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT nomElemento, codInventario, codInterno, marElemento, seriale, modelo, capacidad, fecAdquisicion, nomUbicacion, estElemento, nomCuentadante, apeCuentadante, numFicTecnica, nomClasificacion, imagen FROM `maqyequipo` INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion INNER JOIN cuentadante ON maqyequipo.idCuentadante=cuentadante.idCuentadante INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion");


while($res=mysqli_fetch_array($sql)){		


		  $nomElemento=$res["nomElemento"];
          $codInventario=$res['codInventario'];
          $codInterno=$res['codInterno'];
          $marElemento=$res['marElemento'];
          $seriale=$res['seriale'];
          $modelo=$res['modelo'];
          $capacidad=$res['capacidad'];
          $fecAdquisicion=$res['fecAdquisicion'];
          $estElemento=$res['estElemento'];
          $numFicTecnica=$res['numFicTecnica'];

   

?>  
 <tr>
  <td><?php echo $nomElemento; ?></td>
  <td><?php echo $codInventario; ?></td>
  <td><?php echo $codInterno; ?></td>
  <td><?php echo $marElemento; ?></td>
  <td><?php echo $seriale; ?></td>
  <td><?php echo $modelo; ?></td>
  <td><?php echo $capacidad; ?></td> 
  <td><?php echo $fecAdquisicion; ?></td>
  <td><?php echo $res[8]; ?></td>
  <td><?php echo $estElemento; ?></td>
  <td><?php echo $res[10], ' ' ,$res[11]; ?></td>
  <td><?php echo $numFicTecnica; ?></td>
  <td><?php echo $res[13]; ?></td> 
  <td><?php echo $res[14]; ?></td>                      
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>