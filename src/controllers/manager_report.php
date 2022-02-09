<?php

session_start();
validateSession();

$activeUsersCount = User::getActiveUsersCount();
$absentUsers = WorkingHours::getAbsentUsers();

$yearAndMonth = (new DateTime())->format('Y-m');
[$workedHoursInMonth] = explode(':', getTimeStringFromSeconds(WorkingHours::getWorkedTimeInMonth($yearAndMonth)));

loadTemplatedView('manager_report', [
    'activeUsersCount' => $activeUsersCount,
    'absentUsers' => $absentUsers,
    'workedHoursInMonth' => $workedHoursInMonth
]);
