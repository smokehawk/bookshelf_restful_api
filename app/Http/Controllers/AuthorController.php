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
        $this->authorize('create');
        return view('authors.create');
    }

    function store()
    {
        $this->authorize('create');
        Author::create($this->getValidAuthor());
        return redirect(route('authors.index'));
    }

    function edit(Author $author)
    {
        $this->authorize('update');
        return view('authors.edit', compact('author'));
    }

    function update(Author $author)
    {
        $this->authorize('update');
        $author->update($this->getValidAuthor());
        return redirect(route('authors.show', $author));
    }

    function delete(Author $author)
    {
        $this->authorize('update');
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
