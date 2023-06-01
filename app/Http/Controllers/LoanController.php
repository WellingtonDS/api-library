<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function markLate(Loan $loan)
    {
        $loan->is_late = true;
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Loan marked as late.');
    }

    public function markReturned(Loan $loan)
    {
        $loan->is_returned = true;
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Livro devolvido de empr[estimo.');
    }
}
