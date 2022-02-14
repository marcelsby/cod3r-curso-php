<?php

class User extends Model
{
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];

    public static function getActiveUsersCount()
    {
        return static::getCount(['raw' => 'end_date IS NULL']);
    }

    public function haveWorkingHoursRecords()
    {
        return WorkingHours::getCount(['user_id' => $this->id]) > 0 ? true : false;
    }

    public function insert()
    {
        $this->validate();

        $this->end_date = $this->end_date === '' ? null : $this->end_date;
        $this->is_admin = $this->is_admin === null ? 0 : 1;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::insert();
    }

    public function update()
    {
        $this->validate();

        $this->end_date = $this->end_date === '' ? null : $this->end_date;
        $this->is_admin = $this->is_admin === null ? 0 : 1;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::update();
    }

    private function validate()
    {
        $errors = [];

        if (isEmptyString($this->name)) {
            $errors['name'] = 'Nome é um campo obrigatório.';
        }

        if (isEmptyString($this->email)) {
            $errors['email'] = 'E-mail é um campo obrigatório.';
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'O e-mail inserido não é válido.';
        }

        if (isEmptyString($this->start_date)) {
            $errors['start_date'] = 'Data de admissão é um campo obrigatório.';
        } elseif (!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
            $errors['start_date'] = 'Data de admissão deve seguir o padrão dd/mm/aaaa.';
        } elseif (DateTime::createFromFormat('Y-m-d', $this->start_date) > (new DateTime())) {
            $errors['start_date'] = 'Data de admissão não pode ser uma data no futuro.';
        }

        if (!isEmptyString($this->end_date) && !DateTime::createFromFormat('Y-m-d', $this->end_date ?? '')) {
            $errors['end_date'] = 'Data de admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if (isEmptyString($this->password)) {
            $errors['password'] = 'Senha é um campo obrigatório.';
        }

        if (isEmptyString($this->password_confirmation)) {
            $errors['password_confirmation'] = 'A confirmação da senha é obrigatória.';
        }

        if (!isEmptyString($this->password) && !isEmptyString($this->password_confirmation)) {
            if ($this->password != $this->password_confirmation) {
                $errors['password_confirmation'] = 'As senhas não batem.';
                $errors['password'] = 'As senhas não batem.';
            }
        }

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }
}
