<?php
require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('twig');
$twig = new Twig_Environment($loader);

echo $twig->render('demo.html.twig', array(
    'year' =>  date("Y"),
    'name' => 'Fabien',
    'lastname' => 'Potencier'
    )
);


?>