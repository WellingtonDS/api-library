<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    public $userRepository;

    public function __construct( UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function store($data)
    {
        return $this->userRepository->store($data);
    }

    public function index()
    {
       $user = $this->userRepository->getUsers();

        return $user;
    }

    public function update($data, $model)
    {
        return $this->userRepository->update($data, $model);
    }

    public function delete($user)
    {        
        $this->userRepository->delete($user);
    }
}