<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\students;
use App\Models\employee_attendance;
use App\Models\student_attendance;
use App\Models\AssignStudentSubject;
use App\Models\assign_teacher_subject;
use App\Models\class_sessions;
use App\Models\school_subjects;
use Illuminate\Support\Facades\Auth;
use DateTime;

class SchoolAttendanceController extends Controller
{



    
    public function AttendanceView(){
        $data['allData'] = employee_attendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();

    	return view('admin.pages.employee.employee_attendance.employee_attendance_view',$data);
    }


    public function AttendanceAdd(){
    	$data['employees'] = User::where('user_type',1)->get();
    	return view('admin.pages.employee.employee_attendance.employee_attendance_add',$data);

    }
 

    public function AttendanceStore(Request $request){


 
		$date = Carbon::parse($request->date)->format('d F Y');

    	$check = employee_attendance::where('date', $date)->first();

     
		if($check == null){

    	$countemployee = count($request->user_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new employee_attendance();
			$attend->date = Carbon::now()->format('l d F Y');
			$attend->month = Carbon::now()->format('F Y');
			$attend->year = Carbon::now()->format('Y');
    		$attend->user_id = $request->user_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee`s Attendace Info Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.attendance.view')->with($notification);

	}
		else{


			$notification = array(
			  'message' => 'ATTENDANCE RECORD ALREADY EXISTS!!!',
			  'alert-type' => 'error'
			);
		  
			return redirect()->back()->with($notification);
		  
		  }
	


    } // end Method



    public function AttendanceEdit($id){
    	$data['editData'] = employee_attendance::where('id',$id)->first();
    	$data['employees'] = User::where('user_type',1)->get();
    	return view('admin.pages.employee.employee_attendance.employee_attendance_edit',$data);
    }



	public function AttendanceUpdate(Request $request,$id){

	
		
		employee_attendance::findOrFail($id)->update([
			'attend_status' =>$request->attend_status,
			
		  ]);
		  
		  $notification = array(
		  'message' => 'Employee`s Attendace Status Update Successfully',
		  'alert-type' => 'success'
		  );
		  
		  return redirect()->back()->with($notification);
	

	
    } // end Method


    public function AttendanceDetails($date){
    	$data['details'] = employee_attendance::where('date',$date)->get();
    	return view('admin.pages.employee.employee_attendance.employee_attendance_details',$data);

    }



















	/// Students Attendance Details Section /// 





public function StudentsAttendanceView(){

	$data['sessions'] = Class_Sessions::all();
	
	$data['subjects'] = assign_teacher_subject::with('subject')->where('teacher_id',Auth::id())->get();
	
	return view('admin.pages.student.student_attendance.student_attendance_view',$data);
	
	}
	
	
	
	
	public function StudentsAttend(Request $request){
	
	  $class = $request->class;
	  $term = $request->term;
	  $session_id = $request->session_id;
	  $subject_id = $request->subject_id;
	
	  $date = new DateTime($request->date);
	  $formatDate = $date->format('d F Y');
	
	
	  if ($class !='') {
		$where[] = ['class','like',$class.'%'];
	  }
	
	  if ($term !='') {
		$where[] = ['term','like',$term.'%'];
	  }
	
	  
	  if ($session_id !='') {
		$where[] = ['session_id','like',$session_id.'%'];
	  }
	
	
	  if ($subject_id !='') {
		$where[] = ['subject_id','like',$subject_id.'%'];
	  }
	
	
	
	if ($formatDate !='') {
	$where[] = ['date','like',$formatDate.'%'];
	}
	
	   
	
	  $getStudent = Student_Attendance::with(['student'])->where('class',$request->class)->where('term',$request->term)->where('session_id',$request->session_id)->where('subject_id',$request->subject_id)->where('date',$formatDate)->get();
	
	  $html['thsource']  = '<th>SL</th>';
	  $html['thsource'] .= '<th>ID No</th>';
	  $html['thsource'] .= '<th>Name</th>';
	  $html['thsource'] .= '<th>Section</th>';
	  $html['thsource'] .= '<th>Attendance</th>';
	  $html['thsource'] .= '<th>Action</th>';
	
	
	  foreach ($getStudent as $key => $v) {
		$color = 'info';
		$color1 = 'success';
		$presnt = 'Present';
	
		
		$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
	
		$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'<input type="hidden" name="student_id[]" value="'.$v->student_id.'">'.'<input type="hidden" name="id_no[]" value="'.$v['student']['id_no'].'">'.'</td>';
	
		$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
		$html[$key]['tdsource'] .= '<td>'.$v['student']['day_boarding'].'</td>';
	
		$html[$key]['tdsource'] .='<td>';
		$html[$key]['tdsource'] .= '<b>'.$v->attend_status. '</b>';
		$html[$key]['tdsource'] . '</td>';
	
		$html[$key]['tdsource'] .='<td>';
		$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Edit" href="'.route("student.attendance.edit",$v->id).'"> <i class="fa fa-edit"></i></a>';
		$html[$key]['tdsource'] .= '</td>';
	
	  }  
	   return response()->json(@$html);
	
	} 

	
	
	
	public function StudentsAttendanceAdd(){
	
	$data['sessions'] = class_sessions::all();
	
	$data['subjects'] = assign_teacher_subject::with('subject')->where('teacher_id',Auth::id())->get();
	
	
	return view('admin.pages.student.student_attendance.student_attendance_add',$data);
	
	}
	 
	
	public function StudentClassAttend(Request $request){
	
	
		$classes = $request->class;
		$subject_id = $request->subject_id;
		$allData = AssignStudentSubject::with(['student'])->where('class',$classes)->where('subject_id',$subject_id)->get();
	  
		return response()->json($allData);
	
	
	} 
	
	
	
	
	public function StudentsAttendanceStore(Request $request){
	
		$class = $request->class;
		$term = $request->term;
		$session_id = $request->session_id;
		$subject_id = $request->subject_id;
		$date = Carbon::parse($request->month)->format('d F Y');

	
	  $check = Student_Attendance::where('class',$class)->where('term',$term)->where('session_id',$session_id)->where('subject_id',$subject_id)->where('date', $date)->first();
	
	if($check == null){
	
	  $countstudent = count($request->student_id);
	  for ($i=0; $i <$countstudent; $i++) { 
		$attend = new Student_Attendance();
	
		$attend->class = $request->class;
		$attend->term = $request->term;
		$attend->session_id = $request->session_id;
		$attend->subject_id = $request->subject_id;
		$attend->teacher_id = Auth::id();
		$attend->student_id = $request->student_id[$i];
		$attend->date = Carbon::now()->format('d F Y');
		$attend->attend_status = $request->attend_status[$i]; 
		$attend->save();
	  } // end For Loop
	  
	  
	  $notification = array(
	  'message' => 'Students` Attendace Info Added Successfully',
	  'alert-type' => 'success'
	  );
	  
	  return redirect()->route('students.attendance.view')->with($notification);
	
	
	
	}
	
	else{
	
	  $notification = array(
		'message' => 'ATTENDANCE RECORD ALREADY EXISTS!!!',
		'alert-type' => 'error'
	  );
	
	  return redirect()->back()->with($notification);
	   }
	
	
	 
	
	 
	
	
	
	
	} // end Method
	
	 
	
	
	
	public function StudentsAttendanceInfo($date){
	
	$data['details'] = Student_Attendance::where('date',$date)->get();
	return view('admin.pages.student.student_attendance.student_attendance_details',$data);
	
	}
	
	 

	
	
	public function StudentAttendanceEdit($id){
	
	$data['sessions'] = Class_Sessions::all();
	$data['subjects'] = school_subjects::all();
	
	
	$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
	
	
	$data['editData'] = Student_Attendance::with(['student'])->where('id',$id)->first();
	return view('admin.pages.student.student_attendance.student_attendance_edit',$data);
	
	}
	
	
	
	public function StudentAttendanceUpdate(Request $request,$id){
	
	  Student_Attendance::findOrFail($id)->update([
		'term' =>$request->term,
		'session_id' =>$request->session_id,
		'subject_id' =>$request->subject_id,
		'attend_status' =>$request->attend_status,
		
	  ]);
	  
	  $notification = array(
	  'message' => 'Student`s` Attendace Status  Update Successfully',
	  'alert-type' => 'success'
	  );
	  
	  return redirect()->back()->with($notification);
	  
	  
	  }
	





	  
  public function GeneralAttendance(){


    $data['subjects'] = School_Subjects::all();

    $data['allData'] = Student_Attendance::all();

      return view('admin.pages.student.student_attendance.students_attendance_general',$data);

    }



  
public function GeneralAttendanceGet(Request $request){

$class = $request->class;
$term= $request->term;
$subject_id = $request->subject_id;

$data['allData'] = Student_Attendance::with(['student'])->where('class',$class)->where('term',$term)->where('subject_id',$subject_id)->get();

return view('admin.pages.student.student_attendance.students_attendance_general',$data);


} 












public function AttenReportView(){
	$data['employees'] = User::where('user_type',1)->get();
	return view('admin.pages.report.attend_report.attend_report_view',$data);
}


public function AttenReportGet(Request $request){
	 
	$employee_id = $request->user_id;
	if ($employee_id !='') {
		$where[] = ['user_id','like',$employee_id];
	  }

	  $date = Carbon::parse($request->month)->format('F Y');	
	  if ($date !='') {
		$where[] = ['month','like',$date.'%'];
		}



$singleAttendance = employee_attendance::where($where)->first();

if ($singleAttendance == true) {

	$allData = employee_attendance::with(['user'])->where($where)->get();

	$presents = employee_attendance::with(['user'])->where($where)->where('attend_status','Present')->get()->count();

	$absents = employee_attendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();

	$leaves = employee_attendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();

	$months = Carbon::parse($request->month)->format('M Y');	


return view('admin.pages.report.attend_report.attend_report_pdf',compact('allData','presents','absents','leaves','months'));
	

}else{
	
	$notification = array(
		'message' => 'SORRY, NO MATCH !!!',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);
}


} // end Method 














public function GeneralAttenReportView(){
	
	return view('admin.pages.report.attend_report.general_attend_report_view');
}


public function GeneralAttenReportGet(Request $request){


	$date = Carbon::parse($request->date)->format('l d F Y');	
	if ($date !='') {
	  $where[] = ['date','like',$date.'%'];
	  }


$singleAttendance = employee_attendance::where($where)->first();

if ($singleAttendance == true) {

	$allData = employee_attendance::with(['user'])->where($where)->get();
	$months = Carbon::parse($request->month)->format('F Y');
	$date = Carbon::parse($request->date)->format('l d F Y');		

return view('admin.pages.report.attend_report.general_attend_report_pdf',compact('allData','months','date'));
	


}else{
	
	$notification = array(
		'message' => 'SORRY, NO MATCH !!!',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);
}


} // end Method 






public function GeneralMonthlyAttenReportGet(Request $request){


	$month = Carbon::parse($request->month)->format('F Y');
	
	  $month = Carbon::parse($request->month)->format('F Y');	
	  if ($month !='') {
		$where[] = ['month','like',$month.'%'];
		}



$singleAttendance = employee_attendance::where($where)->first();

if ($singleAttendance == true) {

	$allData = employee_attendance::with(['user'])->where($where)->get();

	$months = Carbon::parse($request->month)->format('F Y');	

return view('admin.pages.report.attend_report.general_attend_month_report_pdf',compact('allData','months'));


}else{
	
	$notification = array(
		'message' => 'SORRY, NO MATCH !!!',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);
}


} // end Method 










public function StudentAttendReportView(){

	$data['sessions'] = Class_Sessions::all();
	$data['users'] = User::where('user_type',1)->get();
	
	$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
	
	return view('admin.pages.report.student_attend.view_reports', $data);

}




public function StudentAttendReportGet(Request $request){


$class= $request->class;
$term = $request->term;
$session_id = $request->session_id;
$subject_id = $request->subject_id;

$teacher_id = $request->teacher_id;

$date = new DateTime($request->date);
$formatDate = $date->format('d F Y');
  
$singleStudent = Student_Attendance::where('class',$class)->where('term',$term)->where('session_id',$session_id)->where('subject_id',$subject_id)->where('teacher_id',$teacher_id)->where('date',$formatDate)->first();
if ($singleStudent == true) {


$allData = Student_Attendance::with(['student'])->where('class',$class)->where('term',$term)->where('session_id',$session_id)->where('teacher_id',$teacher_id)->where('subject_id',$subject_id)->where('date',$formatDate)->get();


return view('admin.pages.report.student_attend.show_report',compact('allData'));



}else{

$notification = array(
	'message' => 'NO MATCH FOR STUDENTS ATTENDANCE RESULTS!!!',
	'alert-type' => 'error'
);

return redirect()->back()->with($notification);
}


} // end mehtod 






				    
public function GetTeacherSubject(Request $request){ 

	$teacher_id = $request->teacher_id;
	$allsubjects = assign_teacher_subject::with(['subject'])->select('subject_id')->groupBy('subject_id')->where('teacher_id',$teacher_id)->get();
	return response()->json($allsubjects);


}








}
