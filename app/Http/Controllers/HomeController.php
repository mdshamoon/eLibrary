<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use App\Genre;
use App\User;
use Carbon\Carbon;
use App\Notifications\WeeklyMail;

use Spatie\Permission\Models\Role;

use App\Jobs\WeeklyMailJob;
use App\Jobs\MailServices;

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


    public function joinTables()
    {
        $book= DB::table('book_user')->select('books.id','book_user.user_id','books.name','books.author','books.edition','books.cover','books.quantity', DB::raw("GROUP_CONCAT(genres.genre SEPARATOR ', ') as genre") )
        ->rightjoin('books',function ($join) {
            $join->on('book_user.book_id', '=' , 'books.id') ;
           $reads= auth()->user();

            $join->where('book_user.user_id','=',$reads->id) ;
        })
        ->join('book_genre','books.id','=','book_genre.book_id')->join('genres','book_genre.genre_id','=','genres.id')->groupBy('books.id','book_user.user_id','books.name','books.author','books.edition','books.cover')
        ->get();

        return $book;
 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        
        $reads= auth()->user();
        $read= $reads->books()->get();

        $genre= Genre::all();

        

       
        if($request->filled('genre'))
        {
            
            if($request->genre[0]!="all"){
            $book= DB::table('book_user')->select('books.id','book_user.user_id','books.name','books.author','books.edition','books.cover','books.quantity', DB::raw("GROUP_CONCAT(genres.genre SEPARATOR ', ') as genre") )
            ->rightjoin('books',function ($join) {
                $join->on('book_user.book_id', '=' , 'books.id') ;
               $reads= auth()->user();
    
                $join->where('book_user.user_id','=',$reads->id) ;
            })
            ->join('book_genre',function($join) use ($request){
                $join->on('books.id','=','book_genre.book_id');
                $join->whereIn('book_genre.genre_id',$request->genre) ;

            })->join('genres','book_genre.genre_id','=','genres.id')->groupBy('books.id','book_user.user_id','books.name','books.author','books.edition','books.cover')->get();
     
            return view('home')->with(['books' => $book, 'genre'=>$genre, 'mygenres'=> $request->genre]);
        }
    
        else{
            $book=$this->joinTables();
        }
        }


        else{
            $book=$this->joinTables();
        }


      
         
      
      
      
       
    
        
        
        return view('home')->with(['books' => $book, 'genre'=>$genre,'mygenres'=>[]]);
    }

    // public function read(Request $request)
    // {
       
    //     if($request->list=='all')
    //     return $this->index();
    //     else if($request->list=='read')
    //     $read= Auth::user()->books()->get();
    //     else{
            
    //         $book= Book::all();
    //         $not_read= $book->reject(function ($boo)
    //         {
    //             $read= Auth::user()->books()->get();
    //             foreach($read as $reads)
    //              if($reads->id==$boo->id)
    //                return true;
                 
    //             return false;
    //         });
    //         return view('home')->with(['books' => $not_read, 'reads' => []]);
    //     }

    //     return view('home')->with(['books' => $read, 'reads' => $read]);
       
    // }
}
