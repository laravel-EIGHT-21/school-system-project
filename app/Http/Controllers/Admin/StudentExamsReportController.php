<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\school_subjects;
use App\Models\subject_competency;
use App\Models\AlevelStudentPoints;
use App\Models\OlevelStudentsMarks;
use App\Models\competency_marks;
use App\Models\primary_marks;
use App\Models\students;
use App\Models\score_ranges;
use App\Models\OlevelGrades;
use App\Models\AlevelGrades;
use App\Models\points_grades;

class StudentExamsReportController extends Controller
{






public function MarkSheetView(){

$data['allData'] = students::where('status', 1)->get();

return view('admin.pages.report.marksheet.marksheet_view',$data);

}



public function MarkSheetGet(Request $request){

$class = $request->class;

$data['allData'] = students::where('class',$class)->get();
return view('admin.pages.report.marksheet.marksheet_view',$data);


} // end Method 



public function MarkSheetResults($id){

$data['allData'] = students::where('id',$id)->first();

return view('admin.pages.report.marksheet.marksheet_results_get',$data);

}




public function MarkResultsPrint(Request $request, $student_id)
{


$year = $request->year;
$class = $request->class;
$term = $request->term;
$exam_type = $request->exam_type;


$singleStudent = primary_marks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->first();
if ($singleStudent == true) {

$allMarks1 = primary_marks::with(['school_subject'])->where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->get();

$allGrades = OlevelGrades::all();

return view('admin.pages.report.marksheet.marksheet_pdf',compact('allMarks1','allGrades'));


}else{

$notification = array(
'message' => 'NO MATCH FOR STUDENT RESULTS!!!',
'alert-type' => 'error'
);

return redirect()->back()->with($notification);
}




}














/// O-Level Student Marks Sheet Section ///

public function OlevelMarkSheetView(){


$data['allData'] = students::where('status', 1)->get();
return view('admin.pages.report.marksheet.olevel_marksheet_view',$data);

}


public function OlevelMarkSheetGet(Request $request){


$class = $request->class;

$data['allData'] = students::where('class',$class)->get();
return view('admin.pages.report.marksheet.olevel_marksheet_view',$data);



} // end Method 





public function OlevelMarkSheetResults($id){

$data['allData'] = students::where('id',$id)->first();

return view('admin.pages.report.marksheet.olevel_marksheet_results_get',$data);

}




public function OlevelMarkResultsPrint(Request $request, $student_id)
{


$year = $request->year;
$class = $request->class;
$term = $request->term;
$exam_type = $request->exam_type;

$singleStudent = OlevelStudentsMarks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->first();
if ($singleStudent == true) {

$allMarks2 = OlevelStudentsMarks::with(['student_subject'])->where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->get();

$allGrades = OlevelGrades::all();

return view('admin.pages.report.marksheet.olevel_marksheet_pdf',compact('allMarks2','allGrades'));



}else{

$notification = array(
'message' => 'NO MATCH FOR STUDENT RESULTS!!!',
'alert-type' => 'error'
);

return redirect()->back()->with($notification);
}




}














/// Competency Results Marksheets




public function CompetencyMarkSheetView(){


$data['allData'] = students::where('status', 1)->get();
return view('admin.pages.report.marksheet.competency_marksheet_view',$data);

}


public function CompetencyMarkSheetGet(Request $request){


$class = $request->class;

$data['allData'] = students::where('status', 1)->where('class',$class)->get();
return view('admin.pages.report.marksheet.competency_marksheet_view',$data);


} // end Method 



public function CompetencyMarkSheetResults($id){


$data['allData'] = Students::where('id',$id)->first();

return view('admin.pages.report.marksheet.competency_marksheet_results_get',$data);

}




public function CompetencyMarkResultsPrint(Request $request, $student_id)
{


$year = $request->year;
$class = $request->class; 
$term = $request->term;
$exam_type = $request->exam_type;


$singleStudent = competency_marks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->first();
if ($singleStudent == true) {

$allMarks3 = competency_marks::with(['school_subject'])->where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->get();

$allGrades3 = score_ranges::all();

return view('admin.pages.report.marksheet.competency_marksheet_marks',compact('allMarks3','allGrades3'));


}else{

$notification = array(
'message' => 'NO MATCH FOR STUDENT RESULTS!!!',
'alert-type' => 'error'
);

return redirect()->back()->with($notification);
}




}












///A-LEVEL MARKSHEET SECTION///


public function AlevelMarkSheetView(){

	$data['allData'] = Students::where('status', 1)->get();

	  return view('admin.pages.report.marksheet.alevelpoints_marksheet_view',$data);

}
 



public function AlevelMarkSheetGet(Request $request){


	$class = $request->class;
	
	$data['allData'] = Students::where('status', 1)->where('class',$class)->get();
	return view('admin.pages.report.marksheet.alevelpoints_marksheet_view',$data);




} // end Method 





public function AlevelStudentResults($id){

	$data['allData'] = students::where('id',$id)->first();

	return view('admin.pages.report.marksheet.alevelpoints_marksheet_get',$data);

}




public function AlevelResultsPrint(Request $request, $student_id)
{

	$year = $request->year;
	$class = $request->class;
	$term = $request->term;
	$exam_type = $request->exam_type;


$singleStudent = AlevelStudentPoints::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->first();
if ($singleStudent == true) {

$allPoints4 = AlevelStudentPoints::with(['school_subject','student'])->where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('student_id',$student_id)->get();


return view('admin.pages.report.marksheet.alevelpoints_marksheet_pdf',compact('allPoints4'));


}else{

	$notification = array(
		'message' => 'STUDENT RESULTS DON`T EXIST YET!!!',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);
   }




}







}
