<?php
require __DIR__ . "/../configuracion.php";

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('https://marketplace-hidabe.c9users.io/semana5/login-callback', $permissions);

header("Location: ".$loginUrl);