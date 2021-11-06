<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('name')->get();

        return view('books.index')->with('books', $books);
    }

    public function edit(Book $book)
    {
        return view('books.edit')->with('book', $book);
    }

    public function store(BookStoreRequest $request)
    {
        Book::create($request->validated());

        return redirect(route('books.index'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect(route('books.index'));
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
