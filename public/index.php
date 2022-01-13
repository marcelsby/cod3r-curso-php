<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

$user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);

print_r(User::get(['name' => 'Quico'], 'name, email'));

echo '<br>';

foreach (User::get([], 'name') as $user) {
    echo $user->name . '<br>';
}
