<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ViewUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentClassesController;
use App\Http\Controllers\studentYearController;
use App\Http\Controllers\studentGroupsController;
use App\Http\Controllers\studentShiftController;
use App\Http\Controllers\studentFeeController;
use App\Http\Controllers\studentFee_amountController;
use App\Http\Controllers\studentExamController;
use App\Http\Controllers\studentSubjectController;
use App\Http\Controllers\studentAssingController;
use App\Http\Controllers\designationController;
use App\Http\Controllers\studentRegistationController;
use App\Http\Controllers\studentRollCOntroller;
use App\Http\Controllers\studentRegFeeController;
use App\Http\Controllers\studentMonthlyFeeController;
use App\Http\Controllers\studentExamFeeController;

// employee
use App\Http\Controllers\employee\employeeRegistrationController;
use App\Http\Controllers\employee\employeeSalaryController;
use App\Http\Controllers\employee\employeeLeaveController;
use App\Http\Controllers\employee\employeeAttendController;
use App\Http\Controllers\employee\employeeMonthlySalaryController;

// marksController
use App\Http\Controllers\marks\marksController;
use App\Http\Controllers\DefaultController;

// AccountStudentController

use App\Http\Controllers\AccountStudentController;
use App\Http\Controllers\GradeController;

// MarksheetController

use App\Http\Controllers\MarksheetController;
// use App\Http\Controllers\GradeController;
// use App\Http\Controllers\GradeController;
// use App\Http\Controllers\GradeController;

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

// Route::get('/', [FrontController::class,"index"]);
// Route::get("/welcome",function(){
//     return view('welcome');
// });
Route::get('/', [FrontController::class,"index"]);

Route::get('/login', [FrontController::class,"loginPage"]);

// ViewUserController
Route::prefix('user')->group(function(){
    Route::get('/view', [ViewUserController::class,"index"])->name('user.view');
    Route::get('/add', [ViewUserController::class,"add"])->name('user.add');
    Route::post('/store', [ViewUserController::class,"store"])->name('user.store');
    Route::get('/edit/{id}', [ViewUserController::class,"edit"])->name('user.edit');
    Route::post('/update/{id}', [ViewUserController::class,"update"])->name('user.update');
    Route::get('/delete/{id}', [ViewUserController::class,"delete"])->name('user.delete');

});


Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class,"index"])->name('profile.view');
    Route::get('/edit', [ProfileController::class,"edit"])->name('profile.edit');
    Route::post('/update', [ProfileController::class,"update"])->name('profile.update');
    Route::get('/password/view', [ProfileController::class,"password_view"])->name('profile.password_view');
    Route::post('/password/update', [ProfileController::class,"password_update"])->name('profile.password_update');
});

Route::prefix('setup')->group(function(){
    Route::get('/student/class/view', [studentClassesController::class,"index"])->name('setup.student.class.view');
    Route::get('/student/class/add', [studentClassesController::class,"add"])->name('setup.student.class.add');
    Route::post('/student/class/store', [studentClassesController::class,"store"])->name('setup.student.class.store');
    Route::get('/student/class/edit/{id}', [studentClassesController::class,"edit"])->name('setup.student.class.edit');
    Route::post('/student/class/update/{id}', [studentClassesController::class,"update"])->name('setup.student.class.update');
    Route::get('/student/class/delete/{id}', [studentClassesController::class,"delete"])->name('setup.student.class.delete');

});

Route::prefix('setup')->group(function(){
    Route::get('/student/year/view', [studentYearController::class,"index"])->name('setup.student.year.view');
    Route::get('/student/year/add', [studentYearController::class,"add"])->name('setup.student.year.add');
    Route::post('/student/year/store', [studentYearController::class,"store"])->name('setup.student.year.store');
    Route::get('/student/year/edit/{id}', [studentYearController::class,"edit"])->name('setup.student.year.edit');
    Route::post('/student/year/update/{id}', [studentYearController::class,"update"])->name('setup.student.year.update');
    Route::get('/student/year/delete/{id}', [studentYearController::class,"delete"])->name('setup.student.year.delete');

});

Route::prefix('setup')->group(function(){
    Route::get('/student/group/view', [studentGroupsController::class,"index"])->name('setup.student.group.view');
    Route::get('/student/group/add', [studentGroupsController::class,"add"])->name('setup.student.group.add');
    Route::post('/student/group/store', [studentGroupsController::class,"store"])->name('setup.student.group.store');
    Route::get('/student/group/edit/{id}', [studentGroupsController::class,"edit"])->name('setup.student.group.edit');
    Route::post('/student/group/update/{id}', [studentGroupsController::class,"update"])->name('setup.student.group.update');
    Route::get('/student/group/delete/{id}', [studentGroupsController::class,"delete"])->name('setup.student.group.delete');

});

Route::prefix('setup')->group(function(){
    Route::get('/student/shift/view', [studentShiftController::class,"index"])->name('setup.student.shift.view');
    Route::get('/student/shift/add', [studentShiftController::class,"add"])->name('setup.student.shift.add');
    Route::post('/student/shift/store', [studentShiftController::class,"store"])->name('setup.student.shift.store');
    Route::get('/student/shift/edit/{id}', [studentShiftController::class,"edit"])->name('setup.student.shift.edit');
    Route::post('/student/shift/update/{id}', [studentShiftController::class,"update"])->name('setup.student.shift.update');
    Route::get('/student/shift/delete/{id}', [studentShiftController::class,"delete"])->name('setup.student.shift.delete');

});

// studentFeeController

Route::prefix('setup')->group(function(){
    Route::get('/student/fee/view', [studentFeeController::class,"index"])->name('setup.student.fee.view');
    Route::get('/student/fee/add', [studentFeeController::class,"add"])->name('setup.student.fee.add');
    Route::post('/student/fee/store', [studentFeeController::class,"store"])->name('setup.student.fee.store');
    Route::get('/student/fee/edit/{id}', [studentFeeController::class,"edit"])->name('setup.student.fee.edit');
    Route::post('/student/fee/update/{id}', [studentFeeController::class,"update"])->name('setup.student.fee.update');
    Route::get('/student/fee/delete/{id}', [studentFeeController::class,"delete"])->name('setup.student.fee.delete');

});

// studentFee_amountController

Route::prefix('setup')->group(function(){
    Route::get('/student/fee_amount/view', [studentFee_amountController::class,"index"])->name('setup.student.fee_amount.view');
    Route::get('/student/fee_amount/add', [studentFee_amountController::class,"add"])->name('setup.student.fee_amount.add');
    Route::post('/student/fee_amount/store', [studentFee_amountController::class,"store"])->name('setup.student.fee_amount.store');
    Route::get('/student/fee_amount/edit/{fee_type_id}', [studentFee_amountController::class,"edit"])->name('setup.student.fee_amount.edit');
    Route::post('/student/fee_amount/update/{fee_type_id}', [studentFee_amountController::class,"update"])->name('setup.student.fee_amount.update');
    Route::get('/student/fee_amount/details/{fee_type_id}', [studentFee_amountController::class,"details"])->name('setup.student.fee_amount.details');

});

Route::prefix('setup')->group(function(){
    Route::get('/student/exam/view', [studentExamController::class,"index"])->name('setup.student.exam.view');
    Route::get('/student/exam/add', [studentExamController::class,"add"])->name('setup.student.exam.add');
    Route::post('/student/exam/store', [studentExamController::class,"store"])->name('setup.student.exam.store');
    Route::get('/student/exam/edit/{id}', [studentExamController::class,"edit"])->name('setup.student.exam.edit');
    Route::post('/student/exam/update/{id}', [studentExamController::class,"update"])->name('setup.student.exam.update');
    Route::get('/student/exam/details/{id}', [studentExamController::class,"details"])->name('setup.student.exam.details');

});

//studentSubjectController
Route::prefix('setup')->group(function(){
    Route::get('/student/subject/view', [studentSubjectController::class,"index"])->name('setup.student.subject.view');
    Route::get('/student/subject/add', [studentSubjectController::class,"add"])->name('setup.student.subject.add');
    Route::post('/student/subject/store', [studentSubjectController::class,"store"])->name('setup.student.subject.store');
    Route::get('/student/subject/edit/{id}', [studentSubjectController::class,"edit"])->name('setup.student.subject.edit');
    Route::post('/student/subject/update/{id}', [studentSubjectController::class,"update"])->name('setup.student.subject.update');
    

});

//studentAssingSubjectController
Route::prefix('setup')->group(function(){
    Route::get('/student/subject/aasign/view', [studentAssingController::class,"index"])->name('setup.student.aasign.view');
    Route::get('/student/subject/aasign/add', [studentAssingController::class,"add"])->name('setup.student.aasign.add');
    Route::post('/student/subject/aasign/store', [studentAssingController::class,"store"])->name('setup.student.aasign.store');
    Route::get('/student/subject/aasign/edit/{class_id}', [studentAssingController::class,"edit"])->name('setup.student.aasign.edit');
    Route::post('/student/subject/aasign/update/{class_id}', [studentAssingController::class,"update"])->name('setup.student.aasign.update');
    Route::get('/student/subject/aasign/details/{class_id}', [studentAssingController::class,"details"])->name('setup.student.aasign.details');

});


Route::prefix('setup')->group(function(){
    Route::get('/student/designation/view', [designationController::class,"index"])->name('setup.student.designation.view');
    Route::get('/student/designation/add', [designationController::class,"add"])->name('setup.student.designation.add');
    Route::post('/student/designation/store', [designationController::class,"store"])->name('setup.student.designation.store');
    Route::get('/student/designation/edit/{id}', [designationController::class,"edit"])->name('setup.student.designation.edit');
    Route::post('/student/designation/update/{id}', [designationController::class,"update"])->name('setup.student.designation.update');
    Route::get('/student/designation/delete/{id}', [designationController::class,"delete"])->name('setup.student.designation.delete');

});

Route::prefix('student')->group(function(){
    // studentRegistationController
    Route::get('/registation/view', [studentRegistationController::class,"index"])->name('setup.student.registation.view');
    Route::get('/registation/add', [studentRegistationController::class,"add"])->name('setup.student.registation.add');
    Route::post('/registation/store', [studentRegistationController::class,"store"])->name('setup.student.registation.store');
    Route::get('/registation/edit/{student_id}', [studentRegistationController::class,"edit"])->name('setup.student.registation.edit');
    Route::post('/registation/update/{student_id}', [studentRegistationController::class,"update"])->name('setup.student.registation.update');
    //Route::get('/registation/delete/{id}', [studentRegistationController::class,"delete"])->name('setup.student.registation.delete');
    Route::get('/registation/search', [studentRegistationController::class,"search"])->name('setup.student.registation.search');
    
    Route::get('/registation/promotion/{student_id}', [studentRegistationController::class,"promotion"])->name('setup.student.registation.promotion');
    Route::post('/registation/promotion/store/{student_id}', [studentRegistationController::class,"storePromotion"])->name('setup.student.registation.promotion.store');
    Route::get('/registation/pdf/{student_id}', [studentRegistationController::class,"pdf"])->name('setup.student.registation.pdf.view');
    
    // studentRollCOntroller

    Route::get('/roll/view/',[studentRollCOntroller::class,"roll"])->name('setup.student.roll.generate.view');
    Route::get('/roll/get/student',[studentRollCOntroller::class,"getstudent"])->name('setup.student.roll.generate.getstudent');
    Route::post('/roll/store/',[studentRollCOntroller::class,"store"])->name('setup.student.roll.generate.store');
   
    // studentRegFeeController

    Route::get('/reg/amount/view/',[studentRegFeeController::class,"reg"])->name('setup.student.reg.amount.view');
    Route::get('/reg/amount//student',[studentRegFeeController::class,"regstudent"])->name('setup.student.reg.amount.getstudent');
    Route::get('/reg/amount/payslip',[studentRegFeeController::class,"payslip"])->name('setup.student.reg.amount.payslip');
    

    // studentMonthlyFeeController

    Route::get('/month/amount/view/',[studentMonthlyFeeController::class,"month"])->name('setup.student.reg.monthlyFee.view');
    Route::get('/month/amount//student',[studentMonthlyFeeController::class,"monthstudent"])->name('setup.student.monthlyFee.amount.getstudent');
    Route::get('/month/amount/payslip',[studentMonthlyFeeController::class,"payslip"])->name('setup.student.reg.monthlyFee.payslip');
    

    // studentExamFeeController

    Route::get('/exam/fee/view/',[studentExamFeeController::class,"exam"])->name('setup.student.reg.examFee.view');
    Route::get('/exam/fee/student',[studentExamFeeController::class,"examstudent"])->name('setup.student.examFee.amount.getstudent');
    Route::get('/exam/fee/payslip',[studentExamFeeController::class,"payslip"])->name('setup.student.reg.examFee.payslip');
    
});

//Route::get('employee/registation/view', [srgController::class,"index"])->name('setup.employee.registation.view');

Route::prefix('employee')->group(function(){
    // studentRegistationController
    Route::get('employee/registation/view', [employeeRegistrationController::class,"index"])->name('setup.employee.registation.view');
    Route::get('employee/registation/add', [employeeRegistrationController::class,"add"])->name('setup.employee.registation.add');
    Route::post('employee/registation/store', [employeeRegistrationController::class,"store"])->name('setup.employee.registation.store');
    Route::get('employee/registation/edit/{id}', [employeeRegistrationController::class,"edit"])->name('setup.employee.registation.edit');
    Route::post('employee/registation/update/{id}', [employeeRegistrationController::class,"update"])->name('setup.employee.registation.update');

    Route::get('/employee/profile/view/{id}',[employeeRegistrationController::class,"pdf"])->name('setup.employee.registation.pdf.view');

    // studentRegistationController
    Route::get('employee/salary/view', [employeeSalaryController::class,"index"])->name('setup.employee.salary.view');
    Route::get('employee/salary/add/{id}', [employeeSalaryController::class,"add"])->name('setup.employee.salary.add');
    Route::post('employee/salary/store/{id}', [employeeSalaryController::class,"store"])->name('setup.employee.salary.store');
    Route::get('employee/salary/details/{id}', [employeeSalaryController::class,"details"])->name('setup.employee.salary.details');
    
    // Route::post('employee/salary/update/{id}', [employeeSalaryController::class,"update"])->name('setup.employee.salary.update');

    // Route::get('/employee/salary/view/{id}',[employeeSalaryController::class,"pdf"])->name('setup.employee.salary.pdf.view');
    // employeeLeaveController

    Route::get('/leave/view', [employeeLeaveController::class,"index"])->name('setup.employee.leave.view');
    Route::get('/leave/add', [employeeLeaveController::class,"add"])->name('setup.employee.leave.add');
    Route::post('/leave/store', [employeeLeaveController::class,"store"])->name('setup.employee.leave.store');
    Route::get('/leave/edit/{id}', [employeeLeaveController::class,"edit"])->name('setup.employee.leave.edit');
    Route::post('/leave/upload/{id}', [employeeLeaveController::class,"update"])->name('setup.employee.leave.upload');
    
    // employeeAttendController
    Route::get('/attend/view', [employeeAttendController::class,"index"])->name('setup.employee.attend.view');
    Route::get('/attend/add', [employeeAttendController::class,"add"])->name('setup.employee.attend.add');
    Route::post('/attend/store', [employeeAttendController::class,"store"])->name('setup.employee.attend.store');
    Route::get('/attend/edit/{date}', [employeeAttendController::class,"edit"])->name('setup.employee.attend.edit');
    Route::post('/attend/upload', [employeeAttendController::class,"update"])->name('setup.employee.attend.upload');
    Route::get('/attend/details/{date}', [employeeAttendController::class,"details"])->name('setup.employee.attend.details');


    // employeeMonthlySalaryController

    Route::get('/monthly/salary/view', [employeeMonthlySalaryController::class,"index"])->name('setup.employee.monthly.salary.view');
    Route::get('/monthly/salary/add', [employeeMonthlySalaryController::class,"add"])->name('setup.employee.monthly.salary.add');
    Route::get('/monthly/payslip', [employeeMonthlySalaryController::class,"payslip"])->name('setup.employee.monthly.salary.payslip');
    
});

Route::prefix('marks')->group(function(){
    Route::get('add/student', [marksController::class,"index"])->name('student.marks.add');
    Route::post('/store/student', [marksController::class,"add"])->name('student.marks.store');
    Route::get('edit/student', [marksController::class,"edit"])->name('student.marks.edit');
    Route::get('edit/mark/student', [marksController::class,"editShow"])->name('student.marks.edit.show');
    Route::post('/update/student', [marksController::class,"update"])->name('student.edit.marks.store');

});

Route::prefix('account')->group(function(){
    Route::get('/student/fee/view', [AccountStudentController::class,"index"])->name('student.fee.view');
    Route::get('/student/fee/add', [AccountStudentController::class,"add"])->name('student.fee.add');
    Route::post('/student/fee/stote', [AccountStudentController::class,"store"])->name('student.fee.store');
    Route::get('/student/fee/get_student', [AccountStudentController::class,"get_student"])->name('student.fee.get_student');
    // Route::post('/update/student', [AccountStudentController::class,"update"])->name('student.edit.marks.store');

});

Route::prefix('student')->group(function(){
    Route::get('/grade/view', [GradeController::class,"index"])->name('student.grade.view');
    Route::get('/grade/add', [GradeController::class,"add"])->name('student.grade.add');
    Route::post('/grade/stote', [GradeController::class,"store"])->name('student.grade.store');
    
    // MarksheetController

    Route::get('/marksheet/view', [MarksheetController::class,"index"])->name('student.marksheet.view');
    Route::get('/marksheet/add', [MarksheetController::class,"add"])->name('student.marksheet.add');
    Route::post('/marksheet/stote', [MarksheetController::class,"store"])->name('student.marksheet.store');

});

Route::get('get/student', [DefaultController::class,"get_student"])->name('student.get.mark');
Route::get('get/subject', [DefaultController::class,"get_subject"])->name('student.get.subject');
  





















































Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
