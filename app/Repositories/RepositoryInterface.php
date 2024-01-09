<?php

namespace App\Repositories;

interface RepositoryInterface
{
    // public function register(array $userData);
    // public function login(array $credentials);
    //Handle  User
    public function getUsersByRole($role);
    public function createUser(array $data);
    public function editUserByID(int $id, array $data);
    public function destroyUserByID(int $id);
    //Handle Class
    public function getAll();
    public function destroyClassByID(int $id);
    public function getClassInfo(int $id);
    //Handle ClassUser
    public function createClassUser(array $data);
    public function removeClassUser(int $user_id, int $class_id);
}
