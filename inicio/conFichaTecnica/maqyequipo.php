<!DOCTYPE html>
<html>
<head>
	<title>Consulta Ficha Tecnica</title>
	<meta charset="utf-8">
	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">

	<!-- fondo y distribucion -->  

	<!--  estilos formularios  -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	
	<!--  estilos formularios  -->

	<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>

	<!--MENU -->	

	<script src="js/query.js"></script>
	 
</head> 
        
<body>
<div id="heade">

<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Maquinaria o Equipo</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png"  class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Consultar Ficha Tecnica</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>

		
                    
				  
</div>


	<section class="contenido">
	
	<!--==================================
	=            formulario             =
	===================================-->
	<form  class="form" action="exp_maquina.php" method="post" id="formulario" enctype="multipart/form-data" >


		
		    

</div>	
		
	<div class="input_conteiner">

	<div class="input_item">
	<label > Seleccionar Maquinaria o Equipo: </label>   
		<input type="number" name="codInterno" id="codInterno">

	</div>

	<div class="input_item">
  

		<input type="button" onclick="buscar_maquina()" value="Buscar">
		
	</div>

	<div class="input_item">
	<label >  Nombre Maquinaria: </label>   
		
	<input type="button" name="nombre_maquina" id="nombre_maquina">
	</div>


	

</div>

<div class="input_conteiner">


	<div class="input_item input-gran">
	 	<label>Nombre Maquina:</label>
		<input type="text" name="nomElemento" id="nomElemento">	
	</div>

	<div class="input_item">
	 <label>Codigo Inventario:</label>
		<input type="text" name="codInventario" id="codInventario">	
	</div>

	<div class="input_item">
	 <label>Codigo Interno:</label>
		<input type="text" name="codInterno" id="codInterno">	
	</div>
	
</div>
<div class="input_conteiner">
	<div class="input_item input-gran">
	
		<label>Marca:</label>
		<input type="text"  name="marElemento" id="marElemento">
			
	</div>

	<div class="input_item">

		<label>Serial:</label>
		<input type="text"  name="seriale" id="seriale">

	</div>

	<div class="input_item">

		<label>Modelo:</label>
		<input type="text"  name="modelo" id="modelo">

	</div>

</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Capacidad:</label>
		<input type="text"  name="capacidad" id="capacidad">

	</div>

	<div class="input_item">

		<label>Fecha de Adqusicion:</label> 
		<input  type="date"   value="<?php echo date('Y-m-d'); ?>" name="fecAdquisicion" id="fecAdquisicion" >

	</div>

	<div class="input_item input-gran">

	<label>Ubicacion: </label>
		<select   name="idUbicacion" required="" id="idUbicacion">
				 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idUbicacion, CONCAT(nomUbicacion) AS idUbicacionnomUbicacion FROM ubicacion ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };

                        mysqli_close($conexion);
 
	  				  ?> 
     
    
		</select>   
	</div>	

</div>	


	<div class="input_conteiner">
		<div class="input_item ">
			<label>Estado de  maquina:</label>
			<select  name="estElemento" id="estElemento">
				<option value="EN USO">EN USO</option>
				<option value="NO USO">NO USO</option>
			</select>
		</div>

		<div class="input_item">
	 <label>Responsable:</label>
		<select  id="idCuentadante" name="idCuentadante" required="" >
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idCuentadante, CONCAT( numDocumento, ' ',  nomCuentadante, ' ', apeCuentadante) AS infCuentadante FROM cuentadante";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
				</select>   	
	</div>
	
	<div class="input_item">

		<label>Numero Ficha Técnica:</label>
		<input type="text"  name="numFicTecnica" id="numFicTecnica">

	</div>

	<div class="input_item">
	 <label>Clasificacion:</label>
		<select id="idClasificacion" name="idClasificacion" required="" >
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idClasificacion, CONCAT( nomClasificacion) AS idClasificacionnomClasificacion FROM clasificacion";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
				</select>   	
	</div>
	
	</div>

	
<div class="input_conteiner">

	<div class="input_item">

		<label>Funciones y Usos:</label>
	 	<textarea name="funUsos" id="funUsos"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Descripcion Fisica:</label>
	 	<textarea name="desFisica" id="desFisica"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Especificaciones Tecnicas:</label>
	 	<textarea name="espTecnica" id="espTecnica"></textarea>

	</div>

</div><br/>
	

<div class="input_conteiner">

	<div class="input_item">

		<label>Condiciones de Seguridad en el Uso:</label>
	 	<textarea name="conSeguridad" id="conSeguridad"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Alistamiento:</label>
	 	<textarea name="alistamiento" id="alistamiento"></textarea>

	</div>

</div><br/>

<div class="input_conteiner">

	<div class="input_item">

		<label>Verificación Y/O Calibración (Incluye Frecuencia):</label>
	 	<textarea name="verCalibracion" id="verCalibracion"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Instrucciones de Uso:</label>
	 	<textarea name="instrucciones" id="instrucciones"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Condiciones del Equipo despues del Uso:</label>
	 	<textarea name="condiciones" id="condiciones"></textarea>

	</div>

</div><br/>

<div class="input_conteiner">

	<div class="input_item">

		<label>Mantenimiento (Actividades Según Su Frecuencia): </label>
	 	<textarea name="mantenimiento" id="mantenimiento"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Limpieza y Desinfeccion:</label>
	 	<textarea name="limDesinfeccion" id="limDesinfeccion"></textarea>

	</div>
	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Control Especial Durante el Manejo:</label>
	 	<textarea name="conManejo" id="conManejo"></textarea>

	</div>


</div><br/>



<div class="input_conteiner">
	<div class="input_item input-gran">

		<label>Subir Foto:</label>
		<span class="btn btn-default btn-file">
		<img src="" onclick="cambiar_imagen()" alt="" id="img">
		<input  type="file" accept=".jpg, .png, .gif" class="file"  id="files" name="imagen">
		</span>
	

	</div >
	<div class="input_item">
		<output id="list"></output>
	</div>

</div>
	<div id="contenedor">
		


	</div>
<div class="conteiner_botones">
	<div class="button">
		
 	  <div class="button">
		
		<button class="boton-item" type="button"><img class="icon" onclick="consultar_datos()" src="../iconos/consultar.svg" alt="x" /></button>

	  </div>
    	
  
 	</div>
 

</div>

	

	</form>
	
	
	<!--====  End of formulario   ====-->
	</section>

	
</body>

<script>

function buscar_maquina() {
var codInterno=document.getElementById('codInterno').value;
$("#contenedor").load("consultar_maquina.php",{codInterno:codInterno});

}


function consultar_datos() {
var img=document.getElementById('img').style.display='block';
var buscar=document.getElementById("buscar").value;
var codInterno=document.getElementById('codInterno').value;

$("#contenedor").load("consultar_datos.php",{buscar:buscar, codInterno:codInterno});

var files=document.getElementById("files").style.display='none';
}


</script>
</html>