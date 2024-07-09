<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Cuentadantes.xls");

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
    <td colspan="8" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="9"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE CUENTADANTES</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>TIPO DOCUMENTO</strong></td>
    <td><strong>NUMERO</strong></td>
    <td><strong>NOMBRES</strong></td>
    <td><strong>APELLIDOS</strong></td>
    <td><strong>FECHA NACIMIENTO</strong></td>
    <td><strong>CARGO</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>EMAIL</strong></td>
    <td><strong>DIRECCION</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT tipDocumento, numDocumento, nomCuentadante, apeCuentadante, fecNacimiento, nomCargo, telCuentadante, emaCuentadante, dirCuentadante FROM `cuentadante` INNER JOIN cargo ON cuentadante.idCargo=cargo.idCargo ");


while($res=mysqli_fetch_array($sql)){		


  $tipDocumento=$res["tipDocumento"];
  $numDocumento=$res["numDocumento"];
  $nomCuentadante=$res["nomCuentadante"];
  $apeCuentadante=$res["apeCuentadante"];
  $fecNacimiento=$res["fecNacimiento"];
  $emaCuentadante=$res["emaCuentadante"];
  $dirCuentadante=$res["dirCuentadante"];  			

?>  
 <tr>
  <td><?php echo $res[0]; ?></td>
  <td><?php echo $res[1]; ?></td> 
  <td><?php echo $res[2]; ?></td>
  <td><?php echo $res[3]; ?></td>
  <td><?php echo $res[4]; ?></td>
  <td><?php echo $res[5]; ?></td>
  <td><?php echo $res[6]; ?></td>
  <td><?php echo $res[7]; ?></td>  
  <td><?php echo $res[8]; ?></td>                      
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>