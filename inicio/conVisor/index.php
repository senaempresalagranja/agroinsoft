<!DOCTYPE html>
<html>
<head>
<?php 
include '../../login/inicio_sesion.php';

 ?>

    <title>Visor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- fondo y distribucion -->

    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="../../login/demo.css">
    <!-- fondo y distribucion -->

    <!--  estilos formularios  -->

    <link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
    <link rel="stylesheet" type="text/css" href="../estilos/buscador.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilosvisor.css">

    <!--  estilos formularios  -->

    <!--MENU -->

    <link rel="stylesheet" href="../estilos/estilosCabecera.css">
    <script src="../../jquery-latest.js"></script>
    <script src="../../main.js"></script>

    <!--MENU -->    

    <script src="../js/query.js"></script>
     
    
    <script src="../js/sweetalert-dev.js"></script>
    <script src="../js/sweetalertmin.js"></script> 

            <script src="../../login/demo.js"></script>
    
<style type="text/css">
    #id_maquina{
    
        opacity:  0;
    }
</style>



        <script type="text/javascript" src="jquery.js"></script>
          

		



		<script type="text/javascript">

              $(document).on("ready", inicio);
    function inicio(){





            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1; //hoy es 0!
            var yyyy = hoy.getFullYear();

            if(dd<10) {
                dd='0'+dd
        } 

        if(mm<10) {
            mm='0'+mm
    } 

    hoy = yyyy+'/'+mm+'/'+dd;


 var nombre=document.getElementById('nombre').value;

$("#contenedor_del_dinamizador").load("dinamizador.php",{nombre:nombre,hoy:hoy})

};



function filtrar() {

                var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1; //hoy es 0!
            var yyyy = hoy.getFullYear();

            if(dd<10) {
                dd='0'+dd
        } 

        if(mm<10) {
            mm='0'+mm
    } 

    hoy = yyyy+'/'+mm+'/'+dd;
    
var filtro=document.getElementById('filtro').value;

 if (filtro=="1"){

var numero_menor='-999999999';
var numero_mayor='0';

}else if (filtro=="2") {


    var numero_menor='1';
var numero_mayor='7';


}else if (filtro=="3") {

    var numero_menor='8';
var numero_mayor='20';

}else if (filtro=="todos") {

    inicio();
    return false;
}


else{

    var numero_menor='21';
var numero_mayor='100000000';

}

 var nombre=document.getElementById('nombre').value;
 $("#contenedor_del_dinamizador").load("dinamizador_filtro.php",{nombre:nombre,numero_mayor:numero_mayor,hoy:hoy,numero_menor:numero_menor})

}


		</script>


    <!-- SELECT DATEDIFF(final_normal,inicio_normal) AS Dias FROM `manprogramado` -->



  

      
	</head>
	<body>

<br>
<br>
<br>

        <div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Novedad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

           <div class="itms-menu">

                       <h2>Visor Mantenimientos</h2>
                     </div>
        </li>
    <?php 
            include('../includes/menu.php');

         ?>

        
                    
                  
</div>

</header>


<section class="contenido">

<div class="input_conteiner">

  

    <div class="input_item">
        <label for="">Escribe Nombre Maquina:</label>
        <input type="text" name="" id="nombre" class="form-control">
    </div>


    <div class="input_item">
        <label for="">Filtrar Por: </label>
        <select name="" id="filtro" class="form-control" onclick="filtrar()">
        <option value="todos" >TODOS</option>
        <option value="1"  style="background:#F029E0; color:white;">AGOTADO</option>
        <option value="2"  style="background:red; color:white;">PROXIMO</option>
        <option value="3"  style="background:#FF5400; color:white;">CONSIDERABLE</option>
        <option value="4"  style="background:green; color:white;"> A TIEMPO</option>
        </select>
    </div>
       
       
        
    <div class="input_item">
       <label>&nbsp</label> <input type="button" onclick="filtrar()" value="FILTRAR" class=" bnt-visor">
    </div>
   <button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 

</div>

        <div id="contenedor_del_dinamizador"></div>

</section>

	</body>


        <div class="overlay-container">

        <div class="window-container zoomin">

        <div class="title-poad">Ayuda</div>
        <div class="body-poad">

        <select name="" id="id_consulta" class="ayuda" onclick="consultar_ayuda()">
                        <option value="Selecciona">Selecciona</option>
                         <?php

        $servidor = "localhost"; 
        $usuario = "root"; 
        $contraseña = ""; 
        $BD = "bdagroinsoft"; 
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
        $insertar="SELECT * FROM `ayuda` WHERE id_formulario=9 order by ayuda.terAyuda";
                        $resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                                    echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
                      ?> 
                    </select>   
            
              <textarea disabled="" name=""  type="button" value="" id="conAyuda">
                        
                    </textarea>
                            
            <input class="bnt-poad close" type="button"  align="center"   name="" value="cerrar">   
        

            </div>  
        

        </div>
        </div>
<div id="contenedor"></div>


        <script>
            
            function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar1.php",{id_consulta:id_consulta})
}
        </script>
</html>
