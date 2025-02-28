<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\school_subjects;
use App\Models\assign_teacher_subject;
use App\Models\designation;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;

class EmployeeController extends Controller
{




        

    public function EmployeesView(){

        $allData = User::all();
        $teachers = User::where('user_type',1)->get();
        $non_teachers = User::where('user_type',2)->get();
        $designation = designation::all();
        $roles = Role::all();
    
    	return view('admin.pages.employee.employee_reg.employee_view',compact('allData','teachers','non_teachers','designation','roles'));
 
    } 




    
 
    public function TeacherEmployeeAdd(){
    	$data['designation'] = Designation::all();
		$data['subjects'] = School_Subjects::all();
		
		$data['roles'] = Role::all();
    	return view('admin.pages.employee.employee_reg.teacher_employee_add',$data);
    }
 


    
    public function TeacherEmployeeStore(Request $request){


		$email = $request->email;		
		$check = User::where('email',$email)->first();

		if($check == null){


    	DB::transaction(function() use($request){
    	
			$adminuser = new User();
			$adminuser->name = $request->name;
			$adminuser->email = $request->email;
			$adminuser->phone = $request->phone;
			$adminuser->gender = $request->gender;
			$adminuser->join_date = date('Y-m-d',strtotime($request->join_date));
			$adminuser->password = Hash::make($request->password);
			$adminuser->designation_id = $request->designation_id;
			$adminuser->salary = $request->salary;
			$adminuser->user_type = 1;
			$adminuser->created_at = Carbon::now(); 
			$adminuser->save();

			$roles = $request['roles'];

			if (isset($roles)) {
	
				foreach ($roles as $role) {
				$role_r = Role::where('id', '=', $role)->firstOrFail();            
				$adminuser->assignRole($role_r);
				} 
			}     
		
		$subjectCount = count($request->subject_id);
		for ($i=0; $i <$subjectCount ; $i++) { 
			$assign_subject = new assign_teacher_subject(); 
			$assign_subject->teacher_id = $adminuser->id;
			$assign_subject->subject_id = $request->subject_id[$i];
		
			$assign_subject->save();

		} // End For Loop

           
    	});


    	$notification = array(
    		'message' => 'Teaching Staff Registration Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employees.view')->with($notification);

	}

	else{


		$notification = array(
		  'message' => ' EMAIL ALREADY EXIST!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }	





    } // END Method




    public function TeacherEmployeeEdit($id){
		$data['editData'] = User::where('user_type', 1)->findOrFail($id);
		$data['subjectData'] = assign_teacher_subject::where('teacher_id',$id)->orderBy('subject_id','asc')->get();
		$data['designation'] = Designation::all();
		$data['subjects'] = school_subjects::all();

		$data['editRole'] = DB::table('model_has_roles')->where('model_id',$id)->orderBy('role_id','asc')->get();
		$data['roles'] = Role::all();

    	return view('admin.pages.employee.employee_reg.employee_edit',$data);

    }


    public function TeacherEmployeeUpdate(Request $request, $id){
    
    	DB::transaction(function() use($request,$id){ 
    	 
    	$adminuser = User::where('id',$id)->first();    	 
		$adminuser->name = $request->name;
		$adminuser->phone = $request->phone;
		$adminuser->gender = $request->gender;
		$adminuser->join_date = date('Y-m-d',strtotime($request->join_date));
		$adminuser->designation_id = $request->designation_id;
		$adminuser->salary = $request->salary;
 	    $adminuser->save();

		 $roles = $request['roles'];
		 if (isset($roles)) {        
            $adminuser->roles()->sync($roles);            
        }        
        else {
            $adminuser->roles()->detach();
        }


		 $subjectCount = count($request->subject_id);
		 assign_teacher_subject::where('teacher_id',$id)->delete(); 
		 for ($i=0; $i <$subjectCount ; $i++) { 
          $assign_student_subject = new assign_teacher_subject();
		  $assign_student_subject->teacher_id = $adminuser->id;
		  $assign_student_subject->subject_id = $request->subject_id[$i];
          $assign_student_subject->save();

		} // End For Loop


    	});
         

    	$notification = array(
    		'message' => 'Employee Information Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employees.view')->with($notification);


    }// END METHOD











    public function NonTeacherEmployeeStore(Request $request){


		$email = $request->email;		
		$check = User::where('email',$email)->first();

		if($check == null){


    	DB::transaction(function() use($request){
    	
			$adminuser = new User();
			$adminuser->name = $request->name;
			$adminuser->email = $request->email;
			$adminuser->phone = $request->phone;
			$adminuser->gender = $request->gender;
			$adminuser->join_date = date('Y-m-d',strtotime($request->join_date));
			$adminuser->password = Hash::make($request->password);
			$adminuser->designation_id = $request->designation_id;
			$adminuser->salary = $request->salary;
			$adminuser->user_type = 2;
			$adminuser->created_at = Carbon::now(); 
			$adminuser->save();

			$roles = $request['roles'];

			if (isset($roles)) {
	
				foreach ($roles as $role) {
				$role_r = Role::where('id', '=', $role)->firstOrFail();            
				$adminuser->assignRole($role_r);
				} 
			}     
		
           
    	});


    	$notification = array(
    		'message' => 'Non-Teaching Staff Registration Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employees.view')->with($notification);

	}

	else{


		$notification = array(
		  'message' => ' EMAIL ALREADY EXIST!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }	





    } // END Method




    public function NonTeacherEmployeeEdit($id){
		$data['editData'] = User::where('user_type', 2)->findOrFail($id);
		$data['designation'] = Designation::all();

		$data['editRole'] = DB::table('model_has_roles')->where('model_id',$id)->orderBy('role_id','asc')->get();
		$data['roles'] = Role::all();

    	return view('admin.pages.employee.employee_reg.non_teacher_edit',$data);

    }


    public function NonTeacherEmployeeUpdate(Request $request, $id){
    
    	DB::transaction(function() use($request,$id){ 
    	 
    	$adminuser = User::where('id',$id)->first();    	 
		$adminuser->name = $request->name;
		$adminuser->phone = $request->phone;
		$adminuser->gender = $request->gender;
		$adminuser->join_date = date('Y-m-d',strtotime($request->join_date));
		$adminuser->designation_id = $request->designation_id;
		$adminuser->salary = $request->salary;
 	    $adminuser->save();

		 $roles = $request['roles'];
		 if (isset($roles)) {        
            $adminuser->roles()->sync($roles);            
        }        
        else {
            $adminuser->roles()->detach();
        }


    	});
         

    	$notification = array(
    		'message' => 'Employee Information Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employees.view')->with($notification);


    }// END METHOD














    public function EmployeeDetails($id){

        $employee = USer::find($id);

		$designation = Designation::all();

        return response()->json(array(
            'employee' => $employee,
            'designation' => $designation,
        ));




    }






    		
    public function inactiveEmployee($id)
    { 
        User::findOrFail($id)->update(['status' => 'inactive']);
            $notification = array(
                'message' => 'User Has Been Deactivated...',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

    }


    public function activeEmployee($id)
    {
        User::findOrFail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'User Has Been Activated...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }





///Empoyees Leave Section
    
    public function LeaveView(){
    	$data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
    	return view('admin.pages.employee.employee_leave.employee_leave_view',$data);
    }


    public function LeaveAdd(){
		
    	$data['employees'] = User::all();
    	$data['leave_purpose'] = LeavePurpose::all();
    	return view('admin.pages.employee.employee_leave.employee_leave_add',$data);
    }


    public function LeaveStore(Request $request){

    	if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = new EmployeeLeave();
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee`s Leave Info Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);

    }// end Method 



    public function LeaveEdit($id){
    	$data['editData'] = EmployeeLeave::find($id);
    	$data['employees'] = User::all();
    	$data['leave_purpose'] = LeavePurpose::all();
    	return view('admin.pages.employee.employee_leave.employee_leave_edit',$data);

    }



    public function LeaveUpdate(Request $request,$id){

    	if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = EmployeeLeave::find($id);
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee`s Leave Info Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);

    } // end Method 



    public function LeaveDelete($id){
    	$leave = EmployeeLeave::find($id);
    	$leave->delete();

    	$notification = array(
    		'message' => 'Employee`s Leave Info Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);
    }





    
}
