<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\ExpensesReportsController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\LibraryReportsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SchoolAttendanceController;
use App\Http\Controllers\Admin\SchoolFeesController;
use App\Http\Controllers\Admin\SchoolSubjectsController;
use App\Http\Controllers\Admin\SickbayController;
use App\Http\Controllers\Admin\SickbayReportsController;
use App\Http\Controllers\Admin\StudentExamsController;
use App\Http\Controllers\Admin\StudentExamsReportController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\StudentSetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\SchoolFeesReportController;
use App\Http\Controllers\Admin\PurchasesController;
use App\Http\Controllers\Admin\PurchasesReportController;
use App\Http\Controllers\Admin\IncomeStatementController;


use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



Route::get('/', function () {
    return view('auth.login');
});




// start of prevent-back-history middleware
Route::middleware(['prevent-back-history'])->group(function () {


Route::middleware(['auth',config('jetstream.auth_session'),'verified',])->group(function () {



    Route::get('/dashboard', function () {return view('admin.body.index');
})->name('dashboard');



    // start of  middleware
    Route::group(['middleware' => 'role-admin'],function(){


Route::controller(UserProfileController::class)->group(function(){

Route::get('/logout','destroy')->name('admin.logout');
Route::get('/profile','profileAdmin')->name('profile.view');
Route::get('/password/change','Adminpassword')->name('admin.password.view');
Route::post('/profile/update','profileUpdate')->name('admin.profile.update');
Route::post('/password/update','passUpdate')->name('admin.password.update');

});








Route::prefix('user')->group(function(){

        
    //Roles Routes ///
    Route::get('/roles/view',[RoleController::class,'AllRoles'])->name('user.roles.list');
    
    Route::get('/roles/show/{id}',[RoleController::class,'show'])->name('role.show');
    
    Route::get('/roles/add', [RoleController::class, 'create'])->name('roles.create');
    
    Route::post('/roles/store', [RoleController::class, 'StoreRoles'])->name('roles.store');
    
    Route::get('/roles/edit/{id}', [RoleController::class, 'EditRoles'])->name('role.edit');
    
    Route::post('/roles/update/{id}', [RoleController::class, 'UpdateRoles'])->name('role.update');
    
    Route::get('/roles/delete/{id}', [RoleController::class, 'DeleteRoles'])->name('role.delete');
    
    
    
    
    
    //Permissions Routes ///
    Route::get('/permissions/view',[RoleController::class,'AllPermission'])->name('permissions.view');
    
    Route::post('/permissions/store', [RoleController::class, 'StorePermission'])->name('permissions.store');
    
    Route::get('/permission/edit/{id}', [RoleController::class, 'EditPermission']);
    
    Route::post('/permission/update', [RoleController::class, 'UpdatePermission']);
    
    Route::get('/permissions/delete/{id}', [RoleController::class, 'DeletePermission'])->name('permission.delete');
    
    
    

    Route::get('/import/permission', [RoleController::class,'ImportPermission'])->name('import.permission');
    Route::post('/import/permission/from/excel', [RoleController::class,'Import'])->name('import');
    
    
    // Assign Subject Teacher Routes 
    
    Route::get('/subject/teacher/view', [UserController::class, 'ViewAssignSubjectTeacher'])->name('assign.subject.teacher.view');
    
    Route::get('assign/subject/teacher/details/{user_id}', [UserController::class, 'DetailsAssignSubjectTeacher'])->name('assign.subject.teacher.details');
    
    
    });
    







/// Setups Management
Route::prefix('setups')->group(function(){


    Route::get('/view/system/users',[UserController::class,'AllSystemUsers'])->name('user.roles.view');

       

    // Student Class Routes 
    Route::get('/class/view', [StudentSetController::class, 'ViewClasses'])->name('classes.view');
    
    Route::post('/class/store', [StudentSetController::class, 'ClassStore'])->name('store.class');
    
    Route::get('/class/edit/{id}', [StudentSetController::class, 'ClassEdit']);
    
    Route::post('/class/update', [StudentSetController::class, 'ClassUpdate']);
    
    Route::get('/class/delete/{id}', [StudentSetController::class, 'ClassDelete'])->name('class.delete');
    

    
    // Fee Category Routes 
    
    Route::get('/fee/category/view', [StudentSetController::class, 'ViewFeeCat'])->name('fee.category.view');
    
    Route::post('/fee/category/store', [StudentSetController::class, 'FeeCatStore'])->name('store.fee.category');
    
    Route::get('/fee/category/edit/{id}', [StudentSetController::class, 'FeeCatEdit']);
    
    Route::post('/fee/category/update', [StudentSetController::class, 'FeeCategoryUpdate']);
    
    Route::get('/fee/category/delete/{id}', [StudentSetController::class, 'FeeCategoryDelete'])->name('fee.category.delete');
    

    // Fee Category Amount Routes 
    
    Route::get('fee/amount/view', [StudentSetController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    
    Route::get('fee/amount/add', [StudentSetController::class, 'AddFeeAmount'])->name('fee.amount.add');
    
    Route::post('fee/amount/store', [StudentSetController::class, 'StoreFeeAmount'])->name('store.fee.amount');
    
    Route::get('fee/amount/edit/{fee_category_id}', [StudentSetController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    
    Route::post('fee/amount/update/{fee_category_id}', [StudentSetController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
    
    Route::get('fee/amount/details/{fee_category_id}', [StudentSetController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
    
    
    // Exam Type Routes 
    
    Route::get('exam/type/view', [StudentSetController::class, 'ViewExamType'])->name('exam.type.view');
    
    Route::post('exam/type/store', [StudentSetController::class, 'ExamTypeStore'])->name('store.exam.type');
    
    Route::get('exam/type/edit/{id}', [StudentSetController::class, 'ExamTypeEdit']);
    
    Route::post('exam/type/update', [StudentSetController::class, 'ExamTypeUpdate']);
    
    Route::get('exam/type/delete/{id}', [StudentSetController::class, 'ExamTypeDelete'])->name('exam.type.delete');
    
    
    // School Subject All Routes 
    
    Route::get('school/subject/view', [SchoolSubjectsController::class, 'ViewSubject'])->name('school.subject.view');
    
    Route::post('school/subject/store', [SchoolSubjectsController::class, 'SubjectStore'])->name('store.school.subject');
    
    Route::get('school/subject/edit/{id}', [SchoolSubjectsController::class, 'SubjectEdit']);
    
    Route::post('school/subject/update', [SchoolSubjectsController::class, 'SubjectUpdate']);
    
    //Route::get('school/subject/delete/{id}', [SchoolSubjectsController::class, 'SubjectDelete'])->name('school.subject.delete');
    
    
    

    
    
    // Designation All Routes 
    
    Route::get('designation/view', [SchoolSubjectsController::class, 'ViewDesignation'])->name('designation.view');
       
    Route::post('designation/store', [SchoolSubjectsController::class, 'DesignationStore'])->name('store.designation');
    
    Route::get('designation/edit/{id}', [SchoolSubjectsController::class, 'DesignationEdit']);
    
    Route::post('designation/update', [SchoolSubjectsController::class, 'DesignationUpdate']);
    
    Route::get('designation/delete/{id}', [SchoolSubjectsController::class, 'DesignationDelete'])->name('designation.delete');

    
    
    
    
    /// Class Sessions Routes 
    Route::controller(StudentSetController::class)->group(function() {
    
        Route::get('/class/sessions/view','ViewSessions')->name('class.session.view');
           
        Route::post('/class/sessions/store','StoreSession')->name('store.class.session');
        
        Route::get('/class/session/edit/{id}','EditSession');
        
        Route::post('/class/session/update','UpdateSession'); 
        
        });
    
    

    
    
    Route::controller(StudentSetController::class)->group(function() {
    
        Route::get('/term/view','ViewTerm')->name('terms.view');
        
        Route::post('/term/store','TermStore')->name('store.term');
        
        Route::get('/term/edit/{id}','TermEdit');
        
        Route::post('/term/update','TermUpdate');
        
        Route::get('/term/delete/{id}','TermDelete')->name('term.delete');
        
        });
    
    
    
    
        
    
    
        
    ///    PRIMARY Marks Entry Grades 
    
    Route::get('marks/grade/view', [SchoolSubjectsController::class, 'MarksGradeView'])->name('marks.entry.grade');
    
    Route::get('marks/grade/add', [SchoolSubjectsController::class, 'MarksGradeAdd'])->name('marks.grade.add');
    
    Route::post('marks/grade/store', [SchoolSubjectsController::class, 'MarksGradeStore'])->name('store.marks.grade');
    
    Route::get('marks/grade/edit/{id}', [SchoolSubjectsController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
    
    Route::post('marks/grade/update/{id}', [SchoolSubjectsController::class, 'MarksGradeUpdate'])->name('update.marks.grade');
    


    
/// NEW O-LEVEL (S1 $ S2) Marks Entry Grades 

Route::get('competency/grading/view', [SchoolSubjectsController::class, 'CompetencyGradeView'])->name('competency.grades.view');

Route::get('competency/grading/add', [SchoolSubjectsController::class, 'CompetencyGradeAdd'])->name('competency.grades.add');

Route::post('competency/grading/store', [SchoolSubjectsController::class, 'CompetencyGradeStore'])->name('store.competency.grades');

Route::get('competency/grading/edit/{id}', [SchoolSubjectsController::class, 'CompetencyGradeEdit'])->name('competency.grades.edit');

Route::post('competency/grading/update/{id}', [SchoolSubjectsController::class, 'CompetencyGradeUpdate'])->name('update.competency.grades');



 /// A-LEVEL  Marks Entry Grade 
    
 Route::get('alevel/marks/grade/view', [SchoolSubjectsController::class, 'AlevelMarksGradeView'])->name('points.entry.grade');
    
 Route::get('alevel/marks/grade/add', [SchoolSubjectsController::class, 'AlevelMarksGradeAdd'])->name('points.entry.grade.add');
 
 Route::post('alevel/marks/grade/store', [SchoolSubjectsController::class, 'AlevelMarksGradeStore'])->name('store.points.entry.grade');
 
 Route::get('alevel/marks/grade/edit/{id}', [SchoolSubjectsController::class, 'AlevelMarksGradeEdit'])->name('points.entry.grade.edit');
 
 Route::post('alevel/marks/grade/update/{id}', [SchoolSubjectsController::class, 'AlevelMarksGradeUpdate'])->name('update.points.entry.grade');

    
    
    
    Route::controller(UserController::class)->group(function() {
    
        Route::get('view/lessons/timetable','ViewSubjectLessons')->name('lessons.view');

        Route::get('view/lessons/timetable/add','SubjectLessonsAdd')->name('lessons.add');

        Route::post('lessons/store','SubjectLessonsStore')->name('lessons.store');

        Route::get('lessons/timetable/edit/{lesson_id}','SubjectLessonsEdit')->name('lessons.edit');

        Route::post('lessons/timetable/update/{lesson_id}','SubjectLessonsUpdate')->name('lessons.update');

                
        Route::get('lessons/timetable/details/{lesson_id}', 'DetailsSubjectLessons')->name('lessons.details');

        Route::get('/get-teacher-subjects', 'GetTeachers')->name('get-teacher-subjects'); 

                       
       Route::get('/lessons/schedule/details/{class}', 'DetailsLessonSchedule')->name('lessons.schedule');
    
    });




    Route::controller(SchoolSubjectsController::class)->group(function() {
        
/// Assign Subjects Competencies Section 

Route::get('subject/competency/view', 'ViewSubjectCompetency')->name('subject.competency.view');

Route::get('subject/competency/add', 'AddSubjectCompetency')->name('subject.competency.add');

Route::post('subject/competency/store', 'StoreSubjectCompetency')->name('store.subject.competency');

Route::get('subject/competency/edit/{subject_id}', 'EditSubjectCompetency')->name('subject.competency.edit');

Route::post('subject/competency/update/{subject_id}', 'UpdateSubjectCompetency')->name('update.subject.competency');

Route::get('subject/competency/details/{subject_id}', 'DetailsSubjectCompetency')->name('subject.competency.details');



    
    
    });

    

    

    
    
    
    
    
    
    
     
    }); 
    
    
    

    /// For  Student Registration///
Route::get('/students/reg/view', [StudentsController::class, 'StudentRegView'])->name('student.registration.view');

Route::post('/students/reg/store', [StudentsController::class, 'StudentRegStore'])->name('store.student.registration');

Route::get('/student/class/wise', [StudentsController::class, 'StudentClassWise'])->name('student.class.wise');

Route::get('/students/reg/edit/{id}', [StudentsController::class, 'StudentRegEdit'])->name('student.registration.edit');


Route::get('/students/reg/details/{id}', [StudentsController::class, 'StudentRegDetails']);


Route::post('/students/reg/update/{id}', [StudentsController::class, 'StudentRegUpdate'])->name('update.student.registration');


Route::get('/deactivate/student/{id}',[StudentsController::class,'inactiveStudent']);

Route::get('/activate/student/{id}',[StudentsController::class,'activeStudent']);




//Students Admissions  

Route::get('/students/admissions/view', [StudentsController::class, 'StudentAdmissionsView'])->name('student.admissions.view');

Route::post('/new/student/admission/store', [StudentsController::class, 'StudentAdmissionStore'])->name('store.student.admission');

Route::get('/student/admission/edit/{id}', [StudentsController::class, 'StudentAdmissionEdit'])->name('student.admission.edit');


Route::get('/student/admission/details/{id}', [StudentsController::class, 'StudentAdmissionDetails']);


Route::post('/student/admission/update/{id}', [StudentsController::class, 'StudentAdmissionUpdate'])->name('update.student.admission');






    
    //Students Class Promotions//
    
    Route::get('/view/students/class/promote', [StudentsController::class, 'StudentsClassPromotion'])->name('students.class.promote');
    
    Route::get('/class/wise', [StudentsController::class, 'ClassWise'])->name('students.class.wise');
    
    Route::post('/students/class/promotion/store', [StudentsController::class, 'ClassPromotion'])->name('students.class.promote.store');
    
    
    
    
    //Students Term Change//
    
    Route::get('/view/students/term/change', [StudentsController::class, 'StudentsTermChange'])->name('students.term.change');
    
    Route::get('/students/term/class/wise', [StudentsController::class, 'StudentsTermClassWise'])->name('students.term.class.wise');
    
    Route::post('/students/term/change/store', [StudentsController::class, 'TermChange'])->name('students.term.change.store');
    
    


//Students inforamtion filter

Route::get('/students/information/filter', [StudentsController::class, 'StudentsInfoFilter'])->name('student.information.filter');
    
Route::get('/filter/class/wise', [StudentsController::class, 'FilterClassWise'])->name('filter.class.wise');
    



Route::get('olevel/general/attendance/view',[SchoolAttendanceController::class, 'OlevelGeneralAttendance'])->name('olevel.attendance.general');

Route::get('olevel/general/attendance/get',[SchoolAttendanceController::class, 'OlevelGeneralAttendanceGet'])->name('olevel.attendance.general.get');



Route::get('alevel/general/attendance/view',[SchoolAttendanceController::class, 'AlevelGeneralAttendance'])->name('alevel.attendance.general');

Route::get('alevel/general/attendance/get',[SchoolAttendanceController::class, 'AlevelGeneralAttendanceGet'])->name('alevel.attendance.general.get');




Route::get('/olevel/students/general/attendance/wise',[SchoolAttendanceController::class, 'OlevelInfoAttendance'])->name('olevel.students.general.attendance.info');

Route::get('/olevel/students/general/attendance/view',[SchoolAttendanceController::class, 'OlevelInfoAttendanceView'])->name('olevel.students.general.attendance.view');


Route::get('/alevel/students/general/attendance/wise',[SchoolAttendanceController::class, 'AlevelInfoAttendance'])->name('alevel.students.general.attendance.info');

Route::get('/alevel/students/general/attendance/view',[SchoolAttendanceController::class, 'AlevelInfoAttendanceView'])->name('alevel.students.general.attendance.view');












// Assign O-level Student To Subject Routes //

Route::get('assign/olevel/student/subject/view', [StudentsController::class, 'ViewAssignOlevelStudentToSubject'])->name('assign.olevel.student.subject.view');

Route::get('assign/olevel/student/subject/add/{id}', [StudentsController::class, 'AddAssignOlevelStudentToSubject'])->name('assign.olevel.student.subject.add');

Route::post('assign/olevel/student/subject/store/{student_id}', [StudentsController::class, 'StoreAssignOlevelStudentToSubject'])->name('store.assign.olevel.student.subject');

Route::get('assign/olevel/student/subject/edit/{student_id}', [StudentsController::class, 'EditAssignOlevelStudentToSubject'])->name('assign.olevel.student.subject.edit');

Route::post('assign/olevel/student/subject/update/{student_id}', [StudentsController::class, 'UpdateAssignOlevelStudentToSubject'])->name('update.assign.olevel.student.subject');

Route::get('assign/olevel/student/subject/details/{student_id}', [StudentsController::class, 'DetailsAssignOlevelStudentToSubject'])->name('assign.olevel.student.subject.details');

Route::get('assign/olevel/student/subject/getstudents',[StudentsController::class,'GetOlevelStudent'])->name('get.students.olevel');

Route::get('year/olevel/class',[StudentsController::class,'OlevelStudentClassYear'])->name('olevel.student.year.class');



// Assign A-level Student To Subject Routes //

Route::get('assign/student/subject/view', [StudentsController::class, 'ViewAssignStudentToSubject'])->name('assign.student.subject.view');

Route::get('assign/student/subject/add/{id}', [StudentsController::class, 'AddAssignStudentToSubject'])->name('assign.student.subject.add');

Route::post('assign/student/subject/store/{student_id}', [StudentsController::class, 'StoreAssignStudentToSubject'])->name('store.assign.student.subject');

Route::get('assign/student/subject/edit/{student_id}', [StudentsController::class, 'EditAssignStudentToSubject'])->name('assign.student.subject.edit');

Route::post('assign/student/subject/update/{student_id}', [StudentsController::class, 'UpdateAssignStudentToSubject'])->name('update.assign.student.subject');

Route::get('assign/student/subject/details/{student_id}', [StudentsController::class, 'DetailsAssignStudentToSubject'])->name('assign.student.subject.details');

Route::get('assign/student/subject/getstudents',[StudentsController::class,'GetStudents'])->name('get.students.alevel');

Route::get('year/class',[StudentsController::class,'AlevelStudentClassYear'])->name('alevel.student.year.class');







    /// Teaching Staff Routes ///
Route::get('/all/employees/view', [EmployeeController::class, 'EmployeesView'])->name('employees.view');

Route::get('reg/teacher/employee/add', [EmployeeController::class, 'TeacherEmployeeAdd'])->name('teacher.employee.registration.add');

Route::post('reg/teacher/employee/store', [EmployeeController::class, 'TeacherEmployeeStore'])->name('store.teacher.employee.registration');

Route::get('reg/teacher/employee/edit/{id}', [EmployeeController::class, 'TeacherEmployeeEdit'])->name('teacher.employee.registration.edit');

Route::post('reg/teacher/employee/update/{id}', [EmployeeController::class, 'TeacherEmployeeUpdate'])->name('update.teacher.employee.registration');

Route::get('/employee/details/{id}', [EmployeeController::class, 'EmployeeDetails']);


/// Non-Teaching Staff Routes ///

Route::post('reg/nonteacher/employee/store', [EmployeeController::class, 'NonTeacherEmployeeStore'])->name('store.non.teacher.employee.registration');

Route::get('reg/nonteacher/employee/edit/{id}', [EmployeeController::class, 'NonTeacherEmployeeEdit'])->name('non.teacher.employee.registration.edit');

Route::post('reg/nonteacher/employee/update/{id}', [EmployeeController::class, 'NonTeacherEmployeeUpdate'])->name('update.non.teacher.employee.registration');


Route::get('/employee/inactive/{id}',[EmployeeController::class,'inactiveEmployee'])->name('employee.inactive');

Route::get('/employee/active/{id}',[EmployeeController::class,'activeEmployee'])->name('employee.active');



//Teachers Subject 


Route::get('teachers/subjects/view', [UserController::class, 'ViewTeacherSubjects'])->name('teacher.subject.view');



// Employee Leave All Routes 
Route::get('leave/employee/view', [EmployeeController::class, 'LeaveView'])->name('employee.leave.view');

Route::get('leave/employee/add', [EmployeeController::class, 'LeaveAdd'])->name('employee.leave.add');

Route::post('leave/employee/store', [EmployeeController::class, 'LeaveStore'])->name('store.employee.leave');

Route::get('leave/employee/edit/{id}', [EmployeeController::class, 'LeaveEdit'])->name('employee.leave.edit');

Route::post('leave/employee/update/{id}', [EmployeeController::class, 'LeaveUpdate'])->name('update.employee.leave');

Route::get('leave/employee/delete/{id}', [EmployeeController::class, 'LeaveDelete'])->name('employee.leave.delete');


// Employee Attendance All Routes 
Route::get('attendance/employee/view', [SchoolAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');

Route::get('attendance/employee/add', [SchoolAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');

Route::post('attendance/employee/store', [SchoolAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');

Route::get('attendance/employee/edit/{date}', [SchoolAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');


Route::post('attendance/employee/update/{id}', [SchoolAttendanceController::class, 'AttendanceUpdate'])->name('update.employee.attendance');


Route::get('attendance/employee/details/{date}', [SchoolAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');






///Schoolfees Collections routes///

Route::get('student/fee/view', [SchoolFeesController::class, 'StudentFeeView'])->name('student.fee.view');

Route::get('student/fee/add/{id}', [SchoolFeesController::class, 'StudentFeeAdd'])->name('student.fee.add'); 

Route::get('student/schoolfees/getstudents',[SchoolFeesController::class,'GetStudentFee'])->name('get.student.fee');

Route::get('fees/class/wise',[SchoolFeesController::class,'StudentClassWise'])->name('student.fees.class.wise');

Route::get('/class/fees',[SchoolFeesController::class,'StudentClassFees'])->name('student.class.fees');

Route::get('student/fee/getstudent', [SchoolFeesController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent'); 
 
Route::post('student/fee/store/{id}', [SchoolFeesController::class, 'StudentFeeStore'])->name('account.fee.store'); 

Route::get('student/fee/edit/{id}', [SchoolFeesController::class, 'StudentFeeEdit'])->name('student.fees.edit'); 

Route::post('student/fee/update/{id}', [SchoolFeesController::class, 'StudentFeeUpdate'])->name('student.fees.update');


Route::get('pupil/fees/delete/{id}', [SchoolFeesController::class, 'StudentFeesDelete'])->name('student.fees.delete'); 



Route::get('student/fees/filtration/view', [SchoolFeesController::class, 'StudentFeeFiltrationView'])->name('student.fee.filtration.view');

Route::post('student/fees/filter',[SchoolFeesController::class,'StudentFeesFilter'])->name('student.fees.filter');

Route::get('/check-fee-category-amount',[SchoolFeesController::class, 'GetFeeCategoryAmount'])->name('check-fee-category-amount'); 



// Student Fees Tracking All Routes 

Route::get('student/fee/increment/{id}', [SchoolFeesController::class, 'StudentFeeIncrement'])->name('student.fee.increment');

Route::post('student/fees/tracking/store/{id}', [SchoolFeesController::class, 'StudentFeeTrackStore'])->name('update.student.increment.store');

Route::get('student/fees/tracking/details/{id}', [SchoolFeesController::class, 'StudentFeeDetails'])->name('student.fees.details');

Route::get('student/details/{id}', [SchoolFeesController::class, 'StudentFeesDetailsPDF'])->name('student.fees.details.pdf');

Route::get('student/fees/tracking/pdf/{id}', [SchoolFeesController::class, 'StudentFeesTrackPDF'])->name('student.fees.track.pdf');

Route::get('primary/pupil/increment/delete/{id}', [SchoolFeesController::class, 'StudentIncrementDelete'])->name('student.fees.increment.delete'); 

Route::get('payment/fee/tracking/pdf/{id}', [SchoolFeesController::class, 'PaymentFeeTrackPDF'])->name('payment.fee.track.pdf');


Route::get('student/add/fees/{id}', [SchoolFeesController::class, 'StudentAddFees'])->name('student.add.fees'); 

Route::get('get/single/student/fees/details/{id}', [SchoolFeesController::class, 'GeneralStudentFee'])->name('get.student.fee.details'); 

Route::get('student/general/fees/get/{student_id}', [SchoolFeesController::class, 'StudentGeneralFees'])->name('students.general.fees.details');



///schoolfees financial statements


Route::get('students/fees/statement/view', [SchoolFeesController::class, 'SchoolFeesStatementView'])->name('schoolfees.statment.view');

Route::get('students/fees/class/wise', [SchoolFeesController::class, 'SchoolFeesClassWise'])->name('schoolfees.class.wise');

Route::get('students/fees/wise/{id}', [SchoolFeesController::class, 'SchoolFeesWise'])->name('schoolfees.wise');

Route::get('students/fees/statment/report/get/{id}', [SchoolFeesController::class,'SchoolFeesStatementReport'])->name('search-fees-statment');






///SchoolFees Reports ///


Route::get('student/fees/report/view',[SchoolFeesReportController::class,'ViewStudentFeesReports'])->name('student.fees.reports.view');
    
Route::post('student/fees/report/search/by/term',[SchoolFeesReportController::class,'ReportByTerm'])->name('search-student-fees-by-term');

Route::post('student/fees/report/search/by/term/month',[SchoolFeesReportController::class,'ReportByTermMonths'])->name('search-student-fees-by-months');

Route::post('student/fees/report/search/by/year', [SchoolFeesReportController::class,'ReportByFeeYears'])->name('search-student-fees-by-years');






///    SCHOOL CLASSES FEES REPORTS ///
    
Route::post('school/class/report/search/by/term',[SchoolFeesReportController::class,'SchoolClassReportByTerm'])->name('search-school-class-fees-by-term');

Route::post('school/class/report/search/by/term/month',[SchoolFeesReportController::class,'SchoolClassReportByTermMonths'])->name('search-school-class-fees-by-months');

Route::post('school/class/report/search/by/year', [SchoolFeesReportController::class,'SchoolClassReportByFeeYears'])->name('search-school-class-fees-by-years');





///     FEES CATEGORIES REPORTS ///
    
Route::post('fees/category/report/search/by/term',[SchoolFeesReportController::class,'FeesCateReportByTerm'])->name('search-fees-category-fees-by-term');

Route::post('fees/category/report/search/by/term/month',[SchoolFeesReportController::class,'FeesCateReportByTermMonths'])->name('search-fees-category-fees-by-months');

Route::post('fees/category/report/search/by/year', [SchoolFeesReportController::class,'FeesCateReportByFeeYears'])->name('search-fees-category-fees-by-years');






///     FEES CATEGORIES BY CLASS REPORTS ///
    
Route::post('fees/category/class/report/search/by/term',[SchoolFeesReportController::class,'ClassFeesCateReportByTerm'])->name('search-class-fees-category-fees-by-term');

Route::post('fees/category/class/report/search/by/term/month',[SchoolFeesReportController::class,'ClassFeesCateReportByTermMonths'])->name('search-class-fees-category-fees-by-months');

Route::post('fees/category/class/report/search/by/year', [SchoolFeesReportController::class,'ClassFeesCateReportByFeeYears'])->name('search-class-fees-category-fees-by-years');



// Charts Section //
Route::get('/financial-years-charts', [SchoolFeesReportController::class, 'Charts'])->name('charts.view');

Route::get('/financial-year-terms-charts', [SchoolFeesReportController::class, 'CurrentCharts'])->name('current.charts.view');


Route::post('previous/financial/year/charts',[SchoolFeesReportController::class,'financialyear'])->name('financial-year');


Route::post('previous/financial/year/terms/charts',[SchoolFeesReportController::class,'financialyearterms'])->name('financial-year-terms');





///Send Bulk SMS ///

Route::get('students/class/wise',[SchoolFeesReportController::class,'StudentsClassWise'])->name('students.class.wise2');

Route::post('send-sms-message', [ SchoolFeesReportController::class, 'SendSmsMessage' ])->name('send.sms.messages');


Route::post('send-sms-messages-to-parents', [ SchoolFeesReportController::class, 'SendSmsMessage2' ])->name('send.sms.messages2');


Route::post('/send-sms/message', [ SchoolFeesReportController::class, 'SendMessage' ])->name('send.message');

 

Route::get('send/sms/view', [SchoolFeesReportController::class, 'SendSMSView'])->name('send.sms.view');









///Students Attendance Routes////

Route::controller(SchoolAttendanceController::class)->group(function() {

    /// O-Level (S1 & S2) Students Attendance ///
Route::get('attendance/student/view','StudentsAttendanceView')->name('students.attendance.view');

Route::get('attendance/student/add','StudentsAttendanceAdd')->name('student.attendance.add');

Route::post('attendance/student/store','StudentsAttendanceStore')->name('store.students.attendance');

Route::get('attendance/student/details/{date}','StudentAttendanceDetails')->name('student.attendance.details');

Route::get('attendance/student/edit/{id}','StudentAttendanceEdit')->name('student.attendance.edit');

Route::post('attendance/student/update/{id}','StudentAttendanceUpdate')->name('update.student.attendance'); 

Route::get('attendance/getstudent','StudentAttenGet')->name('student.attendance.getstudent');

Route::get('/students/class/attendance', 'StudentClassAttend')->name('student.class.attend');

Route::get('/students/attend/wise', 'StudentsAttend')->name('students.attendance.details.get');


Route::get('/general/attendance/view',[SchoolAttendanceController::class, 'GeneralAttendance'])->name('students.general.attendance.view');



    
});





//Employees Attendance Report Routes 
Route::get('attendance/report/view', [SchoolAttendanceController::class, 'AttenReportView'])->name('attendance.report.view');

Route::get('report/attendance/get', [SchoolAttendanceController::class, 'AttenReportGet'])->name('report.attendance.get');


//General Employees Attendance Report Routes 
Route::get('general/attendance/report/view',[SchoolAttendanceController::class, 'GeneralAttenReportView'])->name('general.attendance.report.view');

Route::get('report/general/attendance/get',[SchoolAttendanceController::class, 'GeneralAttenReportGet'])->name('general.report.attendance.get');


Route::get('report/general/monthly/attendance/get', [SchoolAttendanceController::class, 'GeneralMonthlyAttenReportGet'])->name('general.report.monthly.attendance.get');




//Students Attendance Reports
 
Route::get('students/attendance/report/view', [SchoolAttendanceController::class, 'StudentAttendReportView'])->name('students.attendance.reports.view');

Route::get('students/attendance/report/get', [SchoolAttendanceController::class, 'StudentAttendReportGet'])->name('students.attendance.report.get');


Route::get('/get/teacher/subject', [SchoolAttendanceController::class, 'GetTeacherSubject'])->name('get.teacher.subject');















////Student Exams Marks 


Route::get('teacher/lessons/schedule/view',[UserController::class, 'TeacherLessonScheduleView'])->name('teacher.lessons.schedule.view');
                       
Route::get('teacher/lessons/schedule/details/{user_id}',[UserController::class, 'TeacherLessonSchedule'])->name('teacher.lessons.schedule');
 


Route::get('marks/entry/add', [StudentExamsController::class, 'MarksAdd'])->name('marks.entry.add');

Route::post('marks/entry/store', [StudentExamsController::class, 'MarksStore'])->name('marks.entry.store'); 

Route::get('marks/entry/details', [StudentExamsController::class, 'MarksDetails'])->name('marks.entry.details'); 

Route::get('marks/entry/edit/{id}', [StudentExamsController::class, 'MarksEdit'])->name('marks.entry.edit'); 

Route::get('marks/getstudents/edit', [StudentExamsController::class, 'MarksGetStudents'])->name('student.edit.getstudents');

Route::post('marks/entry/update/{id}', [StudentExamsController::class, 'MarksUpdate'])->name('marks.entry.update');  


Route::get('/getstudent/by/subjects', [StudentExamsController::class, 'GetStudentsBySubject'])->name('getstudents.info');





// Competency Based results O-Level 

Route::get('competency/results/add', [StudentExamsController::class, 'CompetencyResultsAdd'])->name('competency.results.add');

Route::post('competency/results/store', [StudentExamsController::class, 'CompetencyResultsStore'])->name('competency.results.store'); 

Route::get('competency/results/details', [StudentExamsController::class, 'CompetencyResultsDetails'])->name('competency.results.details'); 

Route::get('competency/results/edit/{id}', [StudentExamsController::class, 'CompetencyResultsEdit'])->name('competency.results.edit'); 

Route::get('competency/results/getstudents/edit', [StudentExamsController::class, 'CompetencyResultsGetStudents'])->name('competency.results.student.edit.getstudents');

Route::post('competency/results/update/{id}', [StudentExamsController::class, 'CompetencyResultsUpdate'])->name('competency.results.update');  



Route::get('/get/subject/competency', [StudentExamsController::class, 'GetSubjectCompetency'])->name('get.subject.competency');








/// O-Level Marks Entry for S3 & S4 ///
    
Route::get('marks/olevel/entry/add', [StudentExamsController::class, 'MarksAddOlevel'])->name('marks.olevel.entry.add');

Route::post('marks/olevel/entry/store', [StudentExamsController::class, 'MarksStoreOlevel'])->name('marks.olevel.entry.store'); 

Route::get('marks/olevel/entry/details', [StudentExamsController::class, 'MarksOlevelDetails'])->name('marks.olevel.entry.details'); 

Route::get('marks/olevel/entry/edit/{id}', [StudentExamsController::class, 'MarksEditOlevel'])->name('marks.olevel.entry.edit'); 

Route::get('marks/olevel/getstudents/edit', [StudentExamsController::class, 'MarksEditGetStudentsOlevel'])->name('olevel.student.edit.getstudents');

Route::post('marks/olevel/entry/update/{id}', [StudentExamsController::class, 'MarksUpdateOlevel'])->name('marks.olevel.entry.update'); 

Route::get('student/olevel/marks/getstudents', [StudentExamsController::class, 'GetOlevelStudents'])->name('olevel.student.marks.getstudents');



Route::get('marks/getsubject', [StudentExamsController::class, 'GetSubject'])->name('marks.getsubject');

Route::get('student/marks/getstudents', [StudentExamsController::class, 'GetStudents'])->name('student.marks.getstudents');





/// Marks Management Routes  For A-Level Students


    Route::get('alevel/points/entry/add', [StudentExamsController::class, 'AlevelMarksAdd'])->name('alevel.marks.entry.add');
    
    Route::post('alevel/points/entry/store', [StudentExamsController::class, 'AlevelMarksStore'])->name('alevel.marks.entry.store'); 

    Route::get('alevel/points/details', [StudentExamsController::class, 'PointsAlevelDetails'])->name('points.alevel.entry.details'); 
    
    Route::get('alevel/points/entry/edit/{id}', [StudentExamsController::class, 'AlevelMarksEdit'])->name('alevel.marks.entry.edit'); 
    
    Route::get('alevel/points/getstudents/edit', [StudentExamsController::class, 'AlevelMarksEditGetStudents'])->name('alevel.student.edit.getstudents');
    
    Route::post('alevel/points/entry/update/{id}', [StudentExamsController::class, 'AlevelMarksUpdate'])->name('alevel.marks.entry.update');  
    
    Route::get('alevel/student/points/getstudents', [StudentExamsController::class, 'GetAlevelStudents'])->name('alevel.student.marks.getstudents');



///Assign Students Subjects Section Routes////


Route::get('assign/student/subject/view', [UserController::class, 'ViewAssignStudentToSubject'])->name('assign.student.subject.view');

Route::get('assign/student/subject/add/{id}', [UserController::class, 'AddAssignStudentToSubject'])->name('assign.student.subject.add');

Route::post('assign/student/subject/store/{student_id}', [UserController::class, 'StoreAssignStudentToSubject'])->name('store.assign.student.subject');

Route::get('assign/student/subject/edit/{student_id}', [UserController::class, 'EditAssignStudentToSubject'])->name('assign.student.subject.edit');

Route::post('assign/student/subject/update/{student_id}', [UserController::class, 'UpdateAssignStudentToSubject'])->name('update.assign.student.subject');

Route::get('assign/student/subject/details/{student_id}', [UserController::class, 'DetailsAssignStudentToSubject'])->name('assign.student.subject.details');

Route::get('assign/student/subject/getstudents',[UserController::class,'GetStudents'])->name('get.students.info');

Route::get('/student/class/filter',[UserController::class,'StudentClassFilter'])->name('student.class.filter');





// MarkSheet Generate Routes 
Route::get('marksheet/generate/view', [StudentExamsReportController::class, 'MarkSheetView'])->name('marksheet.generate.view');
    
Route::get('marksheet/generate/get', [StudentExamsReportController::class, 'MarkSheetGet'])->name('report.marksheet.get');

Route::get('marksheet/generate/results/{id}', [StudentExamsReportController::class, 'MarkSheetResults'])->name('students.marksheet.generate'); 
    
Route::get('marksheet/print/get/{student_id}', [StudentExamsReportController::class, 'MarkResultsPrint'])->name('students.results.details.pdf');



 


    
    // O-Level  MarkSheet Generate Routes 
    Route::get('olevel/marksheet/generate/view', [StudentExamsReportController::class, 'OlevelMarkSheetView'])->name('olevel.marksheet.generate.view');
    
    Route::get('olevel/marksheet/generate/get', [StudentExamsReportController::class, 'OlevelMarkSheetGet'])->name('olevel.report.marksheet.get');
    
    Route::get('olevel/marksheet/generate/results/{id}', [StudentExamsReportController::class, 'OlevelMarkSheetResults'])->name('olevel.marksheet.generate'); 
    
    Route::get('olevel/marksheet/print/get/{student_id}', [StudentExamsReportController::class, 'OlevelMarkResultsPrint'])->name('olevel.results.details.pdf');
    

    

    
    // Competency Based MarkSheet Generate Routes 
    Route::get('competency/based/marksheet/generate/view', [StudentExamsReportController::class, 'CompetencyMarkSheetView'])->name('competency.marksheet.generate.view');
    
    Route::get('competency/based/marksheet/generate/get', [StudentExamsReportController::class, 'CompetencyMarkSheetGet'])->name('competency.report.marksheet.get');
    
    Route::get('competency/based/marksheet/generate/results/{id}', [StudentExamsReportController::class, 'CompetencyMarkSheetResults'])->name('competency.marksheet.generate'); 
    
    Route::get('competency/based/marksheet/print/get/{student_id}', [StudentExamsReportController::class, 'CompetencyMarkResultsPrint'])->name('competency.results.details.pdf');
    
    



    
    
    // A-Level  MarkSheet Generate Routes 
    Route::get('alevel/marksheet/generate/view', [StudentExamsReportController::class, 'AlevelMarkSheetView'])->name('alevel.marksheet.generate.view');

    Route::get('alevel/marksheet/generate/get', [StudentExamsReportController::class, 'AlevelMarkSheetGet'])->name('alevel.report.marksheet.get');

    Route::get('alevel/marksheet/generate/results/{id}', [StudentExamsReportController::class, 'AlevelStudentResults'])->name('alevel.student.marksheet.generate'); 
    
    Route::get('alevel/marksheet/print/get/{student_id}', [StudentExamsReportController::class, 'AlevelResultsPrint'])->name('alevel.student.results.details.pdf');
        






//Lessons Schedule Report Routes 
Route::get('lessons/schedule/report/view',[UserController::class, 'LessonsReportView'])->name('lessons.schedule.view');


Route::get('lessons/schedule/teacher/get', [UserController::class, 'LessonsTeacherReportGet'])->name('lessons.schedule.teacher.get');









///Expenses And Employees Salaries Reports///



// Employee Salary Routes
Route::get('account/salary/view', [ExpensesController::class, 'AccountSalaryView'])->name('account.salary.view');

Route::get('account/salary/add', [ExpensesController::class, 'AccountSalaryAdd'])->name('account.salary.add');

Route::get('account/salary/getemployee', [ExpensesController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');

Route::post('account/salary/store', [ExpensesController::class, 'AccountSalaryStore'])->name('account.salary.store');


Route::get('account/salary/edit/{id}', [ExpensesController::class, 'AccountSalaryEdit'])->name('account.salary.edit');

Route::post('account/salary/update/{id}', [ExpensesController::class, 'AccountSalaryUpdate'])->name('account.salary.update');




Route::get('account/salary/details/{id}', [ExpensesController::class, 'AccountSalaryDetails'])->name('account.salary.details');

Route::get('account/salary/picked/{id}', [ExpensesController::class, 'AccountSalaryPicked'])->name('account.salary.picked');


Route::post('account/salary/picked/store/{id}', [ExpensesController::class, 'AccountSalaryPickedStore'])->name('update.account.salary.picked.store');


Route::get('account/salary/tracking/pdf/{id}', [ExpensesController::class, 'AccountSalaryTrackPDF'])->name('account.salary.pdf');


Route::get('account/salary/picked/delete/{id}', [ExpensesController::class, 'SalaryPickedDelete'])->name('account.salary.picked.delete'); 



Route::get('account/salary/picked/tracking/pdf/{id}',[ExpensesController::class, 'SalaryPickedTrackPDF'])->name('account.salary.picked.pdf');






///  Employee`s Salary Reports ///

Route::get('employee/salary/report/view',[ExpensesReportsController::class,'ViewEmployeeSalaryReports'])->name('employee.salary.report.view');

Route::post('employees/salary/report/search/by/month',[ExpensesReportsController::class,'EmployeeSalaryReportByMonth'])->name('search-employees-salary-report-by-month');

Route::post('employees/salary/report/search/by/year',[ExpensesReportsController::class,'EmployeeSalaryReportByYear'])->name('search-employees-salary-report-by-year');

Route::post('salary/report/search/by/year',[ExpensesReportsController::class,'SalaryReportByYear'])->name('search-salary-report-by-year');


 


// Other Cost Rotues 

Route::get('other/cost/view', [ExpensesController::class, 'OtherCostView'])->name('other.cost.view');


Route::get('other/cost/year/wise',[ExpensesController::class,'OtherCostYearWise'])->name('other.costs.year.wise');

Route::get('other/cost/add', [ExpensesController::class, 'OtherCostAdd'])->name('other.cost.add');

Route::post('other/cost/store', [ExpensesController::class, 'OtherCostStore'])->name('store.other.cost');

Route::get('other/cost/edit/{id}', [ExpensesController::class, 'OtherCostEdit'])->name('edit.other.cost');

Route::post('other/cost/update/{id}', [ExpensesController::class, 'OtherCostUpdate'])->name('update.other.cost');


// Other Cost  Tracking All Routes 

Route::get('other/cost/amount/increment/{id}', [ExpensesController::class, 'OtherCostAmountIncrement'])->name('other.cost.increment');

Route::post('other/cost/amount/tracking/store/{id}', [ExpensesController::class, 'OtherCostAmountTrackStore'])->name('update.other.cost.increment.store');

Route::get('other/cost/amount/tracking/details/{id}', [ExpensesController::class, 'OtherCostAmountDetails'])->name('other.cost.details');

Route::get('other/cost/amount/details/{id}', [ExpensesController::class, 'OtherCostAmountDetailsPDF'])->name('other.cost.details.pdf');

Route::get('other/cost/amount/tracking/pdf/{id}', [ExpensesController::class, 'OtherCostAmountTrackPDF'])->name('other.cost.track.pdf');


Route::get('other/cost/amount/increment/delete/{id}', [ExpensesController::class, 'OtherCostAmountIncrementDelete'])->name('other.cost.increment.delete'); 

Route::get('other/cost/payment/tracking/pdf/{id}', [ExpensesController::class, 'PaymentAmountTrackPDF'])->name('payment.amount.track.pdf');







// Other Cost Categories ///

Route::get('view/other/cost/category',[ExpensesController::class,'ViewOtherCostCate'])->name('other.cost.cate.view');

Route::get('add/other/cost/category',[ExpensesController::class,'AddOtherCostCate'])->name('add.other.cost.cate');

Route::post('other/cost/category',[ExpensesController::class,'StoreOtherCostCate'])->name('store.other.cost.cate');

Route::get('other/cost/category/edit/{id}',[ExpensesController::class,'EditOtherCostCate'])->name('edit.other.cost.cate');

Route::post('other/cost/category/update/{id}', [ExpensesController::class,'UpdateOtherCostCate'])->name('update.other.cost.cate');







/// EXPENSES REPORTS ///

Route::get('other/cost/report/view', [ExpensesReportsController::class, 'OtherCostReportView'])->name('other.cost.report.view');

Route::post('other/cost/report/search/by/term/month',[ExpensesReportsController::class,'OtherCostReporReportByTermMonth'])->name('search-other-cost-report-by-term-month');

Route::post('other/cost/report/search/by/term/year',[ExpensesReportsController::class,'OtherCostReporReportByTermYear'])->name('search-other-cost-report-by-term-year');

Route::post('other/cost/report/search/by/year',[ExpensesReportsController::class,'OtherCostReporReportByYear'])->name('search-other-cost-report-by-year');



/// EXPENSES CATEGORIES ///

Route::post('other/cost/cate/report/search/by/term/month',[ExpensesReportsController::class,'OtherCostCateReporReportByTermMonth'])->name('search-other-cost-cate-report-by-term-month');

Route::post('other/cost/cate/report/search/by/term/year',[ExpensesReportsController::class,'OtherCostCateReporReportByTermYear'])->name('search-other-cost-cate-report-by-term-year');

Route::post('other/cost/cate/report/search/by/year',[ExpensesReportsController::class,'OtherCostCateReporReportByYear'])->name('search-other-cost-cate-report-by-year');






Route::controller(PurchasesController::class)->group(function() {
    
    
        
    /// PURCHASES Stock Information Routes  ///
    
    
        
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all'); 
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');

    Route::get('/edit/purchase/information/{id}','EditPurchaseInfo')->name('edit.purchase.information');
        
    Route::post('/update-purchase-information/{id}','UpdatePurchaseInfo')->name('update.purchase.information');

    Route::get('/purchase/information/report/{id}',  'PurchaseInfoReport')->name('purchase.information.report');


    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');

        
        Route::get('view/purchase/items','ViewPurchaseItemList')->name('view.products');
    
        Route::get('add/purchase/items','AddPurchaseItem')->name('create.product');
        
        Route::post('purchase/items/store','StorePurchaseItem')->name('store.product');
    
        Route::get('purchase/items/edit/{id}','EditPurchaseItem')->name('edit.product');
    
        Route::post('purchase/items/update/{id}','UpdatePurchaseItem')->name('update.product');
    


    Route::get('view/item/category','ViewItemCateList')->name('general.item.cate.view');

    Route::get('add/item/category','AddItemCate')->name('add.general.item.cate');
    
    Route::post('general/item/category','StoreItemCate')->name('store.general.item.cate');

    Route::get('item/category/edit/{id}','EditItemCate')->name('edit.general.item.cate');

    Route::post('item/category/update/{id}','UpdateItemCate')->name('update.general.item.cate');

    



    });// Purchases



    
Route::controller(PurchasesReportController::class)->group(function() {
    

///Purchase Reports ///
Route::get('/purchases/reports/view','ViewPurchaseReports')->name('view.purchases.reports');

Route::post('/purchases/report/search/by/term/month','PurchasesReportByTermMonth')->name('search-purchases-report-by-term-month');

Route::post('/purchases/report/search/by/term/year','PurchasesReportByTermYear')->name('search-purchases-report-by-term-year');

Route::post('/purchases/report/search/by/year','PurchasesReportByYear')->name('search-purchases-report-by-year');



/// Purchase Items  ///

Route::post('/purchases/item/report/search/by/term/month','PurchaseItemReportByTermMonth')->name('search-purchases-items-report-by-term-month');

Route::post('/purchases/item/report/search/by/term/year','PurchaseItemReportByTermYear')->name('search-purchases-items-report-by-term-year');

Route::post('/purchases/item/report/search/by/year','PurchaseItemReportByYear')->name('search-purchases-items-report-by-year');

    

    });// Purchases Reports



    
    
Route::controller(IncomeStatementController::class)->group(function() {
    

///Income statement Reports ///
Route::get('/income/statement/reports/view','ViewIncomeStatementReports')->name('income.statement.reports');

Route::post('/income/statement/report/search/by/term','IncomeStatementReportByTerm')->name('search-income-statement-report-by-term-year');

Route::post('/income/statement/report/search/by/year', 'IncomeStatementReportByYears')->name('search-income-statement-report-by-year');

});// Income statement Reports







///School Library///


Route::controller(LibraryController::class)->group(function() {


    Route::get('/stock/view','ViewBookStock')->name('library.bookstock.view');

    Route::get('/stock/add','AddBookStock')->name('add.bookstock');
    
    Route::post('/stock/store','StoreBookStock')->name('store.bookstock');
    
    Route::get('/stock/edit/{id}','EditBookStock')->name('edit.bookstock');
    
    Route::post('/stock/update/{id}','UpdateBookStock')->name('update.bookstock');
    
    Route::get('/bookstock/delete/{id}', 'BookStockDelete')->name('bookstock.delete');
    
    Route::get('/bookstock/pending', 'BookStockPending')->name('bookstock.pending');
    
    Route::get('/bookstock/approve/{id}', 'BookStockApprove')->name('bookstock.approve');
    
    

Route::get('books/view','ViewBookDetails')->name('books.view');

Route::get('/add/new/book','AddBook')->name('add.book');

Route::post('/store/new/book','StoreBook')->name('store.book');

Route::get('/edit/boook/{id}','EditBook')->name('edit.book');

Route::post('/update/book/{id}','UpdateBook')->name('update.book');


Route::get('/active/book/{id}','activeBook')->name('book.active'); 


Route::get('/inactive/book/{id}','inactiveBook'); 


Route::get('/delete/book/{id}','DeleteBook');





    
Route::get('bookissue/getstudents','GetStudents')->name('get.students.view');

Route::get('library/students/classes','StudentClasses')->name('library.student.class.wise');
   
Route::get('bookissue/view','ViewIssuedBooks')->name('library.books-issued.view');

Route::get('bookreturned/view','Return_Books')->name('returned-books');

Route::get('less/books/returned/view','LessBooksReturn')->name('less-returnedbooks');

Route::get('damaged/books/returned/view','DamageBooksReturned')->name('damaged-booksreturned');

Route::get('issued/book/details/{id}', 'IssuedBooksDetails')->name('issued.book.details');


Route::get('non-damaged/books/submitted/view','ViewNonDamagedBooks')->name('nondamaged.books.submitted');

Route::get('non-damaged/book/details/{id}', 'NonDamagedDetails')->name('non-damaged.book.details');



Route::get('less/books/submitted/view','ViewLessBooksSubmitted')->name('less.books.submitted');

Route::get('less/books/submitted/details/{id}', 'LessBooksSubmittedDetails')->name('lessbooks.submitted.details');



Route::get('recovered/books/submitted/view','ViewRecoveredBooksSubmitted')->name('recovered.book.submitted');




// Update Status 
Route::get('issued/returned/{id}', 'IssuedToReturned')->name('issued-returned');

Route::get('returned/lessbooks/{id}', 'ReturnedLessBooks')->name('returned-lessbooks');

Route::get('lessbooks/returned/details/{id}', 'LessBooksReturnedDetails')->name('lessbooks.returned.details');

Route::get('lessbooks/returned/{id}', 'ReturnedlessToReturned')->name('returned-less');

Route::get('books/recovered/returned/{id}', 'RecoveredBooksToReturned')->name('recovered-books-to-returned');
    

Route::get('returned/damagedbooks/{id}', 'ReturnedDamagedBooks')->name('returned-damagedbooks');

Route::get('damagedbooks/returned/details/{id}', 'DamagedBooksReturnedDetails')->name('damagedbooks.returned.details');

Route::get('damagedbooks/returned/{id}', 'ReturnedDamagedToReturned')->name('returned-damaged-to-returned');


Route::get('damagedbooks/{id}', 'DamagedBooksReturnedForm')->name('damagedbooks.returned.form');

Route::post('not-damaged/books/store/{id}', 'NonDamagedQTY')->name('update.non.damagedbooks');




Route::get('bookissue/add/{id}','IssueBook')->name('add.bookissued');

Route::post('bookissue/store/{id}','StoreIssuedBook')->name('store.bookissued');

Route::get('bookissued/edit/{id}','EditBookIssued')->name('edit.issued.book.details');

Route::post('bookissued/update/{id}','UpdateIssuedBook')->name('update.issued.book.details');


Route::get('lessbooks/{id}', 'LessBookReturned')->name('lessbooks.returned.form');

Route::post('returned/less-quantity/store/{id}', 'LessBookQTY')->name('update.quantity.lessbooks');



Route::get('recovered/books/{id}', 'RecoveredBooksForm')->name('recovered.books.form');

Route::post('recovered/books/store/{id}', 'RecoveredBooksTotal')->name('update.quantity.recovered.books');






    
Route::get('book/quantity/decrement/{book_id}', 'BookQtyDecrement')->name('book.quantity.decrement');
    
Route::post('book/quantity/store/{book_id}', 'BookQtyStoreDecrement')->name('update.decrement.bookstock');
    
Route::get('book/quantity/details/{id}', 'BookQtyDetails')->name('book.quantity.details');





    
    });
    
    
    /// Book Authors Routes
    Route::controller(LibraryController::class)->group(function() {
    
    Route::get('authors/view','viewAuthors')->name('authors.view');
       
    Route::post('author/store','StoreAuthor')->name('store.author');
    
    Route::get('author/edit/{id}','EditAuthor')->name('edit.author');
    
    Route::post('author/update/{id}','UpdateAuthor')->name('update.author'); 
    
    });
    
    
    /// Book Category Routes
    Route::controller(LibraryController::class)->group(function() {
    
    Route::get('category/view','ViewCateDetails')->name('category.view');
    
    Route::post('category/store','StoreCate')->name('store.category');
    
    Route::get('category/edit/{id}','EditCate')->name('edit.category');
    
    Route::post('category/update/{id}','UpdateCate')->name('update.category');
    
    
    });
    
    


    Route::controller(LibraryReportsController::class)->group(function() {

    
    
    Route::get('/bookstock/report', 'BookStockReport')->name('bookstock.report');
    
    Route::get('/bookstock/report/pdf', 'BookStockReportPdf')->name('bookstock.report.pdf');
    
    Route::get('/monthly/bookstock/report/pdf', 'MonthlyBookStockPdf')->name('monthly.bookstock.report.pdf');
    
    Route::get('/yearly/bookstock/report/pdf', 'YearlyBookStockPdf')->name('yearly.bookstock.report.pdf');
    
    
    
});
//end of school library






///Start of School Clinic Section///

Route::controller(SickBayController::class)->group(function() {

    
    Route::get('/issued-medications','IssuedMedics')->name('issued.medics.view');
    
    Route::get('/finished-medications','FinishedMedic')->name('finished.medics.view'); 

    Route::get('issued/medication/details/{clinic_no}', 'IssuedMedicDetails')->name('medication.details');

    Route::get('issue/medication/getstudents','GetStudents')->name('get.students.medic');

    Route::get('students/classes','StudentClassMedic')->name('clinic.student.class');

    Route::get('/add/medication/{id}','IssueMedication')->name('add.student.medic');

    Route::post('issued/medication/store/{student_id}','StoreIssuedMedic')->name('store.student.medic');


    // Update Status 
    Route::get('issued/finished/{clinic_no}', 'StartToFinish')->name('start-to-finish');   

    Route::get('/inactive/{id}','inactiveMedic')->name('medicine.inactive');

    Route::get('/active/{id}','activeMedic')->name('medicine.active');

    

    }); 

        
    Route::controller(SickbayController::class)->group(function() {

        Route::get('/medicine/categories','ViewMedicCategory')->name('medicine.category.view');

    Route::post('medicine/category/store','StoreMedicCategory')->name('store.medicine.category');

    Route::get('medicine/category/edit/{id}','EditMedicCategory')->name('edit.medicine.category');

    Route::post('medicine/category/update/{id}','UpdateMedicCategory')->name('update.medicine.category');



    Route::get('view/medical/supplies/list','ViewMedicalSupplyList')->name('medical.supply.list.view');

    Route::get('add/medical/supplies','AddMedicalSupplies')->name('add.medical.supply');
    
    Route::post('medical/supplies/store','StoreMedicalSupplies')->name('store.medical.supply');

    Route::get('medical/supplies/edit/{id}','EditMedicalSupplies')->name('edit.medical.supply');

    Route::post('medical/supplies/update/{id}','UpdateMedicalSupplies')->name('update.medical.supply');


    Route::get('medical/supplies/inactive/{id}','inactiveMedicalSupplies')->name('medical.supply.inactive');

    Route::get('medical/supplies/active/{id}','activeMedicalSupplies')->name('medical.supply.active');



    });



///Medicine Stock and Purchases
    Route::controller(SickBayController::class)->group(function() {
     
       
      
        Route::get('view/medicines/list','ViewMedicine')->name('medicine.view');
        Route::get('add/medicine','AddMedicine')->name('add.medicine');
        
        Route::post('medicine/store','StoreMedicine')->name('store.medicine');
    
        Route::get('medicine/edit/{id}','EditMedicine')->name('edit.medicine');
    
        Route::post('medicine/update/{id}','UpdateMedicine')->name('update.medicine');
    
         
        });




///Medicine Stock and Purchases
Route::controller(SickBayReportsController::class)->group(function() {

    ///Medicine purchase///

    Route::get('view/medicines/stock','ViewMedicineStock')->name('medicine.stock.view');

                
    Route::get('add/purchased/medications','AddMedicineStock')->name('add.medicine.stock');
    

    Route::post('medicine/stock/store','StoreSickBayStock')->name('store.medicine.stock');

    Route::get('medicine/stock/edit/{id}','EditSickBayStock')->name('edit.medicine.stock');

    Route::post('medicine/stock/update/{id}','UpdateSickBayStock')->name('update.medicine.stock');


    Route::get('/purchased/medications','MedicPurchase')->name('medicine.purchase.view');


    

    /// Medical Supplies Routes ///
    

    Route::get('view/medical/supplies/stock','ViewMedicalSuppliesStock')->name('medical.supplies.stock.view');

    
    Route::get('add/purchased/medical/supplies','AddMedicalSuppliesStock')->name('add.medical.supplies.stock');

    Route::post('medical/supplies/stock/store','StoreMedicalSuppliesStock')->name('store.medical.supplies.stock');

    Route::get('medical/supplies/stock/edit/{id}','EditMedicalSuppliesStock')->name('edit.medical.supplies.stock');

    Route::post('medical/supplies/stock/update/{id}','UpdateMedicalSuppliesStock')->name('update.medical.supplies.stock');



    

    ///Purchased Reports//

    
    Route::get('medicines/purchased/reports/view','ViewPurchasedMedicineReports')->name('medicines.purchased.reports.view');

    Route::get('medicines/purchased/search/by/date','PurchasedMedicineReportByDate')->name('search-medicines-purchased-by-date');
    
    Route::get('medicines/purchases/search/by/monthly','PurchasedMedicineReportByMonthly')->name('search-medicines-purchased-by-monthly');
    
    Route::get('medicines/purchases/search/by/year', 'PurchasedMedicineReportByYears')->name('search-medicines-purchased-by-year');



    Route::get('medical/suppies/purchased/reports/view','ViewPurchasedMedicalSuppliesReports')->name('medical.suppies.purchased.reports.view');

    
    Route::get('medical/suppies/purchased/search/by/date','PurchasedMedicalSuppliesReportByDate')->name('search-medical-supplies-by-date');
    
    Route::get('medical/suppies/purchased/search/by/month','PurchasedMedicalSuppliesReportByMonths')->name('search-medical-supplies-by-month');
    
    Route::get('medical/suppies/purchased/search/by/year', 'PurchasedMedicalSuppliesReportByYears')->name('search-medical-supplies-by-year');

         
});












    });// end of  middleware

});





});// end of prevent-back-history middleware
