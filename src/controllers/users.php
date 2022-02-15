<?php

session_start();
validateSession(true);

$users = User::get();

foreach ($users as $user) {
    $user->start_date = formatDate(DateFormat::Short, $user->start_date);

    if ($user->end_date) {
        $user->end_date = formatDate(DateFormat::Short, $user->end_date) ?? '-';
    }
}

loadTemplatedView('users', ['users' => $users]);
