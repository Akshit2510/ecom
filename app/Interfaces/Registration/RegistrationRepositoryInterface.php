<?php

namespace App\Interfaces\Registration;

interface RegistrationRepositoryInterface
{
    public function registerUser($userDetails);
    public function LoginUser($userDetails);
}