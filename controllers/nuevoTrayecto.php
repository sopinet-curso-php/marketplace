<?php
require __DIR__ . "/../configuracion.php";

if ($usuarioLogueado == null) {
    die("Necesitas loguear");
}

echo $twig->render('nuevoTrayecto.html.twig');

?>