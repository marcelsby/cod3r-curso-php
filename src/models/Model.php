<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    public function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr)
    {
        if (!empty($arr)) {
            foreach ($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);

        if ($result) {
            $class = get_called_class();
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }

        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT ${columns} FROM "
        . static::$tableName
        . static::getFilters($filters)
        . ';';

        $result = Database::getResultFromQuery($sql);

        if ($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    private static function getFilters(array $filters)
    {
        $sql = '';

        if (!empty($filters)) {
            if (count($filters) == 1) {
                foreach ($filters as $column => $value) {
                    $sql .= " WHERE ${column} = " . static::getFormatedValue($value);
                }
            } else {
                $index = 1;

                foreach ($filters as $column => $value) {
                    $sql .= $index == 1
                        ? (" WHERE ${column} = " . static::getFormatedValue($value))
                        : (" AND ${column} = " . static::getFormatedValue($value));

                    $index++;
                }
            }
        }

        return $sql;
    }

    private static function getFormatedValue($value)
    {
        if (is_null($value)) {
            return "null";
        } elseif (gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }

    public function __get($key)
    {
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }
}
