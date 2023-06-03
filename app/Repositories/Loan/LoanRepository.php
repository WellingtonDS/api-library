<?php

namespace App\Repositories\Loan;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class LoanRepository
{
    public $loan;
    public $book;
    public $user;
    
    public function __construct(Loan $loan, User $user, Book $book)
    {
        $this->loan = $loan;
        $this->user = $user;
        $this->book = $book;
    }

    public function getLoans()
    {
        return $this->loan->all();
    }
    //  function para buscar todos os usuarios
    public function getUsers()
    {
        return $this->user->all();
    }

    // function para buscar todos os livros disponiveis
    public function getBooks()
    {
        return $this->book->where('status', 'Disponível')->get();
    }

    public function getBooksEdit()
    {
        return $this->book->all();
    }

    // function para criar um novo emprestimo
    public function store($data)
    {
        return $this->loan->create([
            'user_id' => $data ['user_id'],
            'book_id' => $data['book_id'],
            'return_date' => $data[ 'return_date'],
        ]);
    }

    public function delete($book)
    {
        $this->loan->find($book)->delete();
    }
}