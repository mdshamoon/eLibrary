<?php
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:delete-users')->group(function(){
  Route::resource('users','UsersController', ['except' => ['show','create','store']]);
  Route::resource('books','BooksController' );
  Route::resource('announcements', 'AnnouncementController');
  Route::get('dashboard','AdminController@index')->name('dashboard');
 
});



Route::post('/markread','Admin\BooksController@read')->name('books.read');
Route::get('/read','HomeController@read')->name('read.books');

Route::get('/home/category','Admin\BooksController@category')->name('books.category');


