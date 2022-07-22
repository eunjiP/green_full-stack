<?php

use App\Http\Controllers\BoardController;
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
// 그룹을 이용해서 1차 주소값을 적지 않아도 되도록 처리 (라우팅 할때만 사용하는 것은 아님)
Route::prefix('boards') ->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    //주소에 들어왔을때 어느 컨트롤러인지, 어떤 함수인지 적어주면됨
    Route::get('/', [BoardController::class, 'index']);
    //name : 라우터사용시 이름을 지정하는 역할
    //create : 저장하는 화면 네이밍 규칙
    Route::get('create', [BoardController::class, 'create'])->name('boards.create');
    //store : 저장
    Route::post('store', [BoardController::class, 'store'])->name('boards.store');
    //show : 화면에 보여지는 곳
    Route::get('show', [BoardController::class, 'show'])->name('boards.show');
    Route::get('edit', [BoardController::class, 'edit'])->name('boards.edit');
    Route::post('update', [BoardController::class, 'update'])->name('boards.update');
    Route::get('destroy', [BoardController::class, 'destroy']);
});
