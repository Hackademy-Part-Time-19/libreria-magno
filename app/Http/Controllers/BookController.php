<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use \App\Http\Requests\BookStoreRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request)
    {
        $validated= $request->validated();

        $book=Book::create(['author'=>auth()->user()->name, 'title'=> $validated['title'], 'description'=>$validated['description'],'price'=>$validated['price']]);

      
     return redirect()->back()->with(['success'=>'Libro inserito con successo ']);
}

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        
     return view('books.show', compact('book'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        $validated= $request->validated();

        $book->update([ 'title'=> $validated['title'], 'description'=>$validated['description'],'price'=>$validated['price']]);

      
     return redirect()->back()->with(['success'=>'Libro aggiunto con successo ']);
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
      $book->destroy();
    }
}
