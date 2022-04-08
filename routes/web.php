<?php

use App\Http\Controllers\DepController;
use App\Http\Controllers\TimeKeepingController;
use App\Http\Controllers\SalaryReportController;
use App\Http\Controllers\EnterpriseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\UserController;

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


// Route::prefix('manage')->group(function () {
//     Route::get('/account-management',[App\Http\Controllers\UserController::class, 'Index'])->name('account');

// });

// route::get('1', function(){
//     $result = Enterprise::find(2)->Department->toArray();
//     echo '<pre>';
//     print_r($result);
// });

//tạo đường dẫn đến trang quản lý phòng ban


//tạo đường dẫn đến trang quản lý nhóm/tổ
Route::get('group-management', function () {
    return view('pages.group');
})->name('group');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'GetLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'PostLogin'])->name('postlogin');

Route::get('/logout-account', [App\Http\Controllers\LoginController::class, 'Logout'])->name('logout');

//Thêm nhân viên
Route::get('/create-account', [App\Http\Controllers\UserController::class, 'Create'])->name('Emp_Create');
Route::post('/create-account', [App\Http\Controllers\UserController::class, 'Store'])->name('Emp_Store');

Route::get('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Edit']);
Route::post('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Update']);

Route::get('/delete-account/{id}', [App\Http\Controllers\UserController::class, 'Emp_Delete'])->name('Emp_Delete');

Route::get('account-search', [App\Http\Controllers\UserController::class, 'GetSearch'])->name('search');



Route::get('employee-management', [App\Http\Controllers\UserController::class, 'ShowUser'])->name('employee');
//Thêm, Sửa, Xoá nhân viên

// Route::get('/index', [App\Http\Controllers\UserController::class, 'Index']);
route::middleware('auth')->group(function () {
    Route::get('index-home', function () {
        return view('layout.index');
    })->name('index');

    //tạo đường dẫn đến trang quản lý nhân viên
    Route::get('/create-account', [UserController::class, 'Create'])->name('Emp_Create');
    Route::post('/create-account', [UserController::class, 'Store'])->name('Emp_Store');
    Route::get('/update-employee/{id}', [UserController::class, 'Emp_Edit'])->name('Emp_Edit');
    Route::post('/update-employee/{id}', [UserController::class, 'Emp_Update'])->name('Emp_Update');
    Route::get('/delete-account/{id}', [UserController::class, 'Emp_Delete'])->name('Emp_Delete');
});

//tạo đường dẫn đến trang quản lý tài khoản

// Quản lý Đơn vị
Route::resource('enterprise', EnterpriseController::class);


//Quản lý phòng ban
Route::resource('department', DepController::class);


Route::get('/time-keeping', [TimeKeepingController::class, 'index'])->name('timeKeeping.index');
Route::post('/time-keeping/import', [TimeKeepingController::class, 'import'])->name('timeKeeping.import');
Route::get('/salary-report', [SalaryReportController::class, 'index'])->name('salaryReport.index');

//Route::resource('/user', App\Http\Controllers\UserController::class);
