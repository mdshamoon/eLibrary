<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\User;
use App\Book;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user_count=User::all()->count();
        $books_count=Book::all()->count();
        $announcements = Announcement::orderBy('id','desc')->take(5)->get();
        $user_week=DB::table('book_user')->where('created_at','>',Carbon::now()->subDays(7))->get()->count();
        return view('admin.dashboard.dashboard')->with(['booksCount'=> $books_count, 'usersCount' => $user_count, 'userWeek'=> $user_week,'announcements'=>$announcements]);
    }
}
