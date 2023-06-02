<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Obtenha a lista de usuários e livros disponíveis para exibir nos formulários
        $users = User::all();
        $books = Book::where('status', 'Disponível')->get();

        return view('loans.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required|date',
        ]);

        Loan::create($validatedData);

        return redirect()->route('loans.index')->with('success', 'Emprestimo criado com sucesso.');
    }

    public function show(Loan $loan)
    {
        return redirect()->route('loans.index');
    }

    public function edit(Loan $loan)
    {
        $users = User::all();
        $books = Book::all();

        $loan->find($loan);

        return view('loans.edit', compact('loan', 'users', 'books'));
    }

    public function update(Request $request, Loan $loan)
    {
        $validatedData = $request->validate([
            'return_date' => 'required|date',
            'status' => 'required|in:Atrasado,Devolvido',
        ]);

        $loan->update($validatedData);

        return redirect()->route('loans.index')->with('success', 'Emprestimo atualizado com sucesso.');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Livro deletado com sucesso.');
    }
}
