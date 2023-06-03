<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    public $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUsers()
    {
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create([
            'name' => $data ['name'],
            'email' => $data ['email'],
            'registration_number' => $data ['registration_number']
        ]);
    }

    public function update( $model)
    {
        return $this->model->update([
         'name' => 'name',
            'email' => 'email',
            'registration_number' => 'registration_number' . $model->id,
        ]);
    }

    public function delete($user)
    {
        $this->model->find($user)->delete();
    }
}