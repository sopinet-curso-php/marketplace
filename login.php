<?php
require __DIR__ . "/configuracion.php";

if(!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
  'app_id' => '296532217365593',
  'app_secret' => '7ed432e87915521f9dae8db587b542e6',
  'default_graph_version' => 'v2.6',
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('https://marketplace-hidabe.c9users.io/semana5/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';