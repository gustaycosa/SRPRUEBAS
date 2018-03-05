<?php 
include_once('class/fpdf/fpdf.php'); // La clase que nos genera el pdf 
include_once("class/PHPJasperXML.inc"; // La clase que interactua con el ireport 
include_once ('setting.php'); // nuestra clase donde esta nuestra conf de ingreso a la bd 



$xml = simplexml_load_file("Prueba.jrxml"; // Leemos nuestro reporte de ireport 


$PHPJasperXML = new PHPJasperXML(); // instanciamos el obj 
$PHPJasperXML->debugsql=false; // Si deseas ver la setencia del sql del reporte lo pones en true 
$PHPJasperXML->arrayParameter=array("pr_c_id"=>'1'); // el paramentro que enviamos a nuestro reporte 
$PHPJasperXML->xml_dismantle($xml); 
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db); // las opciones de conexion de base de datos 
$PHPJasperXML->outpage("I"; // I: muetsra en el browser D: descarga el pdf 
?> 