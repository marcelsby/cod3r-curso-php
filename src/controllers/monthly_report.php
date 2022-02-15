<?php

session_start();
validateSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
$selectedUserId = $user->id;
$users = [];
if ($user->is_admin) {
    $users = User::get();
    $selectedUserId = $_POST['user'] ?? $user->id;
}

$selectedPeriod = $_POST['period'] ?? $currentDate->format('Y-m');
$periods = [];

for ($yearDiff = 0; $yearDiff <= 2; $yearDiff++) {
    $year = date('Y') - $yearDiff;

    for ($month = 12; $month >= 1; $month--) {
        $date = new DateTime("{$year}-{$month}-1");
        $periods[$date->format('Y-m')] = formatDate(DateFormat::MonthAndYear, $date);
    }
}

$registries = WorkingHours::getMonthlyReport($selectedUserId, $selectedPeriod);

$report = [];
$workDayCounter = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($selectedPeriod)->format('d');

for ($day = 1; $day <= $lastDay; $day++) {
    $date = $selectedPeriod . '-' . sprintf('%02d', $day);
    $registry = $registries[$date] ?? null;

    if (isPastWorkday($date)) {
        $workDayCounter++;

        if ($registry) {
            $sumOfWorkedTime += $registry->worked_time;
            array_push($report, $registry);
        } else {
            array_push($report, new WorkingHours([
                'work_date' => $date,
                'worked_time' => 0
            ]));
        }
    }
}

$expectedWorkedTime = $workDayCounter * DAILY_TIME;
$balance = getTimeStringFromSecondsWithSign($sumOfWorkedTime - $expectedWorkedTime);

loadTemplatedView('monthly_report', [
    'report' => $report,
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
    'balance' => $balance,
    'selectedPeriod' => $selectedPeriod,
    'periods' => $periods,
    'selectedUserId' => $selectedUserId,
    'users' => $users
]);
