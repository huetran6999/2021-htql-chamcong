<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

// Route::prefix('model')->group(function () {
//     Route::get('insert', function () {
//         $user=new App\Models\taikhoan;
//         $user->tk_tendangnhap='quanghung';
//         $user->tk_matkhau='12345678';
//         $user->save();
//     });
// });

Route::get('remane-collunm-table', function () {
    Schema::table('taikhoan', function($table){
        $table->renameColumn('tk_tendangnhap', 'username');
    });
});

Route::get('converse', function () {
    $taikhoan = App\Models\taikhoan::all();
    foreach($taikhoan as $tk){
        $a=App\Models\taikhoan::find($tk->id);
        $a->password=bcrypt('123456');
        $a->save();
    }
});
Route::get('/login', 'App\Http\Controllers\LoginController@GetLogin');
Route::post('/login', 'App\Http\Controllers\LoginController@PostLogin');

Route::get('/create-account', [App\Http\Controllers\UserController::class, 'Create']);
Route::post('/create-account', [App\Http\Controllers\UserController::class, 'Store']);

Route::get('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Edit']);
Route::post('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Update']);

Route::get('/delete-account/{id}', [App\Http\Controllers\UserController::class, 'Delete']);

Route::get('/index', [App\Http\Controllers\UserController::class, 'Index']);