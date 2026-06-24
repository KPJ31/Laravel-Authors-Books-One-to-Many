<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $book->load('author');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($validated);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted');
    }
}
