<!DOCTYPE html>
<html>
<head>
    <title>Novedad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- fondo y distribucion -->

    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
    <!-- fondo y distribucion -->

    <!--  estilos formularios  -->

    <link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
    <link rel="stylesheet" type="text/css" href="../estilos/buscador.css">

    <!--  estilos formularios  -->

    <!--MENU -->

    <link rel="stylesheet" href="../estilos/estilosCabecera.css">
    <script src="../../jquery-latest.js"></script>
    <script src="../../main.js"></script>

    <!--MENU -->    

    <script src="query.js"></script>
     
    
    <script src="../js/sweetalert-dev.js"></script>
    <script src="../js/sweetalertmin.js"></script> 
    
<style type="text/css">
    #id_maquina{
    
        opacity:  0;
    }
</style>

		<style type="text/css">
${demo.css}
		</style>
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

<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Novedad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

           <div class="itms-menu">

                       <h2>Registrar Novedad</h2>
                     </div>
        </li>
    <?php 
            include('../includes/menu.php');

         ?>

        
                    
                  
</div>

</header>

<div class="input_conteiner">

    
    <div class="input_item">
    <label >  Nombre Maquinaria seleccionada: </label>   
        
    <input type="text" disabled="" name="nombre_maquina" id="nombre_maquina">
    </div>

    <div class="input_item">
     <label >Tipo Novedad Mantenimiento: </label>   
        <select name="tipNovedad" id="tipNovedad">
            <option>Selecionar</option>
            <option value="NO ENCIENDE">NO ENCIENDE</option>
            <option value="DAÑO">DAÑO</option>
            <option value="MAL FUNCIONAMIENTO">MAL FUNCIONAMIENTO</option>
        </select>   
    </div>

    <div class="input_item">
    
        <label>Fecha de Novedad: </label>    
        <input type="date" name="fecNovedad" id="fecNovedad" step="1" min="2001-01-01" max="9999-12-31" required="" > 
            
    </div>
    <div class="input_item">

         <label >Prioridad</label>   
                <select name="prioridad" id="prioridad">
                <option value="SELECCIONAR">SELECCIONAR</option>
                <option value="BAJA">BAJA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="ALTA">ALTA</option>
            </select>

    </div>


</div>  


<div class="input_conteiner">

   <div class="input_item">x</div>

</div>





<div class="input_conteiner">

    
    <div class="input_item">

<div class="container">
<br>
<br>
<br>
    <div class="row">
        <div class="col-md-3">
        <label for="">Escibe nombre de maquina</label>
            <input type="text" name="" id="nombre" class="form-control">

        </div> </div>


    <div class="row">
    <div class="col-md-4">
    <label for="">FILTRAR POR </label>
    <select name="" id="filtro" class="form-control" onclick="filtrar()">
    <option value="todos" >TODOS</option>
    <option value="1"  style="background:#F029E0; color:white;">AGOTADO</option>
    <option value="2"  style="background:red; color:white;">PROXIMO</option>
    <option value="3"  style="background:#FF5400; color:white;">CONSIDERABLE</option>
    <option value="4"  style="background:green; color:white;"> A TIEMPO</option> </select>


        </div></div>

        <div class="row">
        <div class="col-md-1">
        <br>
        <input type="button" onclick="filtrar()" value="FILTRAR" class="btn"></div>
        </div>

</div>

        </div>
    </div>
</div>
<div id="contenedor_del_dinamizador"></div>

</div>


	</body>
  <style>
     
#contenedor_del_dinamizador{
    border: 1px solid red;
    
}

#contenedor_del_dinamizador .espiritu1{
    display: none;
    border:  1px solid black;
}





</html>
