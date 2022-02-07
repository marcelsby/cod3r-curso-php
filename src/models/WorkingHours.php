<?php

class WorkingHours extends Model
{
    private static $workday;
    private static $defaultLunchTime;
    protected static $tableName = 'working_hours';
    protected static $columns = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time'
    ];

    public static function loadFromUserAndDate($userId, $workDate)
    {
        self::$workday = DateInterval::createFromDateString('8 hour');
        self::$defaultLunchTime = DateInterval::createFromDateString('1 hour 30 minutes');

        $registry = self::getOne(['user_id' => $userId, 'work_date' => $workDate]);

        if (!isset($registry)) {
            $registry = new WorkingHours([
                'user_id' => $userId,
                'work_date' => $workDate,
                'worked_time' => 0
            ]);
        }

        return $registry;
    }

    public function getActiveClock()
    {
        $nextTime = $this->getNextTimeAttribute();

        if ($nextTime === 'time1' || $nextTime === 'time3') {
            return 'exitTime';
        } elseif ($nextTime === 'time2' || $nextTime === 'time4') {
            return 'workedInterval';
        } else {
            return null;
        }
    }

    public function getNextTimeAttribute()
    {
        $timesAttributes = array_slice(static::$columns, 3, 4);

        foreach ($timesAttributes as $time) {
            if ($this->$time === null) {
                return $time;
            }
        }

        return null;
    }

    // Bater o ponto
    public function clockIn($time)
    {
        $timeColumn = $this->getNextTimeAttribute();

        if (!isset($timeColumn)) {
            throw new AppException('Você já fez os 4 batimentos do dia!');
        }

        $this->$timeColumn = $time;
        $this->worked_time = getSecondsFromDateInterval($this->getWorkedInterval());

        $this->id === null ? $this->insert() : $this->update();
    }

    public function getWorkedInterval()
    {
        [$t1, $t2, $t3, $t4] = $this->getTimes();

        $part1 = new DateInterval('PT0S');
        $part2 = new DateInterval('PT0S');

        if ($t1) {
            $part1 = $t1->diff(new DateTime());
        }

        if ($t2) {
            $part1 = $t1->diff($t2);
        }

        if ($t3) {
            $part2 = $t3->diff(new DateTime());
        }

        if ($t4) {
            $part2 = $t3->diff($t4);
        }

        return sumIntervals($part1, $part2);
    }

    public function getLunchInterval()
    {
        [, $t2, $t3,] = $this->getTimes();

        if (!isset($t2) && !isset($t3)) {
            return self::$defaultLunchTime;
        }

        $lunchInterval = new DateInterval('PT0S');

        if ($t2) {
            $lunchInterval = $t2->diff(new DateTime());
        }

        if ($t3) {
            $lunchInterval = $t2->diff($t3);
        }


        return $lunchInterval;
    }

    public function getExitTime()
    {
        [$t1, , , $t4] = $this->getTimes();

        if (!$t1) {
            $exitTime = (new DateTimeImmutable())->add(self::$workday)->add(self::$defaultLunchTime);
        } elseif ($t4) {
            $exitTime = $t4;
        } else {
            $exitTime = $t1->add(sumIntervals(self::$workday, $this->getLunchInterval()));
        }

        return $exitTime;
    }

    public static function getMonthlyReport($userId, $date)
    {
        $registries = [];
        $startDate = getFirstDayOfMonth($date)->format('Y-m-d');
        $endDate = getLastDayOfMonth($date)->format('Y-m-d');

        $result = static::getResultSetFromSelect([
            'user_id' => $userId,
            'raw' => "work_date BETWEEN '{$startDate}' AND '{$endDate}'"
        ]);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $registries[$row['work_date']] = new WorkingHours($row);
            }
        }

        return $registries;
    }

    private function getTimes()
    {
        $times = [];

        $this->time1 ? array_push($times, getDateFromString($this->time1)) : array_push($times, null);
        $this->time2 ? array_push($times, getDateFromString($this->time2)) : array_push($times, null);
        $this->time3 ? array_push($times, getDateFromString($this->time3)) : array_push($times, null);
        $this->time4 ? array_push($times, getDateFromString($this->time4)) : array_push($times, null);

        return $times;
    }
}
