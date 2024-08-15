<?php

namespace Src\Requests;

use Src\Support\DataValidation;

class RegistrationRequest
{
    protected array $data;
    protected array $errors = [];

    public string $name = '';
    public string $email = '';
    public string $password = '';

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validate();
    }

    protected function validate(): void
    {
        $this->validateName();
        $this->validateEmail();
        $this->validatePassword();
    }

    protected function validateName(): void
    {
        if (empty($this->data['name'])) {
            $this->errors['name'] = 'Please provide a name.';
        } else {
            $this->name = DataValidation::sanitize($this->data['name']);
        }
    }

    protected function validateEmail(): void
    {
        if (empty($this->data['email'])) {
            $this->errors['email'] = 'Please provide an email address.';
        } else {
            $this->email = DataValidation::sanitize($this->data['email']);
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Please provide a valid email address.';
            }
        }
    }

    protected function validatePassword(): void
    {
        if (empty($this->data['password'])) {
            $this->errors['password'] = 'Please provide a password.';
        } elseif (strlen($this->data['password']) < 8) {
            $this->errors['password'] = 'Please provide a password longer than 8 characters.';
        } else {
            $this->password = DataValidation::sanitize($this->data['password']);
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
