<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Dedoc\Scramble\Attributes\Group;

#[Group('Books')]
class BookController extends Controller
{
    /**
     * Display list of books
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store new book
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        return Book::create($request->all());
    }

    /**
     * Show single book
     */
    public function show($id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Update book
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return $book;
    }

    /**
     * Delete book
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json(['message' => 'deleted']);
    }
}