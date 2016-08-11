<?php
require __DIR__ . "/../configuracion.php";

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

// Cargamos nuestro usuario de facebook
// Usando el SDK de la librería de facebook
  $response = $fb->get('/me', $_SESSION['facebook_access_token']);
  $requestPicture = $fb->get('/me/picture?redirect=false&height=300', $_SESSION['facebook_access_token']);
  $me = $response->getGraphUser();
  $pictureUser = $requestPicture->getGraphUser();
  $picture = $pictureUser['url'];
  
// Cargamos el repositorio para acceder a la entidad Persona  
  $repositorioPersona=$entityManager->getRepository('Persona');
// Buscaríamos una Persona con el id de nuestro usuario de Facebook logueado.
  $persona = $repositorioPersona->findOneByFacebookId($me->getId());
  
  // Si el registro Persona no existe
  if ($persona == null) {
      // Crear Persona
      $persona = new Persona();
      $persona->setFacebookId($me->getId());
      $persona->setFacebookAccessToken($_SESSION['facebook_access_token']);
      $persona->setNombre($me->getName());
      $persona->setAvatar($picture);
  // Si el registro Persona existe    
  } else {
      // Actualizar Persona con el nuevo Token
      $persona->setFacebookAccessToken($_SESSION['facebook_access_token']);
      $persona->setNombre($me->getName());
      $persona->setAvatar($picture);
  }

  $entityManager->persist($persona);
  $entityManager->flush();

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}

header("Location: ".$router->generate("home"));
?>