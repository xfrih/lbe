<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookContoller extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'user'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required|exists:categories,id',
            'description'=>'nullable|string',
        ]);

        $book->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbaharui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}