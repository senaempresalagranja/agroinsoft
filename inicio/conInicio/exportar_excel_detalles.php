<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */


date_default_timezone_set('Europe/London');


// 1) Incluir las librerías e inicializar la Clase.

// Para este ejemplo básico necesitaremos incluir la librería PHPExcel.php, luego pasamos a inicializar la clase
require_once '../exportar_excel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();





// 2) Propiedades del documento Excel

// Cuando exportemos un archivo Excel podemos definir quién fue el creador, el título del documento, la descripción, algunos keywords y su categoría

$objPHPExcel->
    getProperties()
        ->setCreator("AGROINSOFT")
        ->setLastModifiedBy("AGROINSOFT")
        ->setTitle("Exportaciones")
        ->setSubject("AGROINSOFT")
        ->setDescription("AGROINSOFT")
        ->setKeywords("AGROINSOFT")
        ->setCategory("Exportacion");








// 3) Escribiendo data
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('AGROINSOFT');
$objDrawing->setDescription('AGROINSOFT');
$objDrawing->setPath('../exportar_excel/2.jpg');     
$objDrawing->setHeight(100);             
$objDrawing->setCoordinates('A1');   
$objDrawing->setOffsetX(100);                
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
// Con el siguiente bloque de código podemos escribir en la casilla que deseamos, es muy sencillo el manejo tanto para hacerlo manualmente como dinámicamente.

$id_maquinaria=$_POST["id_maquinaria"];
$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT maqyequipo.idMaqEquipo, `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`,  `estElemento`,imagen, `numFicTecnica`, clasificacion.nomClasificacion, ubicacion.nomUbicacion FROM `maqyequipo` INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion WHERE maqyequipo.idMaqEquipo=$id_maquinaria order by nomElemento";
$resource=mysqli_query($connection,$query);
$fila=mysqli_fetch_row($resource);

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('AGROINSOFT');
$objDrawing->setDescription('AGROINSOFT');
$objDrawing->setPath('../form_maquina/imagenes/' . $fila[10]);     
$objDrawing->setHeight(300);             
$objDrawing->setCoordinates('B9');   
$objDrawing->setOffsetX(0);                
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1','AGROINSOFT V.2')
            ->setCellValue('C7', $fila[1])
            ->setCellValue('A24', 'Codigo Inventario')
            ->setCellValue('B24', 'Codigo Interno')
            ->setCellValue('C24', 'Serial')
            ->setCellValue('D24', 'Capacidad')
            ->setCellValue('E24', 'Fecha Adquisicion')
            ->setCellValue('F24', 'Clasificacion')
            ->setCellValue('G24', 'Ubicacion')
            ->setCellValue('H24', 'Estado')
            ->setCellValue('A27', 'FICHA TECNICA')
 

            ->setCellValue('A25', $fila[2])
            ->setCellValue('B25', $fila[3])
            ->setCellValue('C25', $fila[5])
            ->setCellValue('D25', $fila[7])
            ->setCellValue('E25', $fila[8])
            ->setCellValue('F25', $fila[12])
            ->setCellValue('G25', $fila[13])
            ->setCellValue('H25', $fila[9]);
 

$query="SELECT `funUsos`, `desFisica`, `espTecnica`, `conSeguridad`, `alistamiento`, `verCalibracion`, `instrucciones`, `condiciones`, `mantenimiento`, `limDesinfeccion`, `conManejo` FROM `fictecnica` WHERE idMaqEquipo=$id_maquinaria";
$resource=mysqli_query($connection,$query);
$fila=mysqli_fetch_row($resource);


  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A28', 'Funciones y Usos')
            ->setCellValue('A29', 'Descripcion Fisica')
            ->setCellValue('A30', 'Especifiaciones Tecnicas')
            ->setCellValue('A31', 'Condiciones de Seguridad')
            ->setCellValue('A32', 'Alistamiento')
            ->setCellValue('A33', 'Verificacion')
            ->setCellValue('A34', 'Instruciones de Uso')
            ->setCellValue('A35', 'Condiciones del Equipo')
            ->setCellValue('A36', 'Mantenimiento')
            ->setCellValue('A37', 'Limpieza')

            ->setCellValue('B28', $fila[0])
            ->setCellValue('B29', $fila[1])
            ->setCellValue('B30', $fila[2])
            ->setCellValue('B31', $fila[3])
            ->setCellValue('B32', $fila[4])
            ->setCellValue('B33', $fila[5])
            ->setCellValue('B34', $fila[6])
            ->setCellValue('B35', $fila[7])
            ->setCellValue('B36', $fila[8])
            ->setCellValue('B37', $fila[9]);


// // ------------- -NOVEDADES------------------------------------------------------------------------

//             ->setCellValue('A40', 'Tipo Novedad')
//             ->setCellValue('B40', 'Fecha Novedad')
//             ->setCellValue('C40', 'Prioridad')
//             ->setCellValue('D40', 'Responsable Novedad')
//             ->setCellValue('E40', 'Cedula Responsable')
//             ->setCellValue('F40', 'Especificaiones')
 


// // ------------- -MATENIMIENTOS PROGRAMADOS------------------------------------------------------------------------


//             ->setCellValue('A46', 'MANTENIMIENTOS PROGRAMADOS')
//             ->setCellValue('A47', 'Titulo')
//             ->setCellValue('B47', 'Cuerpo')
//             ->setCellValue('C47', 'Fecha Inicio')
//             ->setCellValue('D47', 'Fecha Fin')
     
// // ------------- -MATENIMIENTOS EJECUTADOS------------------------------------------------------------------------

//             ->setCellValue('A54', 'MANTENIMIENTOS EJECUTADOS')
//             ->setCellValue('A55', 'Tipo de Mantenimiento')
//             ->setCellValue('B55', 'Proveedor')
//             ->setCellValue('C55', 'Fecha Ejecutada')
//             ->setCellValue('D55', 'Procedimiento')
//             ->setCellValue('E55', 'Recomendaciones')
//             ->setCellValue('F55', 'Garantia')
//             ->setCellValue('G55', 'Nombre Persona')
//             ->setCellValue('H55', 'Cedula');

// AQUI ESTOY DICIENDO LA FUENTE Y SU TAMAÑO
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(14);



$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);




// ESTILOS DE LAS COLUMNAS Y FILAS
$objPHPExcel->getActiveSheet()
            ->getStyle('A24:H24')
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('#0D0D98');

            $objPHPExcel->getActiveSheet()
            ->getStyle('A28:A37')
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('#0D0D98');

            // $objPHPExcel->getActiveSheet()
            // ->getStyle('A40:F40')
            // ->getFill()
            // ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            // ->getStartColor()->setARGB('#0D0D98');

            // $objPHPExcel->getActiveSheet()
            // ->getStyle('A47:D47')
            // ->getFill()
            // ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            // ->getStartColor()->setARGB('#0D0D98');

            // $objPHPExcel->getActiveSheet()
            // ->getStyle('A55:H55')
            // ->getFill()
            // ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            // ->getStartColor()->setARGB('#0D0D98');


// BORDES
$border= array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '#00000')
            )
        )
    );




$objPHPExcel->getActiveSheet()
            ->getStyle('A24:H25')
            ->applyFromArray($border);

$objPHPExcel->getActiveSheet()
            ->getStyle('A28:B37')
            ->applyFromArray($border);

// $objPHPExcel->getActiveSheet()
//             ->getStyle('A40:F40')
//             ->applyFromArray($border);

// $objPHPExcel->getActiveSheet()
//             ->getStyle('A47:D47')
//             ->applyFromArray($border);

// $objPHPExcel->getActiveSheet()
//             ->getStyle('A55:H55')
//             ->applyFromArray($border);
// 4) Propiedades de la hoja

// Luego de escribir en la hoja de cálculo pasamos a darle un nombre y definir con que hoja abrirá el documento, en este caso como tenemos solo uno, el valor será “0”.

$objPHPExcel->getActiveSheet()->setTitle('Detalles_Maquinaria');
$objPHPExcel->setActiveSheetIndex(0);
// ------------- -NOVEDADES------------------------------------------------------------------------
// $id_maquinaria=$_POST["id_maquinaria"];
// $connection=mysqli_connect("localhost","root","","bdagroinsoft");
// $query="SELECT * FROM `novedades`  WHERE idMaqEquipo=$id_maquinaria";
// $resource=mysqli_query($connection,$query);
// $y=40;
// while ($fila=mysqli_fetch_row($resource)) {
//     $y++;


//     $objPHPExcel->setActiveSheetIndex(0)
//                 ->getStyle("A".$y.":F".$y)
//                 ->applyFromArray($border);





//      $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue('A'.$y, $fila[1])
//             ->setCellValue('B'.$y, $fila[3])
//             ->setCellValue('C'.$y, $fila[2])
//             ->setCellValue('D'.$y, $fila[4])
//             ->setCellValue('E'.$y, $fila[5])
//             ->setCellValue('F'.$y, $fila[6]);





// };


// // ------------- -MATENIMIENTOS PROGRAMADOS------------------------------------------------------------------------

// $query="SELECT `id`, `idMaqEquipo`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal` FROM `manprogramado` where idMaqEquipo=$id_maquinaria";
// $resource=mysqli_query($connection,$query);
// $y=47;
// while ($fila=mysqli_fetch_row($resource)) {
//     $y++;


//     $objPHPExcel->setActiveSheetIndex(0)
//                 ->getStyle("A".$y.":D".$y)
//                 ->applyFromArray($border);





//      $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue('A'.$y, $fila[2])
//             ->setCellValue('B'.$y, $fila[3])
//             ->setCellValue('C'.$y, $fila[8])
//             ->setCellValue('D'.$y, $fila[9]);





// };


// // ------------- -MATENIMIENTOS EJECUTADOS------------------------------------------------------------------------

// $query="SELECT `idManEjecutado`, manejecutado.id, tipmantenimiento.nomTipMantenimiento, proveedor.nomProveedor, `fecEjecutado`, `procedimiento`, `recomendaciones`, `garantia`, `nomPerMantenimiento`, `cedPerMantenimiento` FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor WHERE manprogramado.idMaqEquipo=$id_maquinaria";
// $resource=mysqli_query($connection,$query);
// $y=55;
// while ($fila=mysqli_fetch_row($resource)) {
//     $y++;


//     $objPHPExcel->setActiveSheetIndex(0)
//                 ->getStyle("A".$y.":H".$y)
//                 ->applyFromArray($border);





//      $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue('A'.$y, $fila[2])
//             ->setCellValue('B'.$y, $fila[3])
//             ->setCellValue('C'.$y, $fila[4])
//             ->setCellValue('D'.$y, $fila[5])
//             ->setCellValue('E'.$y, $fila[6])
//             ->setCellValue('F'.$y, $fila[7])
//             ->setCellValue('G'.$y, $fila[8])
//             ->setCellValue('H'.$y, $fila[9]);





// };


// 5) Descargar el archivo

// El paso final será descargar el archivo, aquí definiremos el nombre que tendrá al ser descargado y el tipo de Excel que será.

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Detalles_Maquinaria.xls"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;