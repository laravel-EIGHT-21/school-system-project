<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students;
use App\Models\assign_teacher_subject;
use App\Models\school_subjects;
use App\Models\subject_competency;
use App\Models\AlevelStudentPoints;
use App\Models\OlevelStudentsMarks;
use App\Models\competency_marks;
use App\Models\primary_marks;
use Illuminate\Support\Facades\Auth;

class StudentExamsController extends Controller
{




    
    public function MarksAdd(){

		$data['school_subjects'] = school_subjects::all();

		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
 
    	return view('admin.pages.marks.marks_add',$data); 

    }



	
	public function GetStudentsBySubject(Request $request){
	
	
		$classes = $request->class;
		$allData = Students::where('class',$classes)->get();
	  
		return response()->json($allData);
	
	
	} 


    public function MarksStore(Request $request){ 
 

		$year = $request->year;
		$class = $request->class;
	  $term = $request->term;
		$exam_type = $request->exam_type;
		$subject_id = $request->subject_id;

	  

		$check = primary_marks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('subject_id',$subject_id)->first();

		  
     
if($check == null){

    	$studentcount = $request->id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->id) ; $i++) { 
    		$data = New primary_marks();
    		$data->year = $request->year;
    		$data->class = $request->class;
			$data->term = $request->term;
    		$data->subject_id = $request->subject_id;
    		$data->exam_type = $request->exam_type;
            $data->user_id = Auth::id();
    		$data->student_id = $request->id[$i];
    		$data->marks = $request->marks[$i];
    		$data->save(); 

    		} // end for loop 
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


	}


	else{


		$notification = array(
		  'message' => 'RESULTS RECORD ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }

    }// end method



    public function MarksDetails(){

		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

    	return view('admin.pages.marks.marks_edit_details',$data);
    }


	public function MarksGetStudents(Request $request){
    	$year = $request->year; 
    	$class = $request->class;
		$term = $request->term;
    	$subject_id = $request->subject_id;
    	$exam_type = $request->exam_type;

		if ($year !='') {
			$where[] = ['year','like',$year.'%'];
		}

		if ($class !='') {
			$where[] = ['class','like',$class.'%'];
		}

		if ($term !='') {
			$where[] = ['term','like',$term.'%'];
		}

		if ($subject_id !='') {
			$where[] = ['subject_id','like',$subject_id.'%'];
		}

		if ($exam_type !='') {
			$where[] = ['exam_type','like',$exam_type.'%'];
		}


		 
    	$getStudent = primary_marks::with(['student'])->where('year',$year)->where('class',$class)->where('term',$term)->where('subject_id',$subject_id)->where('exam_type',$exam_type)->get();


		$html['thsource']  = '<th>SL</th>';
		$html['thsource'] .= '<th>ID No</th>';
		$html['thsource'] .= '<th>Name</th>';
		$html['thsource'] .= '<th>Gender</th>';
		$html['thsource'] .= '<th>Marks</th>';
		$html['thsource'] .= '<th>Action</th>';

		foreach ($getStudent as $key => $v) {
			$color = 'info';

			
			$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'<input type="hidden" name="student_id[]" value="'.$v->student_id.'">'.'<input type="hidden" name="id_no[]" value="'.$v['student']['id_no'].'">'.'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
			$html[$key]['tdsource'] .= '<td>'.$v['student']['gender'].'</td>';

			$html[$key]['tdsource'] .='<td>'. '<input type="text" class="form-control" name="marks[]" readonly value="'.$v->marks.'" >'.'</td>'; 

			$html[$key]['tdsource'] .='<td>';
			$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Edit" href="'.route("marks.entry.edit",$v->id).'">Edit</a>';
			$html[$key]['tdsource'] .= '</td>';

		}  
	   return response()->json(@$html);

    }




	public function MarksEdit($id){

		$data['subjectz'] = school_subjects::all();

		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

		$data['editData'] = primary_marks::with(['student'])->where('id',$id)->first();

    	return view('admin.pages.marks.marks_edit',$data);
    }



    public function MarksUpdate(Request $request,$id){

	primary_marks::findOrFail($id)->update([
		'term' =>$request->term,
		'exam_type' =>$request->exam_type,
		'subject_id' =>$request->subject_id,
		'marks' =>$request->marks, 
		
	  ]);
	  
	  $notification = array(
	  'message' => 'Student`s Subject Marks Update Successfully',
	  'alert-type' => 'success'
	  );
	  
	  return redirect()->back()->with($notification);

    } // end marks









    
		/// Competency Based assessment Results ///

		
		public function CompetencyResultsAdd(){


			///$data['subjects'] = school_subjects::all();
			$data['competencies'] = subject_competency::all();
	
			$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
	
	
			return view('admin.pages.marks.competency.marks_add',$data); 
	
		}
	



	
		public function CompetencyResultsStore(Request $request){
	
		$year = $request->year;
		$class = $request->class;
		$term = $request->term;
		$exam_type = $request->exam_type;
		$subject_id = $request->subject_id;
		$competency_id = $request->competency_id;

			$check = competency_marks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('subject_id',$subject_id)->where('competency_id',$competency_id)->first();
	
			  
	if($check == null){
	
			$studentcount = $request->id;
			if ($studentcount) {
				for ($i=0; $i < count($studentcount) ; $i++) { 
				$data = New competency_marks();
				$data->year = $request->year;
				$data->class = $request->class;
				$data->term = $request->term;
				$data->exam_type = $request->exam_type;
				$data->subject_id = $request->subject_id;
				$data->competency_id = $request->competency_id;
                $data->user_id = Auth::id();
				$data->student_id = $request->id[$i];
				$data->score = $request->score[$i];
				$data->save();
	
				} // end for loop
			}// end if conditon
	
				$notification = array(
				'message' => 'Students` Results Submitted Successfully !',
				'alert-type' => 'success'
			);
	
			return redirect()->back()->with($notification);
	
		}else{
	
	
				$notification = array(
				  'message' => 'RESULTS RECORD ALREADY EXISTS!!!',
				  'alert-type' => 'error'
				);
			  
				return redirect()->back()->with($notification);
			  
			  }
	
		}// end method
	
	
		public function CompetencyResultsDetails(){
	

			///$data['subjects'] = SchoolSubject::all();
			$data['competencies'] = subject_competency::all();
			$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
	
			return view('admin.pages.marks.competency.marks_edit_details',$data);
		}
	
	
		public function CompetencyResultsGetStudents(Request $request){
	
			$year = $request->year;
			$class = $request->class;
			$term = $request->term;
			$exam_type = $request->exam_type;
			$subject_id = $request->subject_id;
			$competency_id = $request->competency_id;
		
			if ($year !='') {
				$where[] = ['year','like',$year.'%'];
			}
	
			if ($class !='') {
				$where[] = ['class','like',$class.'%'];
			}
	
			if ($term !='') {
				$where[] = ['term','like',$term.'%'];
			}


			if ($exam_type !='') {
				$where[] = ['exam_type','like',$exam_type.'%'];
			}
		

	
			if ($subject_id !='') {
				$where[] = ['subject_id','like',$subject_id.'%'];
			}
	
			
			if ($competency_id !='') {
				$where[] = ['competency_id','like',$competency_id.'%'];
			}
	
	
			$get_Student = competency_marks::with(['student'])->where('year',$request->year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('subject_id',$subject_id)->where('competency_id',$request->competency_id)->get();
	
			$html['thsource']  = '<th>SL</th>';
			$html['thsource'] .= '<th>ID No</th>';
			$html['thsource'] .= '<th>Name</th>';
			$html['thsource'] .= '<th>Gender</th>';
			$html['thsource'] .= '<th>Competence Score</th>';
			$html['thsource'] .= '<th>Action</th>';
	
			foreach ($get_Student as $key => $v) {
				$color = 'primary';
	
				$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
	
				$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'<input type="hidden" name="student_id[]" value="'.$v->student_id.'">'.'<input type="hidden" name="id_no[]" value="'.$v['student']['id_no'].'">'.'</td>';
	
				$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
				$html[$key]['tdsource'] .= '<td>'.$v['student']['gender'].'</td>';
	
				$html[$key]['tdsource'] .='<td>'. '<input type="text" class="form-control" name="score[]" readonly value="'.$v->score.'" >'.'</td>';
				
	
				$html[$key]['tdsource'] .='<td>';
				$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Edit" href="'.route("competency.results.edit",$v->id).'"><i class="fa fa-edit"></i></a>';
				$html[$key]['tdsource'] .= '</td>';
	
			}  
		   return response()->json(@$html);
	
		} 
		
	
	
	
	
	
	
	
	
		public function CompetencyResultsEdit($id){

			$subjects = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();
            $subject = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->first();
			$competencies = subject_competency::where('subject_id',$subject->subject_id)->get();
	
			$editData = competency_marks::with(['student'])->where('id',$id)->first();
	
			return view('admin.pages.marks.competency.marks_edit',compact('subjects','competencies','editData'));
		}
	
	
		
	
	
		public function CompetencyResultsUpdate(Request $request,$id){
	
		
			competency_marks::findOrFail($id)->update([
				'term' =>$request->term,
				'exam_type' =>$request->exam_type,
				'subject_id' =>$request->subject_id,
				'competency_id' =>$request->competency_id,
				'score' =>$request->score,																													
				
			  ]);
			  
			  $notification = array(
			  'message' => 'Student`s Result Updated Successfully',
			  'alert-type' => 'success'
			  );
		
				return redirect()->back()->with($notification);
		
		 
			} // end marks 
	






				    
			public function GetSubjectCompetency(Request $request){ 

				$subject_id = $request->subject_id;
				$allUnits = subject_competency::where('subject_id',$subject_id)->get();
				return response()->json($allUnits);
		
		
			}







            
/// O-LEVEL Student Marks S3 & S4 Marks Section /// 


	public function MarksAddOlevel(){
 

		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

    	return view('admin.pages.marks.olevel_marks.olevel_marks_add',$data); 

    }


	public function MarksStoreOlevel(Request $request){

		$year = $request->year;
		$class = $request->class;
	  $term = $request->term;
		$exam_type = $request->exam_type;
		$subject_id = $request->subject_id;

		$check = OlevelStudentsMarks::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('subject_id',$subject_id)->first();

		  
     
if($check == null){

    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data1 = New OlevelStudentsMarks();
    		$data1->year = $request->year;
    		$data1->class = $request->class;
			$data1->term = $request->term;
    		$data1->subject_id = $request->subject_id;
    		$data1->exam_type = $request->exam_type;
            $data1->teacher_id = Auth::id();
    		$data1->student_id = $request->student_id[$i];
    		$data1->paper1_marks = $request->paper1_marks[$i];
			$data1->paper2_marks = $request->paper2_marks[$i];
            $data1->paper3_marks = $request->paper3_marks[$i];
    		$data1->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

	}else{


			$notification = array(
			  'message' => 'RESULTS RECORD ALREADY EXISTS!!!',
			  'alert-type' => 'error'
			);
		  
			return redirect()->back()->with($notification);
		  
		  }

    }// end method


	public function MarksOlevelDetails(){


		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

    	return view('admin.pages.marks.olevel_marks.olevel_marks_details',$data);
    }


	public function MarksEditGetStudentsOlevel(Request $request){

    	$year = $request->year; 
    	$class = $request->class;
		$term = $request->term;
		$subject_id = $request->subject_id;
    	$exam_type = $request->exam_type;
	
		if ($year !='') {
			$where[] = ['year','like',$year.'%'];
		}

		if ($class !='') {
			$where[] = ['class','like',$class.'%'];
		}

		if ($term !='') {
			$where[] = ['term','like',$term.'%'];
		}

		if ($subject_id !='') {
			$where[] = ['subject_id','like',$subject_id.'%'];
		}

		if ($exam_type !='') {
			$where[] = ['exam_type','like',$exam_type.'%'];
		}


    	$get_OlevelStudent = OlevelStudentsMarks::with(['student'])->where('year',$year)->where('class',$class)->where('term',$term)->where('subject_id',$subject_id)->where('exam_type',$exam_type)->get();

		$html['thsource']  = '<th>SL</th>';
		$html['thsource'] .= '<th>ID No</th>';
		$html['thsource'] .= '<th>Name</th>';
		$html['thsource'] .= '<th>First Paper</th>';
		$html['thsource'] .= '<th>Second Paper</th>';
        $html['thsource'] .= '<th>Third Paper</th>';
		$html['thsource'] .= '<th>Action</th>';

		foreach ($get_OlevelStudent as $key => $v) {
			$color = 'info';

			
			$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'<input type="hidden" name="student_id[]" value="'.$v->student_id.'">'.'<input type="hidden" name="id_no[]" value="'.$v['student']['id_no'].'">'.'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';

			$html[$key]['tdsource'] .='<td>'. '<input type="text" class="form-control" name="paper1_marks[]" readonly value="'.$v->paper1_marks.'" >'.'</td>';
			
			$html[$key]['tdsource'] .='<td>'. '<input type="text" class="form-control" name="paper2_marks[]" readonly value="'.$v->paper2_marks.'" >'.'</td>';

            $html[$key]['tdsource'] .='<td>'. '<input type="text" class="form-control" name="paper3_marks[]" readonly value="'.$v->paper3_marks.'" >'.'</td>';


			$html[$key]['tdsource'] .='<td>';
			$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Edit" href="'.route("marks.olevel.entry.edit",$v->id).'">Edit</a>';
			$html[$key]['tdsource'] .= '</td>';

		}  
	   return response()->json(@$html);

    } 
	








    public function MarksEditOlevel($id){


		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

		$data['editData'] = OlevelStudentsMarks::with(['student'])->where('id',$id)->first();

    	return view('admin.pages.marks.olevel_marks.olevel_marks_edit',$data);
    }


	


	public function MarksUpdateOlevel(Request $request,$id){

		OlevelStudentsMarks::findOrFail($id)->update([
			'term' =>$request->term,
			'exam_type' =>$request->exam_type,
			'subject_id' =>$request->subject_id,
			'paper1_marks' =>$request->paper1_marks,
			'paper2_marks' =>$request->paper2_marks,
            'paper3_marks' =>$request->paper3_marks,
			
		  ]);
		  
		  $notification = array(
		  'message' => 'Student`s Subject Marks Update Successfully',
		  'alert-type' => 'success'
		  );
	
			return redirect()->back()->with($notification);
	
	 
		} // end marks 









        
		
	///Alevel Marks Section ///

	public function AlevelMarksAdd(){


		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

    	return view('admin.pages.marks.alevel_marks.alevel_points_add',$data); 

    }


	public function AlevelMarksStore(Request $request){

		$year = $request->year;
		$class = $request->class;
	  $term = $request->term;
		$exam_type = $request->exam_type;
		$subject_id = $request->subject_id;

	  

		$check = AlevelStudentPoints::where('year',$year)->where('class',$class)->where('term',$term)->where('exam_type',$exam_type)->where('subject_id',$subject_id)->first();

		  
     
if($check == null){


    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data1 = New AlevelStudentPoints();
    		$data1->year = $request->year;
    		$data1->class = $request->class;
			$data1->term = $request->term;
    		$data1->subject_id = $request->subject_id;
    		$data1->exam_type = $request->exam_type;
            $data1->teacher_id = Auth::id();
    		$data1->student_id = $request->student_id[$i];
    		$data1->points = $request->points[$i];

			

    		$data1->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Points Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

	}


	else{


		$notification = array(
		  'message' => 'RESULTS RECORD ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }


    }// end method


	public function PointsAlevelDetails(){
    	
		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();

    	return view('admin.pages.marks.alevel_marks.alevel_points_details',$data);
    }


	public function AlevelMarksEditGetStudents(Request $request){

    	$year = $request->year; 
    	$class = $request->class;
		$term = $request->term;
		$subject_id = $request->subject_id;
    	$exam_type = $request->exam_type;

		if ($year !='') {
			$where[] = ['year','like',$year.'%'];
		}

		if ($class !='') {
			$where[] = ['class','like',$class.'%'];
		}

		if ($term !='') {
			$where[] = ['term','like',$term.'%'];
		}

		if ($subject_id !='') {
			$where[] = ['subject_id','like',$subject_id.'%'];
		}

		if ($exam_type !='') {
			$where[] = ['exam_type','like',$exam_type.'%'];
		}
		
    	$get_AlevelStudent = AlevelStudentPoints::with(['student'])->where('year',$year)->where('class',$class)->where('term',$term)->where('subject_id',$subject_id)->where('exam_type',$exam_type)->get();

    	$html['thsource']  = '<th>SL</th>';
		$html['thsource'] .= '<th>ID No</th>';
		$html['thsource'] .= '<th>Name</th>';
		$html['thsource'] .= '<th>Gender</th>';
		$html['thsource'] .= '<th>Subject Points</th>';
		$html['thsource'] .= '<th>Action</th>';

		foreach ($get_AlevelStudent as $key => $v) {
			$color = 'info';

			
			$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'<input type="hidden" name="student_id[]" value="'.$v->student_id.'">'.'<input type="hidden" name="id_no[]" value="'.$v['student']['id_no'].'">'.'</td>';

			$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
			$html[$key]['tdsource'] .= '<td>'.$v['student']['gender'].'</td>';

			$html[$key]['tdsource'] .='<td>'. '<input type="text" maxlenght="1" class="form-control" name="points[]" readonly value="'.$v->points.'" >'.'</td>';
			
			
			$html[$key]['tdsource'] .='<td>';
			$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Edit" href="'.route("alevel.marks.entry.edit",$v->id).'">Edit</a>';
			$html[$key]['tdsource'] .= '</td>';

		}  
	   return response()->json(@$html);

    } 

	

    public function AlevelMarksEdit($id){ 



		$data['subjects'] = assign_teacher_subject::with(['subject'])->where('teacher_id',Auth::id())->get();


		$data['editData'] = AlevelStudentPoints::with(['student'])->where('id',$id)->first();

    	return view('admin.pages.marks.alevel_marks.alevel_points_edit',$data);
    }



	public function AlevelMarksUpdate(Request $request,$id){


		AlevelStudentPoints::findOrFail($id)->update([
			'term' =>$request->term,
			'exam_type' =>$request->exam_type,
			'subject_id' =>$request->subject_id,
			'points' =>$request->points,
			
		  ]);
		  
		  $notification = array(
		  'message' => 'Student`s Subject Points Update Successfully',
		  'alert-type' => 'success'
		  );
	
			return redirect()->back()->with($notification);
	
	 
		} // end marks












}
