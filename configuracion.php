<?php
require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('twig');
$twig = new Twig_Environment($loader, array(
    'debug' => true
    )
);
$twig->addExtension(new Twig_Extension_Debug());
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/Entity");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'alejandroarrabal',
    'password' => '',
    'dbname'   => 'market_place'
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

// Incluimos el fichero para la entidad Trayecto
include 'Entity/Trayecto.php';
// Incluimos el fichero para la entidad Persona
include 'Entity/Persona.php';
?>