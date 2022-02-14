<?php

session_start();
validateSession();

$user = User::getOne(['id' => 1]);

var_dump($_SESSION['user'] == $user);
