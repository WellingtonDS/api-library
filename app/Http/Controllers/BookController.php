<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'registration_number' => 'required|unique:books',
            'status' => 'required',
            'genre' => 'required',
        ]);
        
        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso.');
    }

    public function show (Book $book)
    {
         return view('books.edit', compact('book'));
    }

    public function edit(Book $book)
    {
        $book->find($book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'registration_number' => 'required|unique:books,registration_number,' . $book->id,
            'status' => 'required',
            'genre' => 'required',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso.');
    }
}
