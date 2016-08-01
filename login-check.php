<?php
if(!session_id()) {
    session_start();
}

require __DIR__ . "/configuracion.php";

$fb = new Facebook\Facebook([
  'app_id' => '296532217365593',
  'app_secret' => '7ed432e87915521f9dae8db587b542e6',
  'default_graph_version' => 'v2.6',
  //'default_access_token' => '{access-token}', // optional
]);

$response = $fb->get('/me', $_SESSION['facebook_access_token']);
$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();