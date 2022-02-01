<?php

function validateSession()
{
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
}
