<?php

namespace App\Services\Loan;

use App\Repositories\Loan\LoanRepository;

class LoanService
{
    public $loanRepository;

    public function __construct( LoanRepository $loanRepository) {
        $this->loanRepository = $loanRepository;
    }

    public function store($data)
    {
        return $this->loanRepository->store($data);
    }

    public function index()
    {
       $loan = $this->loanRepository->getLoans();

        return $loan;
    }

    public function getUsers()
    {
        $users = $this->loanRepository->getUsers();

        return $users;
    }

    public function getBooks()
    {
        $books = $this->loanRepository->getBooks();

        return $books;
    }

    public function getBooksEdit()
    {
        $book = $this->loanRepository->getBooksEdit();
        
        return $book;
    }

    public function delete($book)
    {        
        $this->loanRepository->delete($book);
    }
}