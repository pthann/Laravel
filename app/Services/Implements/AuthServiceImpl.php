<?php

namespace App\Services\Implements;

use App\Services\AuthService;
use Illuminate\Auth\Events\Logout;

class AuthServiceImpl implements AuthService {
    public function register(array $data)
    {
        return "register";
    }

    public function login(array $credentials)
    {
        return "login";
    }

    public function logout()
    {
        return "logout";
    }
}
