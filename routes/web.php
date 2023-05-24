<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/', [App\Http\Controllers\MemberController::class,'index']);
Route::get('/', 'MemberController@index');

 
Route::get('/', 'MemberController@getMembers');
 
Route::post('/save', 'MemberController@save');
 
Route::patch('/update/{id}', ['as' => 'member.update', 'uses' => 'MemberController@update']);
 
Route::delete('/delete/{id}', ['as' => 'member.delete', 'uses' => 'MemberController@delete']);
