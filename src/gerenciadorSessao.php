<?php

session_start();

if (isset($_COOKIE['usuario'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
