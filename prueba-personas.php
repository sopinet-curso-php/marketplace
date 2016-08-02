<?php
require __DIR__ . "/configuracion.php";

$repositorioPersona=$entityManager->getRepository('Persona');
$personas=$repositorioPersona->findAll();

echo '<pre>';
var_dump($personas);
echo '</pre>';

?>