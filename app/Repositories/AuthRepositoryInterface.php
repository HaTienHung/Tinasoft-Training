<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    // public function register(array $userData);
    // public function login(array $credentials);
    public function getUsersByRole($role);
    public function createUser(array $data);
    public function editUserByID(int $id, array $data);
    public function destroyUserByID(int $id);
}
