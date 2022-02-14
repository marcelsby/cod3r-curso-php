<?php

session_start();
validateSession();

$users = User::get();

foreach ($users as $user) {
    $user->start_date = formatShortDateWithLocale($user->start_date);

    if ($user->end_date) {
        $user->end_date = formatShortDateWithLocale($user->end_date) ?? '-';
    }
}

loadTemplatedView('users', ['users' => $users]);
