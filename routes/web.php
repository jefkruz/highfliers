<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SubDepartmentController;
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




Route::group(['middleware' => 'checkRole:admin', 'prefix' => 'admin'], function(){

    Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::resource('admins', AdminController::class);
    Route::get('directors', [AdminController::class, 'directors'])->name('directors');
    Route::get('sdms', [AdminController::class, 'sdms'])->name('sdms');
    Route::get('hrmanagers', [AdminController::class, 'hrs'])->name('hrs');
    Route::get('supervisors', [AdminController::class, 'supervisors'])->name('supervisors');


    //AMDL ROUTES
    Route::resource('organizations', OrganizationController::class);

    Route::get('adddirector/', [OrganizationController::class, 'adddirector'])->name('adddirector');
    Route::get('allstaffamdl', [StationController::class,'allstaffamdl'])->name('allstaffamdl');
    //MSNC ROUTES


    Route::resource('stations', StationController::class);
    Route::get('amdl/ranks', [StationController::class,'amdlRank'])->name('amdlRank');
    Route::get('msnc/rank', [StationController::class,'msncRank'])->name('msncRank');


    Route::get('/msnc/profile/{id}', [StationController::class,'msncProfile'])->name('msncProfile');
    Route::get('/deptall/{id}', [StationController::class,'deptall'])->name('deptall');
    Route::get('/allstaffmsnc', [StationController::class,'allstaffmsnc'])->name('allstaffmsnc');
    Route::get('/supervisorStaff', [StationController::class,'supervisorStaff'])->name('supervisorStaff');
    Route::get('/directororg', [StationController::class,'directororg'])->name('directororg');
    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
    Route::get('/alldept', [StationController::class,'alldept'])->name('alldept');
    Route::get('/depthr', [StationController::class,'depthr'])->name('depthr');
    Route::get('/deptSupervisor', [StationController::class,'deptSupervisor'])->name('deptSupervisor');
    Route::get('/addstaff/{id}', [StationController::class,'addstaff'])->name('addstaff');
    Route::get('/MydeptGoals', [StationController::class,'MydeptGoals'])->name('MydeptGoals');

    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
    Route::delete('msncstaffdelete/{id}', [StationController::class,'msncStaffDelete'])->name('msncStaffDelete');

    Route::get('/goals/{id}', [StationController::class,'goals'])->name('goals');
    Route::get('/directorgoals/{id}', [StationController::class,'directorgoals'])->name('directorgoals');
    Route::get('/hrgoals/{id}/{gid}', [StationController::class,'hrgoals'])->name('hrgoals');
    Route::get('/staffgoals/{id}/{gid}', [StationController::class,'staffgoals'])->name('staffgoals');
    Route::get('/supervisorGoals/{id}', [StationController::class,'supervisorGoals'])->name('supervisorGoals');
    Route::get('/editstaffmsnc', [StationController::class,'editstaffmsnc'])->name('editstaffmsnc');



});

Route::group(['middleware' => 'checkRole:director', 'prefix' => 'director'], function(){

    Route::get('/', [AdminController::class, 'directorsHome'])->name('directorsHome');

});
Route::group(['middleware' => 'checkRole:sdm', 'prefix' => 'sdm'], function(){

    Route::get('/', [AdminController::class, 'sdmHome'])->name('sdmHome');
});

Route::group(['middleware' => 'isAdmin'], function(){
//    Route::resource('subdepartments', SubDepartmentController::class);
    Route::get('subdepartments/create/{id}', [SubDepartmentController::class,'create'])->name('subdepartments.create');
    Route::post('subdepartments/create/{id}', [SubDepartmentController::class,'store']);

    Route::get('amdl/profile/{id}', [OrganizationController::class,'amdlProfile'])->name('amdlProfile');
    Route::get('msnc/profile/{id}', [StationController::class,'msncProfile'])->name('msncProfile');
    Route::get('staffgradeamdl/{id}', [StationController::class,'staffGradeamdl'])->name('staffGradeAmdl');

    Route::get('/directorstaffamdl/{id}', [StationController::class,'directorStaffAmdl'])->name('directorStaffAmdl');
    Route::get('/directorstaffmsnc/{id}', [StationController::class,'directorStaffMsnc'])->name('directorStaffMsnc');
    Route::get('grade/{id}', [GradeController::class,'grade'])->name('grade');
    Route::get('grade/msnc/{id}', [GradeController::class,'msncGrade'])->name('msncGrade');
    Route::post('grade/{id}', [GradeController::class,'amdlStoreGrade'])->name('amdlStoreGrade');
    Route::get('/staffgradeAmdl/{id}', [StationController::class,'staffGradeAmdl'])->name('staffGradeAmdl');
    Route::get('/staffreview/{id}', [StationController::class,'staffreview'])->name('staffreview');
    Route::get('/staffreviewamdl/{id}', [StationController::class,'staffReviewAmdl'])->name('staffReviewAmdl');

    Route::get('department/msnc/{id}', [AdminController::class, 'directorsDepartmentMsnc'])->name('directorsDepartmentMsnc');
    Route::get('department/amdl/{id}', [AdminController::class, 'directorsDepartmentAmdl'])->name('directorsDepartmentAmdl');

    Route::get('/amdl/supervisors', [AdminController::class, 'amdlSupervisors'])->name('amdlSupervisors');
    Route::get('/amdl/hrs', [AdminController::class, 'amdlHrs'])->name('amdlHrs');
    Route::get('/amdl/sdms', [AdminController::class, 'amdlSdms'])->name('amdlSdms');


    Route::get('rankdeptmsnc/{id}', [StationController::class,'rankMsncDept'])->name('rankMsncDept');
    Route::get('/rankdeptamdl/{id}', [StationController::class,'rankAmdlDept'])->name('rankAmdlDept');

    Route::get('deptrankmsnc/{id}/{dept}', [StationController::class,'rankMsncStaff'])->name('rankMsncStaff');
    Route::get('deptrankamdl/{id1}/{id2}', [StationController::class,'deptRankAmdl'])->name('deptRankAmdl');

    Route::get('rankstaffmsnc/{id}', [StationController::class,'rankMsncStaff'])->name('rankMsncStaff');
    Route::get('/rankstaffamdl/{id}', [StationController::class,'rankAmdlStaff'])->name('rankAmdlStaff');

    Route::get('view/rank/dept/staff/{id1}/{id2}', [StationController::class,'viewRankDeptStaff'])->name('viewRankDeptStaff');
    Route::get('view/rank/dept/staff/msnc/{id1}/{id2}', [StationController::class,'viewRankDeptStaffMsnc'])->name('viewRankDeptStaffMsnc');

    //MSNC ROLES
    Route::get('/msnc/supervisors', [AdminController::class, 'msncSupervisors'])->name('msncSupervisors');
    Route::get('/msnc/hrs', [AdminController::class, 'msncHrs'])->name('msncHrs');
    Route::get('/msnc/sdms', [AdminController::class, 'msncSdms'])->name('msncSdms');
    Route::get('deletefake', [StationController::class, 'deleteUsers'])->name('deleteUsers');

});
