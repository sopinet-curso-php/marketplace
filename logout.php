<?php
require __DIR__ . "/configuracion.php";

unset($_SESSION['facebook_access_token']);

header("Location: main.php");