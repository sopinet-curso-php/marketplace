<?php
require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('twig');
$twig = new Twig_Environment($loader, array(
    'debug' => true
    )
);
$twig->addExtension(new Twig_Extension_Debug());
// Ejemplo de Filtro personalizado
// El filtro recortará una cadena con una longitud por defecto de 80 caracteres pero se podrá cambiar por parámetro
$filter = new Twig_SimpleFilter('recortarTexto', function ($string, $length = 80) {
    return substr($string,0,$length) . "...";
});
$twig->addFilter($filter);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/Entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'hidabe',
    'password' => '',
    'dbname'   => 'market_place'
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

// Incluimos el fichero para la entidad Trayecto
include 'Entity/Trayecto.php';
// Incluimos el fichero para la entidad Persona
include 'Entity/Persona.php';

if(!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
  'app_id' => '296532217365593',
  'app_secret' => '7ed432e87915521f9dae8db587b542e6',
  'default_graph_version' => 'v2.6',
  //'default_access_token' => '{access-token}', // optional
]);

//
// Obtener usuario logueado
// A través de nuestra variable global $_SESSION['facebook_access_token'] que habrá sido seteada si se ha hecho Login
// Vamos a consultar en la base de datos, entidad Persona, si ese usuario existe
// En caso de que existe se quedará almacenado en la variable usuarioLogueado.
// En caso de que no exista o la variable de sesión sea nula, usuarioLogueado valdrá nulo.
if (isset($_SESSION['facebook_access_token'])) {
    // Buscar en la entidad Persona si existe ese usuario con ese token
    $repositorioPersona = $entityManager->getRepository("Persona");
    $usuarioLogueado = $repositorioPersona->findOneByFacebookAccessToken($_SESSION['facebook_access_token']);
} else {
    $usuarioLogueado = null;
}

$twig->addGlobal('usuarioLogueado', $usuarioLogueado);
?>