<?php

loadModel('WorkingHours');

Database::executeSQL('DELETE FROM working_hours');
Database::executeSQL('DELETE FROM users WHERE id > 5');

/**
 * Return a workday template from the rates inputed as arguments.
 *
 * @param int $regularRate The the chance of the given worker do a regular workday.
 *
 * @param int $extraRate The the chance of the given worker do a extra hour workday.
 *
 * @param int $lazyRate The the chance of the given worker do a lazy workday.
 *
 * @return array One of the three templates hardcoded in the function body.
 * The sum of the 3 rates inputed as arguments must be equal to 100%,otherwise this function returns FALSE.
 */
function getWorkdayTemplateByOdds($regularRate, $extraRate, $lazyRate)
{
    $sumOfRates = $regularRate + $extraRate + $lazyRate;

    if ($sumOfRates != 100) {
        return false;
    }

    // 8 Hours
    $regularWorkdayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME
    ];

    // 9 Hours
    $extraHourWorkdayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + ONE_HOUR_SECONDS
    ];

    // 7:30 hours
    $lazyWorkdayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME - HALF_HOUR_SECONDS
    ];

    $value = rand(0, 100);

    $result = [];

    if ($value <= $regularRate) {
        $result = $regularWorkdayTemplate;
    } elseif ($value <= $regularRate + $extraRate) {
        $result = $extraHourWorkdayTemplate;
    } else {
        $result = $lazyWorkdayTemplate;
    }

    return $result;
}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate)
{
    $currentDate = $initialDate;
    $today = new DateTime();
    $columns = ['user_id' => $userId, 'work_date' => $currentDate];

    while (isPast($currentDate, $today)) {
        if (!isWeekend($currentDate)) {
            $template = getWorkdayTemplateByOdds($regularRate, $extraRate, $lazyRate);

            $columns = array_merge($columns, $template);

            $workingHours = new WorkingHours($columns);
            $workingHours->save($columns);
        }

        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}

$lastMonth = strtotime('first day of last month');

// Jornada de trabalho do Admin
populateWorkingHours(1, date('Y-m-d', $lastMonth), 70, 20, 10);

// Jornada de trabalho do Seu Barriga
populateWorkingHours(3, date('Y-m-d', $lastMonth), 20, 75, 5);

// Jornada de trabalho do Seu Madruga
populateWorkingHours(4, date('Y-m-d', $lastMonth), 20, 10, 70);

echo 'Tudo certo!';
