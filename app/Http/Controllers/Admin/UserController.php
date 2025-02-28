<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\lessons;
use App\Models\lessonstable;
use App\Models\school_subjects;
use App\Models\assign_teacher_subject;
use App\Services\CalenderService;
use Illuminate\Support\Facades\Auth;
use App\Models\students;
use App\Models\AssignStudentSubject;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    



    public function AllSystemUsers(){

		
    	$adminuser = User::all();
    	return view('admin.pages.role.admin_role_all',compact('adminuser'));

    } // end method 





    
		public function ViewSubjectLessons(){

			$data['allData'] = lessons::select('lesson_id','term','day','class')->groupBy('lesson_id','term','day','class')->get();
			
			return view('admin.pages.setup.schedules.view_subject_lesson',$data);
	 
		}

	
	
		public function SubjectLessonsAdd(){

			$data['subjects'] = School_Subjects::all();
			$data['teachers'] = User::where('status','active')->where('user_type',1)->get();
			return view('admin.pages.setup.schedules.add_subject_lesson',$data);
		}
	
		public function SubjectLessonsStore(Request $request){

			$rand = mt_rand(10,500);
			$lesson_id = $rand;

	
			$Count = count($request->subject_id);
			if ($Count !=NULL) {
				for ($i=0; $i <$Count ; $i++) { 
					$data = new lessons();
					$data->lesson_id = $lesson_id;
					$data->term = $request->term;
					$data->day = $request->day;
					$data->class = $request->class;
					$data->start_time = $request->start_time[$i];
                    $data->end_time = $request->end_time[$i];
					$data->subject_id = $request->subject_id[$i];
					$data->user_id = $request->user_id[$i];
					$data->save();					

				} // End For Loop
			}// End If Condition

	
				$notification = array(
					'message' => ' Lessons Timetable Added Successfully',
					'alert-type' => 'success'
				);
	
			return redirect()->route('lessons.view')->with($notification);
	
			}
	
	
			public function SubjectLessonsEdit($lesson_id){

                $data['subjects'] = School_Subjects::all();
				$data['teachers'] = User::where('status','active')->where('user_type',1)->get();
				$data['editData'] = lessons::where('lesson_id',$lesson_id)->orderBy('id','asc')->get();

				return view('admin.pages.setup.schedules.edit_subject_lesson',$data);
			}
	
	
	
			public function SubjectLessonsUpdate(Request $request,$lesson_id){
	
				if ($request->subject_id == NULL) {
         
					$notification = array(
						'message' => 'Sorry You do not Select Subject',
						'alert-type' => 'error'
					);
			
					return redirect()->route('lessons.edit',$lesson_id)->with($notification);
						 
					}else{

						$rands = mt_rand(10,500);
						$new_lesson_id = $rands;

				$countClass = count($request->subject_id);
						for ($i=0; $i <$countClass ; $i++) { 
							$data = new lessons();
							$data->lesson_id = $new_lesson_id;
							$data->term = $request->term;
							$data->day = $request->day;
							$data->class = $request->class;
							$data->start_time = $request->start_time[$i];
							$data->end_time = $request->end_time[$i];
							$data->subject_id = $request->subject_id[$i];
							$data->user_id = $request->user_id[$i];
							$data->save();
			
						} // End For Loop	
						
						lessons::where('lesson_id',$lesson_id)->delete(); 
			
					}// end Else
			
				   $notification = array(
						'message' => 'Lessons Timetable Updated Successfully',
						'alert-type' => 'success'
					);
			
	
			return redirect()->route('lessons.view')->with($notification);
		}
	


		  
  
		public function DetailsSubjectLessons($lesson_id){
			$data['detailsData'] = lessons::where('lesson_id',$lesson_id)->orderBy('id','asc')->get();
		 
			return view('admin.pages.setup.schedules.details_subject_lessons',$data);
		 
		 
			  }
		 

			  
		  
  
		public function DetailsLessonSchedule(CalenderService $calendarService ,$class){
			$detailsData = lessons::where('class',$class)->get();
			$weekDays     = lessons::WEEK_DAYS;
			$calendarData = $calendarService->generateCalendarData($weekDays);
		 
			return view('admin.pages.setup.schedules.show_lessons_timetable',compact('weekDays', 'calendarData','detailsData'));
		 
		 
			  }
		 




			  

		public function TeacherLessonScheduleView(){


			$data['allData'] = lessons::select('term')->groupBy('term')->where('user_id',Auth::id())->get();
			
			return view('admin.pages.setup.schedules.view_teacher_lesson',$data);
	 
		}

			  
    public function TeacherLessonSchedule(CalenderService $calendarService, $user_id)
    {

		$detailsData = lessons::where('user_id',$user_id)->get();

		$weekDays     = lessons::WEEK_DAYS;
		$calendarData = $calendarService->generateCalendarData($weekDays);

        return view('admin.pages.setup.schedules.teacher_lessons_timetable',compact('weekDays', 'calendarData','detailsData'));
        
    }


	
		 public function SubjectLessonsDelete($lesson_id){
	
			$data['detailsData'] = lessonstable::where('lesson_id',$lesson_id)->orderBy('session_id','asc')->get();
  
			return view('admin.pages.setup.subject_lessons.details_subject_lessons',$data);
	

	
			}




			
				    
public function GetTeachers(Request $request){ 

	$teacher_id = $request->user_id;
	$allsubjects = assign_teacher_subject::with(['subject'])->select('subject_id')->groupBy('subject_id')->where('teacher_id',$teacher_id)->get();
	return response()->json($allsubjects);


}



			//teachers subjects//

			
			public function ViewTeacherSubjects(){

		
				$subjects = assign_teacher_subject::orderBy('id','asc')->get();
				return view('admin.pages.employee.employee_reg.teacher_subjects_view',compact('subjects'));
		
			} // end method 








			///Assign Students Subjects

			


///A -Level Students Section ///

public function GetStudents(){


	$data['allData'] =students::all();
	return view('admin.pages.setup.assign_studentsubject.getstudents',$data);

}

public function StudentClassFilter(Request $request){


	$class = $request->class;

	 
	$data['allData'] = students::where('class',$class)->get();
	return view('admin.pages.setup.assign_studentsubject.getstudents',$data);

} 



   public function ViewAssignStudentToSubject(){
	  $data['allData'] = AssignStudentSubject::select('student_id','class')->groupBy('student_id','class')->get();
	  return view('admin.pages.setup.assign_studentsubject.view_assign_student_subject',$data);
  }

  public function AddAssignStudentToSubject($id){

	$data['subjects'] = school_subjects::all();
	$data['allData'] = students::where('id',$id)->first();
	return view('admin.pages.setup.assign_studentsubject.add_assign_student_subject',$data);
}


public function StoreAssignStudentToSubject(Request $request,$id){
	DB::transaction(function() use($request,$id){
	$subjectCount = count($request->subject_id);
	if ($subjectCount !=NULL) {
		for ($i=0; $i <$subjectCount ; $i++) { 
			$assign_student_subject = new AssignStudentSubject();
			$assign_student_subject->student_id = $id;
			$assign_student_subject->class = $request->class;
			$assign_student_subject->subject_id = $request->subject_id[$i];
			$assign_student_subject->save();

		} // End For Loop
	}// End If Condition


});

	$notification = array(
		'message' => 'Subjects Assigned To Student Successfully',
		'alert-type' => 'success'
	);

	return redirect()->route('assign.student.subject.view')->with($notification);

}  // End Method 



public function EditAssignStudentToSubject($student_id){
	$data['editData'] = AssignStudentSubject::where('student_id',$student_id)->orderBy('subject_id','asc')->get();
	$data['subjects'] = school_subjects::all();

return view('admin.pages.setup.assign_studentsubject.edit_assign_student_subject',$data);

}




public function UpdateAssignStudentToSubject(Request $request,$student_id){
if ($request->subject_id== NULL) {

	$notification = array(
		'message' => 'Sorry You do not select any Subject',
		'alert-type' => 'error'
	);

	return redirect()->route('assign.student.subject.edit',$student_id)->with($notification);
		 
	}else{
		 
$countClass = count($request->subject_id);
AssignStudentSubject::where('student_id',$student_id)->delete(); 
		for ($i=0; $i <$countClass ; $i++) { 
			$assign_student_subject = new AssignStudentSubject();
				$assign_student_subject->student_id = $student_id;
				$assign_student_subject->class = $request->class;
				$assign_student_subject->subject_id = $request->subject_id[$i];
				$assign_student_subject->save();

		} // End For Loop	  

	}// end Else

$notification = array(
	'message' => 'Student Subject Details Updated Successfully',
	'alert-type' => 'success'
);

return redirect()->route('assign.student.subject.view')->with($notification);
} // end Method 




public function DetailsAssignStudentToSubject($student_id){
$data['detailsData'] = AssignStudentSubject::where('student_id',$student_id)->orderBy('subject_id','asc')->get();

return view('admin.pages.setup.assign_studentsubject.details_assign_student_subject',$data);


}






///Lessons Schedules Reports///


public function LessonsReportView(){

	$teachers = User::where('status','active')->where('user_type', 1)->get();
	return view('admin.pages.setup.subject_lessons.view_reports',compact('teachers'));

}





public function LessonsTeacherReportGet(Request $request){


$user_id = $request->user_id;
if ($user_id !='') {
	$where[] = ['user_id','like',$user_id];
  }


  
$term = $request->term;
if ($term !='') {
	$where[] = ['term','like',$term];
  }


  $singleAttendance = lessons::where($where)->first();

  if ($singleAttendance == true) {

	  $allData = lessons::with('user')->where($where)->select('user_id','term','day','class')->groupBy('user_id','term','day','class')->orderBy('id','asc')->get();
	  

	  $lessons = lessons::with('user')->where($where)->where('user_id', $user_id)->get()->count();


	  return view('admin.pages.setup.subject_lessons.show_year_report',compact('allData','lessons'));
	

	}else{
		
		$notification = array(
			'message' => 'SORRY, NO MATCH !!!',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
	}



} // end mehtod 






}
