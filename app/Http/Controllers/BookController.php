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
        $this->authorize('create');
        $authors = \App\Author::all();
        return view('books.create', compact('authors'));
    }

    function store()
    {
        $this->authorize('create');
        Book::create($this->getValidBook());
        return redirect(route('books.index'));
    }

    function edit(Book $book)
    {
        $this->authorize('update');
        $authors = \App\Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    function update(Book $book)
    {
        $this->authorize('update');
        $book->update($this->getValidBook());
        return redirect(route('books.show', $book));
    }

    function delete(Book $book)
    {
        $this->authorize('update');
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
