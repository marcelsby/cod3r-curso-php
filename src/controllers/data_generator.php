<?php

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
        'worked_hours' => DAILY_TIME
    ];

    // 9 Hours
    $extraHourWorkdayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_hours' => DAILY_TIME + ONE_HOUR_SECONDS
    ];

    // 7:30 hours
    $lazyWorkdayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_hours' => DAILY_TIME - HALF_HOUR_SECONDS
    ];

    $value = rand(0, 100);

    if ($value <= $regularRate) {
        return $regularWorkdayTemplate;
    } elseif ($value <= $regularRate + $extraRate) {
        return $extraHourWorkdayTemplate;
    } else {
        return $lazyWorkdayTemplate;
    }
}

print_r(getWorkdayTemplateByOdds(33, 33, 34));
