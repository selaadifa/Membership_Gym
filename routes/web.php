<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\MemberController;

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
    return redirect('login');
});

Auth::routes();
Route::get('/home', function() {
    return view('home');
})->middleware('auth');

Route::get('/logout', function () {
    return redirect('login');
});

Route::get('request/post-data', [RequestController::class, 'viewPostData']);
Route::post('request/post-data', [RequestController::class, 'processPostData']);
Route::get('request/get-data', [RequestController::class, 'viewGetData']);

Route::prefix('member')->group(function(){
    route::get('/view',[MemberController::class, 'MemberView'])->name('member.view');
    route::get('/add',[MemberController::class, 'MemberAdd'])->name('member.add');
    route::post('/store',[MemberController::class, 'MemberStore'])->name('members.store');
    route::get('/edit/{id}',[MemberController::class, 'MemberEdit'])->name('members.edit');
    route::post('/update/{id}',[MemberController::class, 'MemberUpdate'])->name('members.update');
    route::get('/delete/{id}',[MemberController::class, 'MemberDelete'])->name('members.delete');
});