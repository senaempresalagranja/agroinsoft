<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="js/query.js"></script>
	<title>Mantenimiento Ejecutado</title>
</head>
<body>
	

<form action="exp_programado.php" method="POST" >


<p>Escribe la Codigo Interno</p>
<input type="number" name="codInterno" id="codInterno"> <input type="button" onclick="buscar_maquina()" value="Buscar"> Nombre maquina:  <input type="button" name="nombre_maquina" id="nombre_maquina">	<br/><br/>


Tipo Mantenimiento:
<select   name="idTipMantenimiento" id="idTipMantenimiento" required="" > Seleccione
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idTipMantenimiento, CONCAT( nomTipMantenimiento) AS idTipMantenimientonomMantenimiento FROM tipmantenimiento ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select>   
<br/><br/>


Fecha Actual: <input type="date" name="fecProgramacion" id="fecProgramacion"><br/><br/>

Fecha Programada: <input type="date" name="fecProgramado" id="fecProgramado"><br/><br/>

Observaciones:  <input type="text" name="observaciones" id="observaciones"> <br/><br/>






<input type="button" value="Registrar" onclick="enviar()">
<input type="button" value="Consultar" onclick="consultar_datos()">
<input type="button" value="Actualizar" onclick="actualizar_datos()">

<div id="contenedor">  
</div>



<input type="submit" value="Exportar">
</form>



<script>

$(document).ready(inicio);

function inicio() {
	alerT("hoiahoahao")
}
	
function buscar_maquina() {
var codInterno=document.getElementById('codInterno').value;
$("#contenedor").load("consultar_maquina.php",{codInterno:codInterno});

}


function enviar() {
	
var codInterno=document.getElementById('codInterno').value;
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var fecProgramacion=document.getElementById('fecProgramacion').value;
var fecProgramado=document.getElementById('fecProgramado').value;
var observaciones=document.getElementById('observaciones').value;

$("#contenedor").load("enviar_datos.php",{codInterno:codInterno, idTipMantenimiento:idTipMantenimiento, fecProgramacion:fecProgramacion, fecProgramado:fecProgramado,  observaciones:observaciones });


// alert(codInterno);
// alert(fecEntrada);
// alert(estMaqEntrada);
// alert(idUbicacion);
// alert(procedimiento);
// alert(nomPer);
// alert(cedPer);
}







function consultar_datos() {
	
var codInterno=document.getElementById('codInterno').value;
var fecProgramado=document.getElementById('fecProgramado').value;


$("#contenedor").load("consultar_datos.php",{codInterno:codInterno, fecProgramado:fecProgramado});



}







function actualizar_datos() {
	
var codInterno=document.getElementById('codInterno').value;
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var fecProgramacion=document.getElementById('fecProgramacion').value;
var fecProgramado=document.getElementById('fecProgramado').value;
var observaciones=document.getElementById('observaciones').value;

$("#contenedor").load("actualizar_datos.php",{codInterno:codInterno, idTipMantenimiento:idTipMantenimiento, fecProgramacion:fecProgramacion, fecProgramado:fecProgramado,  observaciones:observaciones });



// alert(codInterno);
// alert(fecEntrada);
// alert(estMaqEntrada);
// alert(idUbicacion);
// alert(procedimiento);
// alert(nomPer);
// alert(cedPer);
}

</script>

</body>
</html>