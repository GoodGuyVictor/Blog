<?php

    use blog\authentication\Authentication;

    require_once ("Authentication.php");

    session_start();

    $auth = new Authentication();

    if($_POST["signup"]) {
        $auth->signup();
    } elseif ($_POST["login"]) {
        $auth->login();
    }
