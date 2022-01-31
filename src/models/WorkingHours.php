<?php

class WorkingHours extends Model
{
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

        $this->id === null ? $this->insert() : $this->update();
    }
}
