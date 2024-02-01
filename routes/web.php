<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProbationController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SubDepartmentController;
use App\Http\Controllers\UnitController;
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
    return redirect()->route('admin');
});

//Route::get('login', [AuthController::class, 'showStaffLogin'])->name('showStaffLogin');
Route::get('admin/login', [AuthController::class, 'showAdminLogin'])->name('login');
Route::get('kc/admin/{token}', [AuthController::class, 'successfulLogin'])->name('admin.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');




Route::group(['middleware' => 'checkRole:admin', 'prefix' => 'administrator'], function(){

    Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::resource('admins', AdminController::class);
    Route::get('directors', [AdminController::class, 'directors'])->name('directors');
    Route::get('sdms', [AdminController::class, 'sdms'])->name('sdms');
    Route::get('finance/payroll', [AdminController::class, 'financePayroll'])->name('finance.payroll');
    Route::get('supervisors', [AdminController::class, 'supervisors'])->name('supervisors');


    Route::group(['prefix' => 'nomenclature'], function(){
        Route::get('rank', [StationController::class,'nomRank'])->name('nomRank');
        Route::get('group/{id}', [StationController::class,'nomGroup'])->name('nomGroup');
        Route::get('{id}', [StationController::class,'nom'])->name('nom');

    });

    Route::group(['prefix' => 'amdl'], function(){
        Route::get('organizations', [OrganizationController::class, 'index'])->name('organizations.index');
        Route::get('organizations/list/{id}', [OrganizationController::class, 'show'])->name('organizations.show');
        Route::get('all/staff', [OrganizationController::class,'allstaffamdl'])->name('allstaffamdl');
        Route::get('ranks', [OrganizationController::class,'amdlRank'])->name('amdlRank');



    });


    //MSNC ROUTES

    Route::group(['prefix' => 'msnc'], function(){
         Route::get('stations/list/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
         Route::get('alldept', [StationController::class,'alldept'])->name('alldept');
         Route::get('all/staff', [StationController::class,'allstaffmsnc'])->name('allstaffmsnc');
         Route::get('msnc/rank', [StationController::class,'msncRank'])->name('msncRank');


    });




    Route::get('adddirector/', [OrganizationController::class, 'adddirector'])->name('adddirector');

    Route::resource('stations', StationController::class);


    Route::get('/deptall/{id}', [StationController::class,'deptall'])->name('deptall');
    Route::get('/supervisorStaff', [StationController::class,'supervisorStaff'])->name('supervisorStaff');
    Route::get('/directororg', [StationController::class,'directororg'])->name('directororg');
    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');

    Route::get('/depthr', [StationController::class,'depthr'])->name('depthr');
    Route::get('/deptSupervisor', [StationController::class,'deptSupervisor'])->name('deptSupervisor');
    Route::get('/addstaff/{id}', [StationController::class,'addstaff'])->name('addstaff');
    Route::get('/MydeptGoals', [StationController::class,'MydeptGoals'])->name('MydeptGoals');

    Route::get('/deptstaff/{id}', [StationController::class,'deptstaff'])->name('deptstaff');
    Route::delete('msncstaffdelete/{id}', [StationController::class,'msncStaffDelete'])->name('msncStaffDelete');


    Route::get('/editstaffmsnc', [StationController::class,'editstaffmsnc'])->name('editstaffmsnc');



});



Route::group(['middleware' => 'checkRole:finance', 'prefix' => 'finance'], function(){

    Route::get('/', [AdminController::class, 'financeHome'])->name('financesHome');

});
Route::group(['middleware' => 'checkRole:director', 'prefix' => 'director'], function(){

    Route::get('/', [AdminController::class, 'directorsHome'])->name('directorsHome');

});
Route::group(['middleware' => 'checkRole:sdm', 'prefix' => 'sdm'], function(){

    Route::get('/', [AdminController::class, 'sdmHome'])->name('sdmHome');
});



Route::group(['middleware' => 'isAdmin'], function(){


    Route::group(['prefix' => 'amdl/staff'], function(){


        Route::get('director/{id}', [OrganizationController::class,'directorStaffAmdl'])->name('directorStaffAmdl');

    });

    Route::group(['prefix' => 'msnc/staff'], function(){
        Route::get('directors/{id}', [StationController::class,'directorStaffMsnc'])->name('directorStaffMsnc');

    });

    Route::group(['prefix' => 'amdl/grades'], function(){
        Route::get('grades/{id}', [OrganizationController::class,'gradeDept'])->name('grade.index');
        Route::get('index/{id1}/{id2}', [OrganizationController::class,'reviewIndex'])->name('reviews.index');
        Route::get('manage/{id1}/{id2}', [OrganizationController::class,'reviewManage'])->name('reviews.manage');
        Route::get('staff/grade/{id}', [OrganizationController::class,'staffGradeAmdl'])->name('staffGradeAmdl');

    });
    Route::group(['prefix' => 'amdl/reviews'], function(){
        Route::get('years/{id}', [OrganizationController::class,'reviewYears'])->name('reviews.years');
        Route::get('index/{id1}/{id2}', [OrganizationController::class,'reviewIndex'])->name('reviews.index');
        Route::get('manage/{id1}/{id2}', [OrganizationController::class,'reviewManage'])->name('reviews.manage');
        Route::get('staff/review/{id}', [OrganizationController::class,'staffReviewAmdl'])->name('staffReviewAmdl');

    });

    Route::group(['prefix' => 'msnc/reviews'], function(){
        Route::get('years/{id}', [StationController::class,'reviewYears'])->name('msncReviews.years');
        Route::get('index/{id1}/{id2}', [StationController::class,'reviewIndex'])->name('msncReviews.index');
        Route::get('manage/{id1}/{id2}', [StationController::class,'reviewManage'])->name('msncReviews.manage');
        Route::get('staff/review/{id}', [StationController::class,'staffReviewMsnc'])->name('staffReviewMsnc');

    });

    Route::group(['prefix' => 'amdl/units'], function(){
        Route::get('create/{id}', [SubDepartmentController::class,'create'])->name('subdepartments.create');
        Route::delete('delete/{id}', [SubDepartmentController::class,'destroy'])->name('subdepartments.destroy');
        Route::get('index/{id}', [SubDepartmentController::class,'index'])->name('subdepartments.index');
        Route::post('create/{id}', [SubDepartmentController::class,'store']);
        Route::post('assignhod', [SubDepartmentController::class,'storeAmdlHod'])->name('storeAmdlHod');
        Route::get('assignhod/{id}', [SubDepartmentController::class,'assignAmdlHod'])->name('assignAmdlHod');
        Route::get('viewStaff/{id1}/{id2}', [SubDepartmentController::class,'viewAmdlSubDeptStaff'])->name('viewAmdlSubDeptStaff');
        Route::delete('deleteStaff/{id}', [SubDepartmentController::class,'subDeptStaffDestroy'])->name('subdeptstaff.destroy');


    });

    Route::group(['prefix' => 'msnc/units'], function(){
        Route::get('index/{id}', [SubDepartmentController::class,'msncindex'])->name('subdepartments.msncindex');

        Route::get('assignhod/{id}', [SubDepartmentController::class,'assignMsncHod'])->name('assignMsncHod');
        Route::post('assignhod', [SubDepartmentController::class,'storeMsncHod'])->name('storeMsncHod');
        Route::get('viewstaff/{id1}/{id2}', [SubDepartmentController::class,'viewMsncSubDeptStaff'])->name('viewMsncSubDeptStaff');
        Route::get('create/{id}', [SubDepartmentController::class,'createMsnc'])->name('subdepartments.createMsnc');
        Route::post('create/{id}', [SubDepartmentController::class,'storeMsnc']);

    });
    Route::group(['prefix' => 'amdl/probation'], function(){
        Route::get('index/{id}', [ProbationController::class,'probationIndex'])->name('probation.index');
        Route::get('staff/{id}', [ProbationController::class,'probationStaffAmdl'])->name('probationStaffAmdl');

    });

    Route::group(['prefix' => 'msnc/probation'], function(){
        Route::get('index/{id}', [ProbationController::class,'msncProbationIndex'])->name('msncProbation.index');
        Route::get('staff/{id}', [ProbationController::class,'probationStaffMsnc'])->name('probationStaffMsnc');

    });


//    Route::resource('subdepartments', SubDepartmentController::class);


    Route::get('amdl/profile/{id}', [OrganizationController::class,'amdlProfile'])->name('amdlProfile');
    Route::get('msnc/profile/{id}', [StationController::class,'msncProfile'])->name('msncProfile');
//    Route::get('staffgradeamdl/{id}', [StationController::class,'staffGradeamdl'])->name('staffGradeAmdl');

    Route::get('grade/{id}', [GradeController::class,'grade'])->name('grade');
    Route::get('grade/msnc/{id}', [GradeController::class,'msncGrade'])->name('msncGrade');
    Route::post('grade/{id}', [GradeController::class,'amdlStoreGrade'])->name('amdlStoreGrade');
//    Route::get('/staffgradeAmdl/{id}', [StationController::class,'staffGradeAmdl'])->name('staffGradeAmdl');

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


    //GOALS
    Route::get('/goals/{id}', [StationController::class,'goals'])->name('goals');

    Route::get('/yearlygoals/{id1}/{id2}', [GoalController::class,'yearlyIndex'])->name('yearlyGoals.index');
    Route::get('/monthlygoals/{id1}/{id2}', [GoalController::class,'monthlyIndex'])->name('monthlyGoals.index');
    Route::get('/msncmonthlygoals/{id1}/{id2}', [GoalController::class,'msncMonthlyIndex'])->name('msncMonthlyGoals.index');


    Route::get('/directorgoals/{id}', [StationController::class,'directorgoals'])->name('directorgoals');
    Route::get('/hrgoals/{id}/{gid}', [StationController::class,'hrgoals'])->name('hrgoals');
    Route::get('/staffgoals/{id}', [StationController::class,'staffgoals'])->name('staffgoals');
    Route::get('/supervisorGoals/{id}', [StationController::class,'supervisorGoals'])->name('supervisorGoals');
});
