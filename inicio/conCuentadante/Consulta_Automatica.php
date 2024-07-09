<?php 

$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$Nombre_Cuentadante=$_POST["Nombre_Cuentadante"];
$Cedula=$_POST["Cedula"];

echo "<table>

<tr>
<td>Tipo de Documento</td>
<td>Numero de Documento</td>
<td>Nombres </td>
<td>Apellidos</td>
<td>Fecha de Nacimiento</td>
<td>Cargo</td>
<td>Telefono</td>
<td>EMAIL</td>
<td>Dirreccion</td>
</tr>

";


$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT `idCuentadante`, `tipDocumento`, `numDocumento`, `nomCuentadante`, `apeCuentadante`, `fecNacimiento`, cargo.nomCargo, `telCuentadante`, `emaCuentadante`, `dirCuentadante` FROM `cuentadante`INNER JOIN cargo ON cuentadante.idCargo=cargo.idCargo WHERE nomCuentadante LIKE '%$Nombre_Cuentadante%'  OR cuentadante.numDocumento LIKE '%$Cedula$Nombre_Cuentadante%'";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){
echo "<tr>

<td>$fila[1]</td>
<td>$fila[2]</td>
<td>$fila[3]</td>
<td>$fila[4]</td>
<td>$fila[5]</td>
<td>$fila[6]</td>
<td>$fila[7]</td>
<td>$fila[8]</td>
<td>$fila[9]</td>
</tr>";

}


}else{


	echo "no exisite cuenta dante $Nombre_Cuentadante";
}
echo "</table>";


 ?>