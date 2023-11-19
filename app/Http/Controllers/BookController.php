<?php

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $book = new Book(); // Create a new instance for the form
        return view('books.create', compact('book'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'published_at' => 'required|date',
            'department' => 'required',
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'published_at' => 'required|date',
            'department' => 'required',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}

