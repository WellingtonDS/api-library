<?php

namespace App\Http\Controllers;

use App\Http\Request\BookRequest\BookStoreRequest;
use App\Models\Book;
use App\Services\Book\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    // function da tela inicial de livros.
    public function index()
    {
        $books = $this->bookService->index();
        return view('books.index', compact('books'));
    }

    //function da tela criar livro
    public function create()
    {
        return view('books.create');
    }

    // function para validar a criação de livro
    public function store(BookStoreRequest $request)
    {
        $validatedData = $request->validated();
        $book = $this->bookService->store($validatedData);

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso.');
    }

    // function da tela de edição
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    //function para validar atualização
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

    // function para deletar livo
    public function destroy($book)
    {
        $this->bookService->delete($book);

        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso.');
    }
}
