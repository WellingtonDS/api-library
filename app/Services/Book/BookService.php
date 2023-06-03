<?php

namespace App\Services\Book;

use App\Repositories\Book\BookRepository;

class BookService
{
    public $bookRepository;

    public function __construct( BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    public function store($data)
    {
        return $this->bookRepository->store($data);
    }

    public function index()
    {
       $book = $this->bookRepository->getBooks();

        return $book;
    }

    public function show()
    {
        $book = $this->bookRepository->bookEdit();
    }

    public function delete($book)
    {        
        $this->bookRepository->delete($book);
    }
}