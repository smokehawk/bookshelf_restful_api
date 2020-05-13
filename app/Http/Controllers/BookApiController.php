<?php

namespace App\Http\Controllers;


use App\Book;

class BookApiController extends Controller
{

    function getList()
    {
        $booksList = Book::with('author:id,full_name')->get()->makeHidden(
            ['author_id', 'created_at', 'updated_at', 'author' . 'full_name']);
        return response()->json($booksList);
    }

    function get($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    function update($id)
    {
        $book = Book::findOrFail($id);
        $book->update(request()->validate([
            'author_id' => 'required',
            'title' => 'required',
            'annotation' => 'required',
            'published_at' => 'nullable',
        ]));
        return response()->json($book);
    }

    function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response(null, 204);
    }
}
