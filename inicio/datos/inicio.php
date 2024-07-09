<!DOCTYPE html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>AGROINSOFT 2.0</title>
	<link rel="stylesheet" href="../estilos/estilos.css">
	

<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>

<!--MENU -->	
	
</head>
<body>
<div id="heade">

<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT 2.0<h3>Bienvenido Usuario</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Bienvenido <?php echo "$fila[1]"; ?></h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>

		
                    
				  
</div>
	
	


	<section class="contenido-inicio">
		<section class="conteiner-top">
		
		<div class="nombre">

				
					<h1>AGROINSOFT</h1><br>
					<span class="version">Version 2.0</span>

				</div>
		</section>
				
		
					<MARQUEE SCROLLDELAY =180 BGCOLOR="#2980b9"> Sistema de Informacion para Control y Programacion de Mantenimientos Correctivos y Preventivos de la Maquinaria y Equipos del Área Agroindustrial del SENA Centro Agropecuario "La Granja" </MARQUEE>
			<footer>

			
			<?php 
			include('../includes/footer.php');

		 ?>
				
			
			</footer>
	</section>
</body>