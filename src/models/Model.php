<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    public function __construct($arr, $sanitize = true)
    {
        $this->loadFromArray($arr, $sanitize);
    }

    public function loadFromArray($arr, $sanitize = true)
    {
        if (!empty($arr)) {
            foreach ($arr as $key => $value) {
                // $conn = Database::getConnection();

                if ($sanitize && isset($value)) {
                    $cleanValue = $value;
                    $cleanValue = strip_tags(trim($cleanValue));
                    $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
                    // $cleanValue = mysqli_real_escape_string($conn, $cleanValue);

                    $this->$key = $cleanValue;
                } else {
                    $this->$key = $value;
                }

                // $conn->close();
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

    public static function getOne($filters = [], $columns = '*')
    {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);

        return $result ? new $class($result->fetch_assoc()) : null;
    }

    /**
     * Performs a query in the database and return the result.
     * @param array $filters
     * The filters used to query (e.g. ['id' => 1, 'name' => 'João']).
     * It accepts raw SQL to perform customized operations, to use it your array key must be
     * 'raw' (e.g. ['raw' => "work_date BETWEEN {$date1} AND {$date2}"] or ['raw' => "id > {$id}"]).
     * @param string $columns The columns that you want to return.
     * @return \mysqli_result | null
     */
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

    public function getValues()
    {
        return $this->values;
    }

    public static function getCount($filters = [])
    {
        $result = static::getResultSetFromSelect($filters, 'count(*) as count');
        return $result->fetch_assoc()['count'];
    }

    private static function getFilters(array $filters)
    {
        $sql = '';

        if (!empty($filters)) {
            if (count($filters) == 1) {
                foreach ($filters as $column => $value) {
                    if ($column === 'raw') {
                        $sql .= " WHERE ${value}";
                    } else {
                        $sql .= " WHERE ${column} = " . static::getFormatedValue($value);
                    }
                }
            } else {
                $index = 1;

                foreach ($filters as $column => $value) {
                    if ($column === 'raw') {
                        $sql .= $index == 1
                            ? " WHERE ${value}"
                            : " AND ${value}";
                    } else {
                        $sql .= $index == 1
                            ? (" WHERE ${column} = " . static::getFormatedValue($value))
                            : (" AND ${column} = " . static::getFormatedValue($value));
                    }

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

    public function insert()
    {
        $sql = 'INSERT INTO ' . static::$tableName . " ("
            . implode(',', static::$columns) . ") VALUES (";

        foreach (static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ',';
        }

        $sql[strlen($sql) - 1] = ')';

        $id = Database::executeSQL($sql);

        $this->id = $id;
    }

    public function update()
    {
        $sql = 'UPDATE ' . static::$tableName . ' SET ';

        foreach (static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ',';
        }

        $sql[strlen($sql) - 1] = ' ';

        $sql .= "WHERE id = {$this->id}";

        Database::executeSQL($sql);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE id = ' . $this->id;

        Database::executeSQL($sql);
    }

    public function __get($key)
    {
        return $this->values[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->values[$key]);
    }
}
