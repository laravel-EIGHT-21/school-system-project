<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\school_subjects;
use App\Models\designation;
use App\Models\points_grades;
use App\Models\OlevelGrades;
use App\Models\score_ranges;
use App\Models\subject_competency;

class SchoolSubjectsController extends Controller
{
    


    public function ViewSubject(){
    	$data['allData'] = school_subjects::all();
    	return view('admin.pages.setup.school_subject.view_school_subject',$data);
 
    }



    public function SubjectStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:school_subjects,name',
	    		
	    	]);

	    	$data = new school_subjects();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Subject Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    return redirect()->route('school.subject.view')->with($notification);

	    }


	    public function SubjectEdit($id){
	    	$subject = school_subjects::find($id);
	    	
            return response()->json(array(
                'subject' => $subject,
            ));



	    }



	    public function SubjectUpdate(Request $request){

            $id = $request->input('id');
	 $data = school_subjects::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:school_subjects,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Subject Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('school.subject.view')->with($notification);
    }


     public function SubjectDelete($id){

		school_subjects::findOrFail($id)->delete();




	    	$notification = array(
	    		'message' => 'Subject Deleted Successfully',
	    		'alert-type' => 'error',
	    	);

	   return redirect()->route('school.subject.view')->with($notification);

	    }




//Designations

        public function ViewDesignation(){
            $data['allData'] = Designation::all();
            return view('admin.pages.setup.designation.view_designation',$data);
     
        }
    

    
    public function DesignationStore(Request $request){
    
                $validatedData = $request->validate([
                    'name' => 'required|unique:designations,name',
                    
                ]);
    
                $data = new Designation();
                $data->name = $request->name;
                $data->save();
    
                $notification = array(
                    'message' => 'Designation Inserted Successfully',
                    'alert-type' => 'success'
                );
    
            return redirect()->route('designation.view')->with($notification);
    
            }
    
    
    
    public function DesignationEdit($id){
                $title = Designation::find($id);

        return response()->json(array(
            'title' => $title,
        ));


            }
    
    
     public function DesignationUpdate(Request $request){
        $id = $request->input('id');
         $data = Designation::find($id);
         
         $validatedData = $request->validate([
                'name' => 'required|unique:designations,name,'.$data->id
                
            ]);
    
            
            $data->name = $request->name;
            $data->save();
    
            $notification = array(
                'message' => 'Designation Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('designation.view')->with($notification);
        }
    









        
    public function ViewSubjectCompetency(){
        $data['allData'] = subject_competency::select('subject_id')->groupBy('subject_id')->get();
        return view('admin.pages.setup.subject_competency.view_assign_subject',$data);
    }


     public function AddSubjectCompetency(){
        $data['subjects'] = school_subjects::all();
      
        return view('admin.pages.setup.subject_competency.add_assign_subject',$data);
    }


    public function StoreSubjectCompetency(Request $request){

            $subjectCount = count($request->competency);
            if ($subjectCount !=NULL) {
                for ($i=0; $i <$subjectCount ; $i++) { 
                    $assign_subject = new subject_competency();
                    $assign_subject->subject_id = $request->subject_id;
                    $assign_subject->competency = $request->competency[$i];

                    $assign_subject->save(); 

                } // End For Loop
            }// End If Condition

            $notification = array(
                'message' => 'Subject Competencies Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('subject.competency.view')->with($notification);

        }  // End Method 


     public function EditSubjectCompetency($subject_id){
            $data['editData'] = subject_competency::where('subject_id',$subject_id)->orderBy('competency','desc')->get();
            // dd($data['editData']->toArray());
        $data['subjects'] = school_subjects::all();
        return view('admin.pages.setup.subject_competency.edit_assign_subject',$data);

        }


public function UpdateSubjectCompetency(Request $request,$subject_id){
        if ($request->competency == NULL) {
       
        $notification = array(
            'message' => 'Sorry You did not Add Competency',
            'alert-type' => 'error'
        );

        return redirect()->route('subject.competency.edit',$subject_id)->with($notification);
             
        }else{
             
    $countClass = count($request->competency);
    subject_competency::where('subject_id',$subject_id)->delete(); 
            for ($i=0; $i <$countClass ; $i++) { 
                $assign_subject = new subject_competency();
                $assign_subject->subject_id = $request->subject_id;
                $assign_subject->competency = $request->competency[$i];
                    $assign_subject->save();

            } // End For Loop	 

        }// end Else

       $notification = array(
            'message' => 'Subject Competencies Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.competency.view')->with($notification);
    } // end Method 


    public function DetailsSubjectCompetency($subject_id){
   $data['detailsData'] = subject_competency::where('subject_id',$subject_id)->orderBy('competency','desc')->get();

   return view('admin.pages.setup.subject_competency.details_assign_subject',$data);


     }






     //OLD O-LEVEL GRADING
     
    public function MarksGradeView(){
    	$data['allData'] = OlevelGrades::all();
    	return view('admin.pages.marks.grade_marks_view',$data);

    }

 
    public function MarksGradeAdd(){
    	return view('admin.pages.marks.grade_marks_add');
    }



    public function MarksGradeStore(Request $request){

    	$data = new OlevelGrades(); 
    	$data->grade_name = $request->grade_name;
		$data->numeric_grade = $request->numeric_grade;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.entry.grade')->with($notification);


    } // end Method 


    public function MarksGradeEdit($id){
    	$data['editData'] = OlevelGrades::find($id);
    	return view('admin.pages.marks.grade_marks_edit',$data);

    }


    public function MarksGradeUpdate(Request $request, $id){

    	$data = OlevelGrades::find($id);
    	$data->grade_name = $request->grade_name;
		$data->numeric_grade = $request->numeric_grade;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.entry.grade')->with($notification);

    }






    
	// Competency Grading 

    public function CompetencyGradeView(){
    	$data['allData'] = score_ranges::all();
    	return view('admin.pages.setup.new_grading.grade_marks_view',$data);

    }

 
    public function CompetencyGradeAdd(){
    	return view('admin.pages.setup.new_grading.grade_marks_add');
    }



    public function CompetencyGradeStore(Request $request){

    	$data = new score_ranges();
    	$data->score_start = $request->score_start;
		$data->score_end = $request->score_end;
		$data->remarks = $request->remarks;
    	$data->descriptor = $request->descriptor;

    	$data->save();

		$notification = array(
    		'message' => 'Grade Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('competency.grades.view')->with($notification);


    } // end Method 


    public function CompetencyGradeEdit($id){
    	$data['editData'] = score_ranges::find($id);
    	return view('admin.pages.setup.new_grading.grade_marks_edit',$data);

    }


    public function CompetencyGradeUpdate(Request $request, $id){

    	$data = score_ranges::find($id);
		$data->score_start = $request->score_start;
		$data->score_end = $request->score_end;
		$data->remarks = $request->remarks;
    	$data->descriptor = $request->descriptor;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('competency.grades.view')->with($notification);

    }





    
	/// Alevel Grades Section ///

	public function AlevelMarksGradeView(){
    	$data['allData'] = points_grades::orderBy('id','ASC')->get();
    	return view('admin.pages.marks.alevel_marks.alevel_grades_view',$data);

    }

 
    public function AlevelMarksGradeAdd(){
    	return view('admin.pages.marks.alevel_marks.alevel_grades_add');
    }


    public function AlevelMarksGradeStore(Request $request){

    	$data1 = new points_grades();
		$data1->grade_name = $request->grade_name;
    	$data1->grade_point = $request->grade_point;
    	$data1->save();

		$notification = array(
    		'message' => 'Grade Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('points.entry.grade')->with($notification);


    } // end Method 


    public function AlevelMarksGradeEdit($id){
    	$data['editData'] = points_grades::find($id);
    	return view('admin.pages.marks.alevel_marks.alevel_grades_edit',$data);

    }


    public function AlevelMarksGradeUpdate(Request $request, $id){

    	$data1 = points_grades::find($id);
    	$data1->grade_name = $request->grade_name;
    	$data1->grade_point = $request->grade_point;
    	$data1->save();

		$notification = array(
    		'message' => 'Grade Points Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('points.entry.grade')->with($notification);

    }









}
