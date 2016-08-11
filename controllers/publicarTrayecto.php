<?php
require __DIR__ . "/../configuracion.php";

if ($usuarioLogueado == null) {
    die("Necesita estar logueado para hacer esta acción");
}

$origen=$_POST['origen'];
$destino=$_POST['destino'];
$calle=$_POST['calle'];
$fechaPublicacion=new DateTime();
/*$fechaPublicacion=$fechaPublicacion->getTimestamp();*/
$hora=new DateTime($_POST['hora']);
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$plazas=$_POST['plazas'];


//Creamos un trayecto con esos datos y lo guardamos en la base de datos
$trayecto=new Trayecto();
$trayecto->llenarObjeto(
    $usuarioLogueado,
    $origen,
    $destino,
    $calle,
    $fechaPublicacion,
    $hora,
    $precio,
    $descripcion,
    $plazas
);
$usuarioLogueado->addTrayecto($trayecto);
$entityManager->persist($usuarioLogueado);
$entityManager->persist($trayecto);
$entityManager->flush();

//Hacemos una redireccion al listado
Header( "Location: " . $router->generate("list"));

?>