<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $userData)
    {
        return User::create($userData);
    }

    public function login(array $credentials)
    {
        if (auth()->attempt($credentials)) {
            // Đăng nhập thành công, không cần tạo token
            return ['message' => 'Login successful'];
        }

        return ['error' => 'Invalid credentials'];
    }

    public function getAllUsers()
    {
        return User::all();
    }
}
