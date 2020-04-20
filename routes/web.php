<?php

use Illuminate\Support\Facades\Route;
use App\User; 
 use Illuminate\Http\Request; 
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
Route::match(['get','post'],'/register', function () { 
      
 return view('register');
});
Route::match(['get','post'],'/thank', function (Request $request) { 
     $user= new User();
          $user->email=$request->email;
          $user->username=$request->username;
            $user->password=Hash::make($request->password);
            $user->save();

   $youremail=$request->email;
 return view('thank')->with('youremail',$youremail);
});
Route::match(['get','post'],'/login', function () { 
      
 return view('login');
});
Route::match(['get','post'],'/logout', function () { 
      
 return view('logout');
});
Route::match(['get','post'],'/memberarea', function () { 
      
 return view('memberarea');
})->middleware('auth');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
