<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Models\students;
use App\Models\admissions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    


    

     public function StudentRegView(){

        $allData = students::latest()->get();
    
    	return view('admin.pages.student.student_reg.student_view',compact('allData'));
 
    } 





    
    public function StudentClassWise(Request $request){
    	


    	$class = $request->class;
    	 
    	$allData = Students::where('class',$class)->get();

		  	return view('admin.pages.student.student_reg.student_view',compact('allData'));

    } 






    
    public function StudentRegStore(Request $request){

		$name = $request->name;
    	$gender = $request->gender;
		$day_boarding = $request->day_boarding;
        $class = $request->class;
        $term = $request->term;
        $student_level = $request->student_level;
	
	$check = Students::where('name',$name)->where('gender', $gender)->where('class', $class)->where('term',$term)->where('day_boarding', $day_boarding)->where('student_level', $student_level)->first();

	if($check == null){



    	DB::transaction(function() use($request){


		$startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
         $students = Students::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
        $count = 'IDNO-' .count($students) + 1;

    	$student = new Students();
    	$student->id_no = Carbon::now()->toDateString() . '-' . $count;
    	$student->name = $request->name;
    	$student->fname = $request->fname;
    	$student->mname = $request->mname;
    	$student->mobile = $request->mobile;
        $student->mobile2 = $request->mobile2;
    	$student->gender = $request->gender;
    	$student->class = $request->class;
        $student->term = $request->term;
		$student->day_boarding = $request->day_boarding;
		$student->student_level = $request->student_level;
 	    $student->save();


		 

    	});


    	$notification = array(
    		'message' => 'Student Registration was Successful',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);


	}


	else{
	
		$notification = array(
		  'message' => 'STUDENT`S RECORD ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }
	



    } // End Method 


 
    public function StudentRegEdit($id){
    	

    	$student = Students::find($id);

    	return view('admin.pages.student.student_reg.student_edit',compact('student'));


    }
 


    public function StudentRegDetails($id){
    	

    	$student = Students::find($id);

        return response()->json(array(
            'student' => $student,
        ));


    }
 
	


 public function StudentRegUpdate(Request $request,$id){


    	DB::transaction(function() use($request,$id){
    	 
          $student = Students::where('id',$request->id)->where('id',$id)->first();
		  $student->name = $request->name;
		  $student->fname = $request->fname;
		  $student->mname = $request->mname;
		  $student->mobile = $request->mobile;
		  $student->mobile2 = $request->mobile2;
		  $student->gender = $request->gender;
		  $student->class = $request->class;
		  $student->term = $request->term;
		  $student->day_boarding = $request->day_boarding;
		  $student->student_level = $request->student_level;
          $student->save();

		  


    	});


    	$notification = array(
    		'message' => 'Student Information Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 




	public function inactiveStudent($id)
	{ 
		Students::findOrFail($id)->update(['status' => 0]);
		
			$notification = array(
				'message' => 'Student Status Deactivated...',
				'alert-type' => 'error'
			);
			return redirect()->back()->with($notification);
	
	}
	
	
	public function activeStudent($id)
	{
		Students::findOrFail($id)->update(['status' => 1]);
		
		$notification = array(
			'message' => 'Student Status Activated...',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	
	}
	





////Students Class Promotion & Term Changes Section ////



    
public function StudentsClassPromotion(Request $request){
  
  
    $data['students'] = students::where('status', 1)->get();

  return view('admin.pages.student.class_promote.students_class_promote',$data);

      

  } 




	

  public function ClassWise(Request $request){



    $class = $request->class;

  
    $data['students'] = students::where('class',$class)->where('status', 1)->get();

    
  return view('admin.pages.student.class_promote.students_class_promote',$data);

      

  } 






// Students Promotion //



  public function ClassPromotion(Request $request){ 


    $class = $request->class;
  
    $students = students::where('class',$class)->where('status', 1)->first();


   if($students == true){

DB::transaction(function() use($request){

  
  $checkdata = $request->checkmanage;  


  $class = $request->class;
  $promote_class = $request->promote_class;  
  $new_term = $request->new_term;  


  if ($checkdata != null) {
  
    for ($i=0; $i <count($checkdata) ; $i++) {  
      students::where('class',$class)->where('status', 1)->where('id',$request->id[$checkdata[$i]])->update([

        'class'=> $promote_class,
		'term'=> $new_term,

      ]);



    } // end for loop 
  }// end if conditon


});
 

if ( empty($checkdata)) {

	$notification = array(
		'message' => 'Students` Class Promotion was Successfully...',
		'alert-type' => 'success'
	);

  return redirect()->route('students.class.promote')->with($notification);

}
else{

	$notification2 = array(
		'message' => 'Students` Class Promotion was UnSuccessfully...',
		'alert-type' => 'error'
	);
  
  return redirect()->back()->with($notification2);

}


   }


   else{

	$notification3 = array(
		'message' => 'ACTION FORBIDDEN!',
		'alert-type' => 'error'
	);


    return back()->with($notification3);

}


  


  }// end method












  
  
  public function StudentsTermChange(Request $request){
  
     

    $students = students::where('status', 1)->get();


  return view('admin.pages.student.term_change.students_term_change',compact('students'));

      

  } 




	

  public function StudentsTermClassWise(Request $request){



    $class = $request->class;
     

    $students = students::where('class',$class)->where('status', 1)->get();

    
  return view('admin.pages.student.term_change.students_term_change',compact('students'));

      

  } 






// Students Term Change //



  public function TermChange(Request $request){ 


    $class = $request->class;     
    $term = $request->term;

  
    $students = students::where('class',$class)->where('term',$term)->where('status', 1)->first();


   if($students == true){

DB::transaction(function() use($request){

  
  $checkdata = $request->checkmanage;  


  $class = $request->class;
  $term = $request->term;

    $new_term = $request->new_term;  

 // $school_code = Auth::user()->school_id_no;

  if ($checkdata != null) {
  
    for ($i=0; $i <count($checkdata) ; $i++) {  
      students::where('class',$class)->where('term',$term)->where('status', 1)->where('id',$request->id[$checkdata[$i]])->update([

        'term'=> $new_term,

      ]);



    } // end for loop 
  }// end if conditon


});
 

if ( empty($checkdata)) {


	
	$notification1 = array(
		'message' => 'Students` Term Changed Successfully...',
		'alert-type' => 'info'
	);

  return redirect()->route('students.term.change')->with($notification1);

}
else{

	$notification2 = array(
		'message' => 'Students` Term Change was UnSuccessfully...',
		'alert-type' => 'error'
	);
  
  return redirect()->back()->with($notification2);

}


   }


   else{

	$notification3 = array(
		'message' => 'ACTION FORBIDDEN!',
		'alert-type' => 'error'
	);

    return back()->with($notification3);

}


  


  }// end method




///Student Info Filter

public function StudentsInfoFilter(){

	$allData = students::orderBy('id','DESC')->get();

	return view('admin.pages.student.student_filter.filter_students',compact('allData'));

} 



public function FilterClassWise(Request $request){
	


	$class = $request->class;
	 
	$allData = Students::where('class',$class)->get();

		  return view('admin.pages.student.student_filter.filter_students',compact('allData'));

} 












public function StudentAdmissionsView(){

	$allData = admissions::latest()->get();

	return view('admin.pages.student.student_reg.student_admissions',compact('allData'));

} 






public function StudentAdmissionStore(Request $request){

	$name = $request->name;
	$gender = $request->gender;
	$day_boarding = $request->day_boarding;
	$class = $request->class;
	$term = $request->term;
	$student_level = $request->student_level;

$check = Students::where('name',$name)->where('gender', $gender)->where('class', $class)->where('term',$term)->where('day_boarding', $day_boarding)->where('student_level', $student_level)->first();

if($check == null){



	DB::transaction(function() use($request){


	$startOfYear = Carbon::now()->startOfYear();
	$endOfYear = Carbon::now()->endOfYear();
	 $students = Students::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
	$count = 'IDNO-' .count($students) + 1;

	$student = new Students();
	$student->id_no = Carbon::now()->toDateString() . '-' . $count;
	$student->name = $request->name;
	$student->fname = $request->fname;
	$student->mname = $request->mname;
	$student->mobile = $request->mobile;
	$student->mobile2 = $request->mobile2;
	$student->gender = $request->gender;
	$student->class = $request->class;
	$student->term = $request->term;
	$student->day_boarding = $request->day_boarding;
	$student->student_level = $request->student_level;
	 $student->save();


	 

	 $admit_student = new admissions();
	 $admit_student->student_name = $student->name;
	 $admit_student->id_no = $student->id_no;
	 $admit_student->gender = $student->gender;
	 $admit_student->term = $student->term;
	 $admit_student->class = $student->class;
	 $admit_student->day_boarding = $student->day_boarding;
	 $admit_student->student_level = $student->student_level;
	 $admit_student->admission_fees = $request->admission_fees;
	 $admit_student->date = Carbon::today()->format('Y-m-d');
	 $admit_student->month = Carbon::today()->format('F Y');
	 $admit_student->year = Carbon::today()->format('Y');
	 $admit_student->save();
	 

	});


	$notification = array(
		'message' => 'New Student Admission Registration was Successful',
		'alert-type' => 'success'
	);

	return redirect()->route('student.admissions.view')->with($notification);


}


else{

	$notification = array(
	  'message' => 'STUDENT`S RECORD ALREADY EXISTS!!!',
	  'alert-type' => 'error'
	);
  
	return redirect()->back()->with($notification);
  
  }




} // End Method 



public function StudentAdmissionEdit($id){
	

	$student = admissions::find($id);

	return view('admin.pages.student.student_reg.student_admission_edit',compact('student'));


}



public function StudentAdmissionDetails($id){
	

	$student = admissions::find($id);

	return response()->json(array(
		'student' => $student,
	));


}




public function StudentAdmissionUpdate(Request $request,$id){


	DB::transaction(function() use($request,$id){
	 
	  $student = admissions::where('id',$request->id)->where('id',$id)->first();
	  $student->student_name = $student->name;
	  $student->gender = $student->gender;
	  $student->term = $student->term;
	  $student->class = $student->class;
	  $student->day_boarding = $student->day_boarding;
	  $student->student_level = $student->student_level;
	  $student->admission_fees = $request->admission_fees;
	  $student->save();

	  


	});


	$notification = array(
		'message' => 'Student Admission Information Updated Successfully',
		'alert-type' => 'success'
	);

	return redirect()->route('student.admissions.view')->with($notification);

} // End Method 












}
