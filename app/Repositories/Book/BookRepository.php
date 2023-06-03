<?php

namespace App\Repositories\Book;

use App\Models\Book;

class BookRepository
{
    public $model;
    
    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function getBooks()
    {
        return $this->model->all();
    }

    public function bookEdit()
    {
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create([
            'name' => $data ['name'],
            'author' => $data ['author'],
            'registration_number' => $data ['registration_number'],
            'status' => $data ['status'],
            'genre' => $data ['genre'],
        ]);
    }

    public function delete($book)
    {
        $this->model->find($book)->delete();
    }
}