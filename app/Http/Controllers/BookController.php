<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function show(): Response
    {
        $books = Book::join('categories', 'books.categoryid', '=', 'categories.categoryid')
                ->select('books.isbn', 'books.title', 'categories.name', 'books.author', 'books.price')
                ->get();

        return response()->view("book.view", [
            "books" => $books
        ]);

        
    }

    public function create()
    {
        return view('book.create');
    }

    public function add(Request $request): RedirectResponse
    {
        $validatedData = $request->validate(Book::rules());
    
        $book = new Book();
        $book->isbn = $request->input('isbn');
        $book->author = $request->input('author');
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->categoryid = $request->input('categoryid');
    
        $saved = $book->save();
    
        if ($saved) {
            return redirect()->route('book.view')->with('success', 'Book added successfully');
        } else {
            return redirect()->route('book.create')->with('error', 'Failed to add book');
        }
    }

    public function edit(string $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        
        return view("book.edit", [
            "book" => $book,
        ]);
    }


    public function update(Request $request, string $isbn): RedirectResponse
    {
        $validatedData = $request->validate(Book::updateRules($isbn));

        $author = $request->input("author");
        $title = $request->input("title");
        $price = $request->input("price");
        $categoryid = $request->input("categoryid");

        $book = Book::where('isbn', $isbn)->first();

        $book->author = $author;
            $book->title = $title;
            $book->price = $price;
            $book->categoryid = $categoryid;

        $saved = $book->save();

        if ($saved) {
            return redirect()->route('book.edit', ['isbn' => $isbn])->with('success', 'Book updated successfully');
        } else {
            return redirect()->route('book.edit', ['isbn' => $isbn])->with('error', 'Failed to update book');
        }
    }

    public function delete(string $isbn): RedirectResponse
    {
        $book = Book::where('isbn', $isbn)->first();

        $deleted = $book->delete();

        if ($deleted) {
            return redirect()->route('book.view')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('book.view')->with('error', 'Failed to delete book');
        }
    }
}