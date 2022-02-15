<?php

function validateSession($requireAdmin = false)
{
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    } elseif ($requireAdmin) {
        $isAdmin = $_SESSION['user']->is_admin;

        if (!$isAdmin) {
            header('Location: acesso_negado.php');
            exit();
        }
    }
}
