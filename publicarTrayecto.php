<?php
require __DIR__ . "/configuracion.php";

$origen=$_POST['origen'];
$destino=$_POST['destino'];
$calle=$_POST['calle'];
$fechaPublicacion=new DateTime();
/*$fechaPublicacion=$fechaPublicacion->getTimestamp();*/
$hora=new DateTime($_POST['hora']);
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$plazas=$_POST['plazas'];

//Suponemos que el usuario que publica la oferta es el 1
$repositorioPersona=$entityManager->getRepository('Persona');
$persona=$repositorioPersona->find(1);


//Creamos un trayecto con esos datos y lo guardamos en la base de datos
$trayecto=new Trayecto();
$trayecto->llenarObjeto(
    $persona,
    $origen,
    $destino,
    $calle,
    $fechaPublicacion,
    $hora,
    $precio,
    $descripcion,
    $plazas
);
$persona->addTrayecto($trayecto);
$entityManager->persist($persona);
$entityManager->persist($trayecto);
$entityManager->flush();

//Hacemos una redireccion al listado
Header( "Location: main.php?page=list" );

?>