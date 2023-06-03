<?php

namespace App\Http\Controllers;

use App\Http\Request\LoanRequest\LoanStoreRequest;
use App\Models\Loan;
use App\Services\Loan\LoanService;
use Illuminate\Http\Request;

class LoanController extends Controller
{

    public $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    // function da tela de inicio de emprestimo
    public function index()
    {
        $loans = $this->loanService->index();

        return view('loans.index', compact('loans'));
    }

    // Obter a lista de usuários e livros disponíveis para exibir nos formulários de emprestimos
    public function create()
    {
        $users = $this->loanService->getUsers();
        $books = $this->loanService->getBooks();

        return view('loans.create', compact('users', 'books'));
    }

    // function para criar novo emprestimo com base nos livros e usuarios disponiveis
    public function store(LoanStoreRequest $request)
    {
        $validatedData = $request->validated();
        $loan = $this->loanService->store($validatedData);

        return redirect()->route('loans.index')->with('success', 'Emprestimo criado com sucesso.');
    }

    // functio da tela de edição
    public function edit(Loan $loan)
    {
        $users = $this->loanService->getUsers();
        $books = $this->loanService->getBooksEdit();

        return view('loans.edit', compact('loan', 'users', 'books'));
    }

    // function para alterar status de emprestimo
    public function update(Request $request, Loan $loan)
    {
        $validatedData = $request->validate([
            'return_date' => 'required|date',
            'status' => 'required|in:Atrasado,Devolvido',
        ]);

        $loan->update($validatedData);

        return redirect()->route('loans.index')->with('success', 'Emprestimo atualizado com sucesso.');
    }

    // function para deletar emprestimo
    public function destroy($loan)
    {
        $this->loanService->delete($loan);

        return redirect()->route('loans.index')->with('success', 'Livro deletado com sucesso.');
    }
}
