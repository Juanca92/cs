<?php

$fecha = date("Y-m-d---H-i-s");

$usuario="root";  // Usuario de la base de datos 
$passwd="";  // Contraseña bd
$bd="sanpedro";  // Nombre de la Base de Datos
$filename = ""."sanpedro.sql"; // Nombre del archivo a exportar

// Funciones para exportar la base de datos 
$executa = "c:\\xampp\\mysql\\bin\\mysqldump.exe -u $usuario --password=$passwd --opt $bd > $filename"; 
system($executa, $resultado); 

// Comprobar si se a realizadó 
if ($resultado) { 
 echo "<H1>Error ejecutando comando: $executa</H1>\n"; 
}else{

 $zip = new ZipArchive();

 $nombre_zip = $bd."-".$fecha.".rar";

 if ($zip->open($nombre_zip,ZIPARCHIVE::CREATE) === true) {
  $zip->addFile($filename);
  $zip->close();
  unlink($filename);
  header("Location:".$nombre_zip);

 }else{
  echo "No se pudo exportar a RAR";
 }
 
 echo "<h4>se hizo el backup correctamente</h4>";
}
