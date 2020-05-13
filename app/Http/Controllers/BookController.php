<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    function index()
    {
        return view('books.index', [
            'books' => Book::latest()->get(),
        ]);
    }

    function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    function create()
    {
        $authors = \App\Author::all();
        return view('books.create', compact('authors'));
    }

    function store()
    {
        Book::create($this->getValidBook());
        return redirect(route('books.index'));
    }

    function edit(Book $book)
    {
        $authors = \App\Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    function update(Book $book)
    {
        $book->update($this->getValidBook());
        return redirect(route('books.show', $book));
    }

    function delete(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'));
    }

    function getValidBook()
    {
        return request()->validate([
            'author_id' => 'required',
            'title' => 'required',
            'annotation' => 'required',
            'published_at' => 'nullable',
        ]);
    }
}
