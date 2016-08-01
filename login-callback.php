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

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
} elseif ($helper->getError()) {
  // The user denied the request
  exit;
}

header('Location: login-check.php');