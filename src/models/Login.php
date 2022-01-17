<?php

loadModel('User');

class Login extends Model
{
    public function validate()
    {
        $errors = [];

        if (strlen(trim($this->email)) == 0) {
            $errors['email'] = 'E-mail é um campo obrigatório.';
        }

        if (strlen(trim($this->password)) == 0) {
            $errors['password'] = 'Senha é um campo obrigatório.';
        }

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }

    public function checkLogin()
    {
        $this->validate();

        $user = User::getOne(['email' => $this->email]);

        if ($user != null) {
            if ($user->end_date != null) {
                throw new AppException('Usuário está desligado da empresa.');
            }

            if ($user && password_verify($this->password, $user->password)) {
                return $user;
            }
        }

        throw new AppException('Usuário e Senha inválidos.');
    }
}
