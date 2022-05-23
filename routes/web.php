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

Route::middleware('auth')->group(function () {
    Route::get('index-home', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    //Xem hồ sơ nhân viên đăng nhập
    Route::get('/account-info', [App\Http\Controllers\AccountController::class, 'showAccountInfo'])->name('Account_Info');
    Route::get('/timekeeping-info', [App\Http\Controllers\AccountController::class, 'showTimekeepingInfo'])->name('Timekeeping_Info');

    //Quản lý nhân viên
    Route::group(['prefix'=>'employee','middleware'=>'check:employee'],function(){
        Route::get('employee-management', [App\Http\Controllers\UserController::class, 'ShowUser'])->name('employee'); 
        Route::get('employee-management/search', [UserController::class, 'search'])->name('emp-search');
        Route::get('/create-account', [UserController::class, 'Create'])->name('Emp_Create');
        Route::post('/create-account', [UserController::class, 'Store'])->name('Emp_Store');
        Route::get('/update-employee/{id}', [UserController::class, 'Emp_Edit'])->name('Emp_Edit');
        Route::post('/update-employee/{id}', [UserController::class, 'Emp_Update'])->name('Emp_Update');
        Route::get('/delete-account/{id}', [UserController::class, 'Emp_Delete'])->name('Emp_Delete');
        Route::get('/employee-info/{id}',[App\Http\Controllers\UserController::class, 'showEmpInfo'])->name('Emp_Info');

        //Quản lý hợp đồng
        Route::get('/create-contract/{id}', [App\Http\Controllers\UserController::class, 'createContract'])->name('Contract_Create');
        Route::post('/store-contract/{id}', [App\Http\Controllers\UserController::class, 'storeContract'])->name('Contract_Store');
        Route::get('/contract-info/user/{id}', [App\Http\Controllers\UserController::class, 'getContractInfo'])->name('contractUser_info');
        Route::get('/contract-list', [App\Http\Controllers\UserController::class, 'getContract'])->name('contract_list');
    });

    //Phân quyền user
    // Route::get('employee-roles', [UserController::class, 'ShowUserRole'])->name('show_role');
    // Route::post('assign-role', [UserController::class, 'AssignRole'])->name('assign_role');

    // Quản lý Đơn vị
    Route::group(['prefix'=>'enterprise','middleware'=>'check:enterprise'],function(){
        Route::resource('enterprise', EnterpriseController::class);
    });
    
    //Quản lý phòng ban
    Route::group(['prefix'=>'department','middleware'=>'check:department'],function(){
        Route::resource('department', DepController::class);
    });

    //Quản lý chức vụ
    Route::group(['prefix'=>'position','middleware'=>'check:position'],function(){
        Route::resource('position', App\Http\Controllers\PositionController::class);

        //Quản lý phụ cấp
        Route::get('create-allowance/{id}',  [App\Http\Controllers\AllowanceController::class, 'edit'])->name('create_allowance');
        Route::post('store-allowance/{id}',  [App\Http\Controllers\AllowanceController::class, 'store'])->name('update_allowance');
        Route::get('edit-allowance/{id}',  [App\Http\Controllers\AllowanceController::class, 'edit'])->name('edit_allowance');
        Route::post('update-allowance/{id}',  [App\Http\Controllers\AllowanceController::class, 'update'])->name('update_allowance');
        Route::get('/list-allowance',  [App\Http\Controllers\AllowanceController::class, 'list'])->name('list_allowance');
    });
    

    //Chấm công
    Route::group(['prefix'=>'timkeeping','middleware'=>'check:timekeeping'],function(){
        Route::get('/time-keeping', [TimeKeepingController::class, 'index'])->name('timeKeeping.index');
        Route::post('/time-keeping/import', [TimeKeepingController::class, 'import'])->name('timeKeeping.import');
    });

    //Tính lương
    Route::group(['prefix'=>'salary','middleware'=>'check:salary'],function(){
        Route::get('/salary-report', [SalaryReportController::class, 'index'])->name('salaryReport.index');
    });

    //Điểm dah
    Route::group(['prefix'=>'attendance','middlewre'=>'check:attendance'], function(){
        Route::get('/working-log', [App\Http\Controllers\WorkingLogController::class, 'index'])->name('workinglog_index');
        Route::get('/working-log/edit/{id}', [App\Http\Controllers\WorkingLogController::class, 'edit'])->name('workinglog.edit');
        Route::post('/working-log/update', [App\Http\Controllers\WorkingLogController::class, 'updateLog'])->name('workinglog_update');
        Route::post('/working-log/import', [App\Http\Controllers\WorkingLogController::class, 'import'])->name('workinglog_import');

        // Checkin, checkout
        Route::post('/working-log/checkin-am/{id}', [App\Http\Controllers\WorkingLogController::class, 'checkinAm'])->name('checkin-am');
        Route::post('/working-log/checkout-am/{id}', [App\Http\Controllers\WorkingLogController::class, 'checkoutAm'])->name('checkout-am');
        Route::post('/working-log/checkin-pm/{id}', [App\Http\Controllers\WorkingLogController::class, 'checkinPm'])->name('checkin-pm');
        Route::post('/working-log/checkout-pm/{id}', [App\Http\Controllers\WorkingLogController::class, 'checkoutPm'])->name('checkout-pm');
        // Tạo ngày nghỉ phép
        Route::get('/working-log/create-leave-absence', [App\Http\Controllers\WorkingLogController::class, 'createLeaveAbsence'])->name('create-leave-absence');
        Route::post('/working-log/store-leave-absence', [App\Http\Controllers\WorkingLogController::class, 'storeLeaveAbsence'])->name('store-leave-absence');
    });


    Route::post('/dep', [UserController::class, 'getDep'])->name('emp.getDep');
    Route::post('/pos', [UserController::class, 'getPos'])->name('emp.getPos');
});
Route::get('/chart',[App\Http\Controllers\ChartController::class, 'index'])->name('chart');

// Route::get('fake-user',[UserController::class, 'fakeUser']);