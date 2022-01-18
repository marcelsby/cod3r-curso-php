<?php

loadModel('Login');
$exception = null;

if (!empty($_POST)) {
    $login = new Login($_POST);

    try {
        $user = $login->checkLogin();
        header('Location: day_records.php');
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);
