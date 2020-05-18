<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorController extends Controller
{
    function index()
    {
        return view('authors.index', [
            'authors' => Author::with('books')->get()->sortBy('full_name'),
        ]);
    }

    function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    function create()
    {
        return view('authors.create');
    }

    function store()
    {
        Author::create($this->getValidAuthor());
        return redirect(route('authors.index'));
    }

    function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    function update(Author $author)
    {
        $author->update($this->getValidAuthor());
        return redirect(route('authors.show', $author));
    }

    function delete(Author $author)
    {
        $author->delete();
        return redirect(route('authors.index'));
    }

    function getValidAuthor()
    {
        return request()->validate([
            'full_name' => 'required|min:8',
            'bio' => 'required'
        ]);
    }
}
