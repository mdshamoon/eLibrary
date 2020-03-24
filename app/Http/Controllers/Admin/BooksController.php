<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $book= Book::all();
        return view('admin.books.index')->with('books',$book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.books.create');

       
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $book= Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'edition' => $request->edition,
            'genre' => $request->genre

        ]);

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book= Book::where('id',$id)->first();
        return view('admin.books.edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Book::where('id', $id)
                ->update(['name' => $request->name,
                         'author'=>$request->author,
                         'edition'=>$request->edition,
                         'genre'=>$request->genre]
                        );
          return redirect()->route('admin.books.index');            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('admin.books.index');
    }

    public function read($name){
        $user= Auth::user();
        $book= Book::select('id')->where('name',$name)->first();
       
        if($user->books()->where('user_id',$book)->exists())
          return redirect()->route('home');
        $user->books()->attach($book);
        return redirect()->route('home');
    }
}