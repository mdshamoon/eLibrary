<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $read= Auth::user()->books()->get();
    
        
        $book= Book::all();

        
        return view('home')->with(['books' => $book, 'reads' => $read]);
    }

    public function read(Request $request)
    {
       
        if($request->list=='all')
        return $this->index();
        else if($request->list=='read')
        $read= Auth::user()->books()->get();
        else{
            
            $book= Book::all();
            $not_read= $book->reject(function ($boo)
            {
                $read= Auth::user()->books()->get();
                foreach($read as $reads)
                 if($reads->id==$boo->id)
                   return true;
                 
                return false;
            });
            return view('home')->with(['books' => $not_read, 'reads' => []]);
        }

        return view('home')->with(['books' => $read, 'reads' => $read]);
       
    }
}
