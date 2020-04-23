<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Genre;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      
        $book= Book::all();

     

        
        return view('admin.books.index')->with('books',$book)->with('message', $request->message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genre=Genre::all();
        return view('admin.books.create')->with(['genre'=>$genre]);

       
        


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

        

        $validator = Validator::make($request->all(), [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required|max:40',
                'author' => 'required|max:40',
                'edition' => 'required|max:40',
                'genre' => 'required',
        ],['required' => ':attribute field is required',
        'max'=> ':attribute is too long']);
       
         
        if ($validator->fails()) {
            

             
             return redirect()->back()->withErrors($validator);
        }
             
        // finally store our user
         
     
        

     
    
      
       $imagename=$request->cover->getClientOriginalName();
       $request->cover->move(public_path('images/cover'), $imagename);

        $book= Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'edition' => $request->edition,
            'cover' => $imagename,
            

        ]);

        foreach($request->genre as $genre)
        {
            $book->genres()->attach($genre);
        }

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

        
        $mygenres=$book->genres()->get();
        $genre=Genre::all();

        
        return view('admin.books.edit')->with(['book'=>$book, 'genre'=>$genre,'mygenres'=> $mygenres]);
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

       
        if($request->has('cover'))
        {
            $validator = Validator::make($request->all(), [
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' =>'required|max:40',
                'author' => 'required|max:40',
                'edition' => 'required|max:40',
                'genre' => 'required|max:40',
            ],['required' => ':attribute field is required',
            'max'=> ':attribute is too long']);
           
             
            if ($validator->fails()) {
                
    
                 
                 return redirect()->back()->withErrors($validator);
            }
    
        
          
           $imagename=$request->cover->getClientOriginalName();
           $request->cover->move(public_path('images/cover'), $imagename);
        Book::where('id', $id)
                ->update(['name' => $request->name,
                         'author'=>$request->author,
                         'edition'=>$request->edition,
                         'cover'=> $imagename
                         ]
                        );



           
        }

        

        else{

            $validator = Validator::make($request->all(), [
                
                'name' =>'required|max:40',
                'author' => 'required|max:40',
                'edition' => 'required|max:40',
                'genre' => 'required|max:40',
            ],['required' => ':attribute field is required',
            'max' => 'The :attribute value should be less than :max.']);
           
             
            if ($validator->fails()) {
                
    
                 
                 return redirect()->back()->withErrors($validator);
            }
            Book::where('id', $id)
            ->update(['name' => $request->name,
                     'author'=>$request->author,
                     'edition'=>$request->edition,
                     ]
                    ); 
           
                    }

                   

             $book=Book::where('id', $id)->first();
             $book->genres()->detach();

             
             $book->genres()->attach($request->genre)     ;  


          return redirect()->route('admin.books.index')->with('message','Successfully Updated');;            
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
        $book->genres()->detach();
        $filename = public_path().'/images/cover/'.$book->cover;
        \File::delete($filename);
        $book->delete();
        return redirect('admin/books')->with('message','Successfully Removed');
    }

    public function read($name){
        $user= Auth::user();
        $book= Book::select('id')->where('name',$name)->first();
       
        if($user->books()->where('user_id',$book)->exists())
          return redirect()->route('home');
        $user->books()->attach($book);
        return redirect()->route('home');
    }


    public function category(Request $request)
    {

dd($request->genre);
    }
}
