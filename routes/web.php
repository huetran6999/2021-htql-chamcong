<?php

use App\Http\Controllers\DepController;
use App\Http\Controllers\TimeKeepingController;
use App\Http\Controllers\SalaryReportController;
use App\Http\Controllers\EnterpriseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\UserController;
use App\Models\Role;

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



Route::get('/login', [App\Http\Controllers\LoginController::class, 'GetLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'PostLogin'])->name('postlogin');

Route::get('/logout-account', [App\Http\Controllers\LoginController::class, 'Logout'])->name('logout');

//Thêm nhân viên
// Route::get('/create-account', [App\Http\Controllers\UserController::class, 'Create'])->name('Emp_Create');
// Route::post('/create-account', [App\Http\Controllers\UserController::class, 'Store'])->name('Emp_Store');

// Route::get('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Edit']);
// Route::post('/update-account/{id}', [App\Http\Controllers\UserController::class, 'Update']);

// Route::get('/delete-account/{id}', [App\Http\Controllers\UserController::class, 'Emp_Delete'])->name('Emp_Delete');

// Route::get('account-search', [App\Http\Controllers\UserController::class, 'GetSearch'])->name('search');


//Thêm, Sửa, Xoá nhân viên

// Route::get('/index', [App\Http\Controllers\UserController::class, 'Index']);
Route::middleware('auth')->group(function () {
    Route::get('index-home', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    //Xem hồ sơ nhân viên đăng nhập
    Route::get('/account-info', [App\Http\Controllers\AccountController::class, 'showAccountInfo'])->name('Account_Info');

    //Employee management
    Route::get('employee-management', [App\Http\Controllers\UserController::class, 'ShowUser'])->name('employee')->middleware('rolechecker');
    Route::post('/dep', [UserController::class, 'getDep'])->name('emp.getDep');
    Route::get('/create-account', [UserController::class, 'Create'])->name('Emp_Create');
    Route::post('/create-account', [UserController::class, 'Store'])->name('Emp_Store');
    Route::get('/update-employee/{id}', [UserController::class, 'Emp_Edit'])->name('Emp_Edit');
    Route::post('/update-employee/{id}', [UserController::class, 'Emp_Update'])->name('Emp_Update');
    Route::get('/delete-account/{id}', [UserController::class, 'Emp_Delete'])->name('Emp_Delete');
    Route::get('/employee-info/{id}',[App\Http\Controllers\UserController::class, 'showEmpInfo'])->name('Emp_Info');
    // Route::get('/employee-management',[App\Http\Controllers\UserController::class, 'search'])->name('Emp_Search');

    //Phân quyền user
    Route::get('employee-roles', [UserController::class, 'ShowUserRole'])->name('show_role');
    Route::post('assign-role', [UserController::class, 'AssignRole'])->name('assign_role');

    // Quản lý Đơn vị
    Route::resource('enterprise', EnterpriseController::class);


    //Quản lý phòng ban
    Route::resource('department', DepController::class);

    //Chấm công - Tính lương
    Route::get('/time-keeping', [TimeKeepingController::class, 'index'])->name('timeKeeping.index');
    Route::post('/time-keeping/import', [TimeKeepingController::class, 'import'])->name('timeKeeping.import');
    Route::get('/salary-report', [SalaryReportController::class, 'index'])->name('salaryReport.index');

    //Chấm công theo giờ
    Route::get('/working-log', [App\Http\Controllers\WorkingLogController::class, 'index'])->name('workinglog_index');
    Route::post('/working-log/import', [App\Http\Controllers\WorkingLogController::class, 'import'])->name('workinglog_import');
});



Route::get('fake-user',[UserController::class, 'fakeUser']);