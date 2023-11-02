<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('showStaffLogin');
});

Route::get('login', [AuthController::class, 'showStaffLogin'])->name('showStaffLogin');
Route::get('admin/login', [AuthController::class, 'showAdminLogin'])->name('login');


///API ROUTES///
Route::get('kc/admin/{token}', [AuthController::class, 'successfulLogin'])->name('admin.login');
///API ROUTE ENDS//

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Route::get('/fetchDepartments/{stationId}', [StationController::class, 'fetchDepartments'])->name('fetchDepartments');


Route::group(['middleware' => 'checkRole:admin', 'prefix' => 'admin'], function(){

    Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::resource('admins', AdminController::class);
    Route::get('directors', [AdminController::class, 'directors'])->name('directors');
    Route::get('sdms', [AdminController::class, 'sdms'])->name('sdms');
    Route::get('hrmanagers', [AdminController::class, 'hrs'])->name('hrs');
    Route::get('supervisors', [AdminController::class, 'supervisors'])->name('supervisors');


    //AMDL ROUTES
    Route::get('amdl/profile/{id}', [OrganizationController::class,'amdlProfile'])->name('amdlProfile');
    Route::resource('organizations', OrganizationController::class);

    Route::get('adddirector/', [OrganizationController::class, 'adddirector'])->name('adddirector');
    Route::get('allstaffamdl', [StationController::class,'allstaffamdl'])->name('allstaffamdl');
    //MSNC ROUTES


    Route::resource('stations', StationController::class);


    Route::get('/msnc/profile/{id}', [StationController::class,'msncProfile'])->name('msncProfile');
    Route::get('/deptall/{id}', [StationController::class,'deptall'])->name('deptall');
    Route::get('/allstaffmsnc', [StationController::class,'allstaffmsnc'])->name('allstaffmsnc');
    Route::get('/allrank', [StationController::class,'allrank'])->name('allrank');
    Route::get('/allrankamdl', [StationController::class,'allrankamdl'])->name('allrankamdl');
    Route::get('/supervisorStaff', [StationController::class,'supervisorStaff'])->name('supervisorStaff');
    Route::get('/directororg', [StationController::class,'directororg'])->name('directororg');
    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
    Route::get('/alldept', [StationController::class,'alldept'])->name('alldept');
    Route::get('/depthr', [StationController::class,'depthr'])->name('depthr');
    Route::get('/deptSupervisor', [StationController::class,'deptSupervisor'])->name('deptSupervisor');
    Route::get('/directorstaffamdl', [StationController::class,'directorstaffamdl'])->name('directorstaffamdl');
    Route::get('/addstaff/{id}', [StationController::class,'addstaff'])->name('addstaff');
    Route::get('/MydeptGoals', [StationController::class,'MydeptGoals'])->name('MydeptGoals');
    Route::get('/allrank', [StationController::class,'allrank'])->name('allrank');
    Route::get('/allrankamdl', [StationController::class,'allrankamdl'])->name('allrankamdl');
    Route::get('/rankstaff/{id}', [StationController::class,'rankstaff'])->name('rankstaff');
    Route::get('/rankstaffamdl/{id}', [StationController::class,'rankstaffamdl'])->name('rankstaffamdl');
    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
    Route::get('/staffgrade/{id}', [StationController::class,'staffgrade'])->name('staffgrade');
    Route::get('/staffgradeamdl/{id}', [StationController::class,'staffgradeamdl'])->name('staffgradeamdl');
    Route::get('/staffreview/{id}', [StationController::class,'staffreview'])->name('staffreview');
    Route::get('/staffreviewamdl/{id}', [StationController::class,'staffreviewamdl'])->name('staffreviewamdl');
    Route::get('/goals/{id}', [StationController::class,'goals'])->name('goals');
    Route::get('/directorgoals/{id}', [StationController::class,'directorgoals'])->name('directorgoals');
    Route::get('/hrgoals/{id}/{gid}', [StationController::class,'hrgoals'])->name('hrgoals');
    Route::get('/staffgoals/{id}/{gid}', [StationController::class,'staffgoals'])->name('staffgoals');
    Route::get('/supervisorGoals/{id}', [StationController::class,'supervisorGoals'])->name('supervisorGoals');
    Route::get('/editstaffmsnc', [StationController::class,'editstaffmsnc'])->name('editstaffmsnc');


});

Route::group(['middleware' => 'checkRole:director', 'prefix' => 'director'], function(){

    Route::get('/', [AdminController::class, 'directorsHome'])->name('directorsHome');
    //AMDL ROLES
    Route::get('/amdl/supervisors', [AdminController::class, 'amdlSupervisors'])->name('amdlSupervisors');
    Route::get('/amdl/sdms', [AdminController::class, 'amdlHrs'])->name('amdlHrs');
    Route::get('/amdl/hrs', [AdminController::class, 'amdlSdms'])->name('amdlSdms');

    //MSNC ROLES
    Route::get('/msnc/supervisors', [AdminController::class, 'msncSupervisors'])->name('msncSupervisors');
    Route::get('/msnc/sdms', [AdminController::class, 'msncHrs'])->name('msncHrs');
    Route::get('/msnc/hrs', [AdminController::class, 'msncSdms'])->name('msncSdms');


    Route::get('department/msnc/{id}', [AdminController::class, 'directorsDepartmentMsnc'])->name('directorsDepartmentMsnc');
    Route::get('department/amdl/{id}', [AdminController::class, 'directorsDepartmentAmdl'])->name('directorsDepartmentAmdl');
    Route::get('/directorstaffamdl/{id}', [StationController::class,'directorstaffamdl'])->name('directorstaffamdl');

});
