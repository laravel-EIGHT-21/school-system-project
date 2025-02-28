<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee_salary;
use App\Models\employee_salary_log;
use App\Models\expenses;
use App\Models\expenses_category;
use App\Models\expenses_log;
use App\Models\SiteSetting;
use Carbon\Carbon;
use App\Models\User;

class ExpensesController extends Controller
{
    




    
    public function AccountSalaryView(){

    	$data['allData'] = employee_salary::latest()->get();
    	return view('admin.pages.account.employee_salary.employee_salary_view',$data);

    }


    public function AccountSalaryAdd(){

		$data['employees'] = User::where('status','active')->get();
      return view('admin.pages.account.employee_salary.employee_salary_add',$data);
    }
 




	/*

    public function AccountSalaryGetEmployee(Request $request){


		//$date = new DateTime($request->date);
        //$formatDate = $date->format('d F Y'); 

		$date = Carbon::parse($request->month)->format('F Y');	
		if ($date !='') {
		  $where[] = ['month','like',$date.'%'];
		  }

    	 
    	 $data = EmployeeAttendance::select('user_id')->groupBy('user_id')->with(['user'])->where($where)->get();
    	 // dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th>Select</th>'; 
 

    	 foreach ($data as $key => $attend) {

    	 	$account_salary = employee_salary::where('user_id',$attend->user_id)->where('month',$date)->first();

    	 	if($account_salary !=null) {
			 	$checked = 'checked';
			 }else{
			 	$checked = '';
			 }   

    	 	$totalattend = EmployeeAttendance::with(['user'])->where($where)->where('user_id',$attend->user_id)->get();
    	 	$absentcount = count($totalattend->where('attend_status','Absent'));

    	 	 
 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name']. '<input type="hidden" name="month" value="'.$date.'" >'.'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
 	 
 	
 	$salary = (float)$attend['user']['salary'];
 	$salaryperday = (float)$salary/30;
 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

 	$html[$key]['tdsource'] .='<td>'.$salary.'<input type="hidden" name="amount[]" value="'.$salary.'" >'.'</td>';

 	 
 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="user_id[]" value="'.$attend->user_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

      }  // end foreach
    	return response()->json(@$html);

    } // end Method



*/






    public function AccountSalaryStore(Request $request){ 


		$month = Carbon::parse($request->month)->format('F Y');
		$year = Carbon::parse($request->year)->format('Y');
		$user_id = $request->user_id;

    	$check = employee_salary::where('month',$month)->where('year',$year)->where('user_id',$user_id)->first();



    	if ($check == null) {

			employee_salary::where('month',$month)->where('year',$year)->where('user_id',$user_id)->delete();

    	$checkdata = $request->checkmanage;
 
    	if ($checkdata != null) {
    		for ($i=0; $i <count($checkdata) ; $i++) { 
    			$data = new employee_salary(); 
    			$data->month = $month; 
				$data->year = $year; 
    			$data->user_id = $request->user_id[$checkdata[$i]];
    			$data->amount = $request->amount[$checkdata[$i]];
    			$data->save();
    		} 
    	} // end if 

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Employees` Salary Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('account.salary.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry!, Record Not Saved...!',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 


	}
 
	else{

		$notification = array(
		'message' => 'EMPLOYEES MONTHLY SALARY RECORDS ALREADY EXISTS!',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);

	} 


    } // end method 



	
	
    public function AccountSalaryEdit($id){
    	$data['users'] = User::where('status','active')->get();
		$data['allData'] = employee_salary::find($id);
      return view('admin.pages.account.employee_salary.employee_salary_edit',$data);
    }
 


	
	public function AccountSalaryUpdate(Request $request,$id){ 

		
    		
    			$data = employee_salary::find($id);
    			$data->user_id = $request->user_id;
    			$data->amount = $request->amount;
    			$data->save();
    
    	$notification = array(
    		'message' => 'Employee`s  Monthly Salary Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('account.salary.view')->with($notification);
	

    } // end method 


	
    public function AccountSalaryDetails($id){
    	$data['details'] = employee_salary::find($id);
		$data['salary_log'] = Employee_Salary_Log::where('salary_id',$data['details']->id)->get();

		
		$data['allData'] = employee_salary::where('user_id',$data['details']->user_id)->where('year',$data['details']->year)->get();


    	return view('admin.pages.account.employee_salary.employee_salary_details',$data);
 
    }




	
    public function AccountSalaryPicked($id){
    	$data['editData'] = employee_salary::find($id);
		$data['salary_log'] = Employee_Salary_Log::where('salary_id',$data['editData']->id)->get();
    	return view('admin.pages.account.employee_salary.employee_salary_pickup',$data);

    }  


    public function AccountSalaryPickedStore(Request $request,$id){

		$account = employee_salary::find($id);
		$salary = $account->amount; 
    	$salary_pickedup= $account->salary_amount_picked;
    	$present_fees = (float)$salary_pickedup+(float)$request->salary_picked; 
    	$account->salary_amount_picked = $present_fees;
		$account->salary_amount_left = (float)$salary-(float)$present_fees;
    	$account->save();


		$feesData = new Employee_Salary_Log();
    	$feesData->salary_id = $id;
        $feesData->user_id = $account->user_id;
    	$feesData->previous_salary =  $salary;
		$feesData->present_salary_picked =  $present_fees;
    	$feesData->salary_picked = $request->salary_picked;
		$feesData->salary_left = (float)$feesData->previous_salary-(float)$account->salary_amount_picked;
    	$feesData->effected_date = Carbon::now()->format('d F Y');
		$feesData->month = Carbon::now()->format('F Y');
		$feesData->year = Carbon::now()->format('Y');

    	$feesData->save();

    	
    	$notification = array(
    		'message' => 'Salary Amount Received Submitted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('account.salary.details',$id)->with($notification);

    }







	



	
    public function SalaryPickedDelete($id){




				$salary = Employee_Salary_Log::find($id);
			$increment = $salary->salary_picked;
			$invoice = $salary->salary_id;


			$acct_amount = employee_salary::where('id',$invoice)->first();
			$amount = $acct_amount->salary_amount_picked;
			$left_amount = $acct_amount->salary_amount_left;
			$new_amount = (float)$amount-(float)$increment;
			$new_bal = (float)$left_amount+(float)$increment;
			




			employee_salary::where('id',$invoice)->where('salary_amount_picked',$amount)->update([

				'salary_amount_picked' => $new_amount,
				'salary_amount_left' => $new_bal,
			
			]);
			


		Employee_Salary_Log::find($id)->delete();
	  
		$notification = array(
		  'message' => 'Salary Amount Picked has been DELETED Successfully...',
		  'alert-type' => 'error'
	  );
		return redirect()->back()->with($notification);







  

    } 

		




	
	public function AccountSalaryTrackPDF($id){
		$data['details'] = employee_salary::where('id',$id)->first();
		$data['salary_log'] = Employee_Salary_Log::where('salary_id',$data['details']->id)->get();
		$data['setting'] = SiteSetting::find(1);

	   return view('admin.pages.account.employee_salary.employee_salary_pdf', $data);
	    
	   }




	   	
	public function SalaryPickedTrackPDF($id){
		
		$data['salary_log'] = Employee_Salary_Log::where('id',$id)->first();
		$data['setting'] = SiteSetting::find(1);

	   return view('admin.pages.account.employee_salary.employee_salary_track_pdf', $data);

	    
	   }






       


    public function OtherCostView(){

    	$data['allData'] = expenses::all();
    	return view('admin.pages.account.other_cost.other_cost_view', $data);
    }


	public function OtherCostYearWise(Request $request){
    	
    	$year= $request->year;

    	$data['allData'] = expenses::where('year',$year)->get();

		return view('admin.pages.account.other_cost.other_cost_view', $data);

    } 




    public function OtherCostAdd(){


        $data['categories'] = expenses_category::all();
    	return view('admin.pages.account.other_cost.other_cost_add',$data);
    }
  

    public function OtherCostStore(Request $request){

		$term = $request->term;

		$category_id = $request->category_id;
		$date = date('Y-m-d', strtotime($request->date));
        $month = Carbon::parse($request->month)->format('F Y'); 
		$year = Carbon::parse($request->year)->format('Y');

		$check = expenses::where('date',$date)->where('month', $month)->where('year', $year)->where('term',$term)->where('category_id',$category_id)->first();

		if($check == null){

    	$cost = new expenses();
    	$cost->date = date('Y-m-d', strtotime($request->date));
        $cost->month = $month;
		$cost->year = $year;
        $cost->term = $request->term;
        $cost->category_id = $request->category_id;
    	$cost->amount_paid = $request->amount_paid;
    	$cost->invoice_amount = $request->invoice_amount;
        $cost->payment_mode = $request->payment_mode;
    	$cost->invoice_no = $request->invoice_no;
    	$cost->save();

    	$notification = array(
    		'message' => 'Expense Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('other.cost.view')->with($notification);

	}


	else{


		$notification = array(
		  'message' => 'EXPENSE RECORD ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }


    }  // end method


    public function OtherCostEdit($id){


		$data['categories'] = expenses_category::all();
        $data['editData'] = expenses::find($id);
    	return view('admin.pages.account.other_cost.other_cost_edit', $data);
    }



    public function OtherCostUpdate(Request $request, $id){

    	$cost = expenses::find($id);
    	$cost->date = date('Y-m-d', strtotime($request->date));
		$cost->term = $request->term;
        $cost->category_id = $request->category_id;
    	$cost->amount_paid = $request->amount_paid;
    	$cost->invoice_amount = $request->invoice_amount;
        $cost->payment_mode = $request->payment_mode;
    	$cost->invoice_no = $request->invoice_no;
    	$cost->save();

    	$notification = array(
    		'message' => 'Expense Updated Successfully',
    		'alert-type' => 'success' 
    	);

    	return redirect()->route('other.cost.view')->with($notification);

    } // end method 





    public function OtherCostAmountTrackStore(Request $request,$id){

    	$account = expenses::find($id); 
		$originalfee = $account->invoice_amount; 
    	$previous_amount = $account->amount_paid;
    	$present_amount = (float)$previous_amount+(float)$request->increment_amount; 
    	$account->amount_paid = $present_amount;
    	$account->save();

    	$feesData = new expenses_log();
    	$feesData->expense_id = $id;
		$feesData->invoice_no = $account->invoice_no;
    	$feesData->previous_amount = $previous_amount;
    	$feesData->increment_amount = $request->increment_amount;
    	$feesData->present_amount= $present_amount;
		$feesData->previous_balance = (float)$originalfee-(float)$previous_amount;
		$feesData->current_balance = (float)$originalfee-(float)$present_amount;
    	$feesData->date = Carbon::now()->format('d F Y');
        $feesData->month = Carbon::now()->format('F Y');
		$feesData->year = Carbon::now()->format('Y');
		$feesData->payment_mode = $request->payment_mode;
    	$feesData->save();

    	$notification = array(
    		'message' => 'Expense Payment Increment Made Successfully',
    		'alert-type' => 'success' 
    	);

    	return redirect()->back()->with($notification);

    }


    public function OtherCostAmountDetails($id){
    	$data['details'] = expenses::find($id);
    	$data['other_cost_log'] = expenses_log::where('expense_id',$data['details']->id)->get();

		
		$data['allData'] = expenses::where('category_id',$data['details']->category_id)->where('year',$data['details']->year)->get();


    	return view('admin.pages.account.other_cost.other_cost_details',$data);
 
    }
 


	public function PaymentAmountTrackPDF($id){
		
		$data['other_cost_log'] = expenses_log::where('id',$id)->first();
		$data['setting'] = SiteSetting::find(1);
	   return view('admin.pages.account.other_cost.payment_fee_track_pdf', $data);

	    
	   }
	


	public function OtherCostAmountTrackPDF($id){
		$data['details'] = expenses::where('id',$id)->first();
		$data['other_cost_log'] = expenses_log::where('expense_id',$data['details']->id)->get();
		$data['setting'] = SiteSetting::find(1);
	   return view('admin.pages.account.other_cost.other_cost_track__pdf', $data);

	    
	   }




	public function OtherCostAmountDetailsPDF($id){
		$data['details'] = expenses::where('id',$id)->first();
		$data['setting'] = SiteSetting::find(1);

	   return view('admin.pages.account.other_cost.other_cost_pdf',$data);

	    
	   }






	   public function ViewOtherCostCate()
	   {
		   $category = expenses_category::latest()->get();
		   return view('admin.pages.account.other_cost.other_cost_categories.view_cost_cate',compact('category'));
   
	   }
   
   
	   public function StoreOtherCostCate(Request $request)
	   {
		   $validateData = $request->validate([
			   'name' => 'required',
			  
		   ],[
			   'name.required' => 'Input Category Name',
   
		   ]);
   
		   expenses_category::insert([
			   'name' =>$request->name,
			  
		   ]);
   
		   $notification = array(
			   'message' => 'Expense Category Info ADDED Successfully...',
			   'alert-type' => 'success'
		   );
   
		   return redirect()->back()->with($notification);
   
   
	   }
   
   
	   public function EditOtherCostCate($id)
	   {
		   $category = expenses_category::findOrFail($id);
		   return view('admin.pages.account.other_cost.other_cost_categories.edit_cost_cate',compact('category'));
   
	   }
   
   
	   public function UpdateOtherCostCate(Request $request,$id)
	   {
		   $cate_id=$request->id;
   
		   expenses_category::findOrFail($cate_id)->update([
					   'name' =>$request->name,
				   
			   ]);
		   
			   $notification = array(
				   'message' => 'Expense Category Info UPDATED Successfully...',
				   'alert-type' => 'info'
			   );
			   return redirect()->route('other.cost.cate.view')->with($notification);
   
	  }
   
   
	  public function DeleteOtherCost($id)
	   {
		 
		   expenses_category::findOrFail($id)->delete();
		   expenses::where('category_id',$id)->delete();
   
		   $notification = array(
			   'message' => 'Expense Category Info DELETED Successfully...',
			   'alert-type' => 'error'
		   );
   
		   return redirect()->back()->with($notification);
   
	   }





 




}
