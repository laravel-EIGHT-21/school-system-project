<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\students;
use App\Models\student_fees;
use App\Models\student_fees_log;
use App\Models\fees_category_amount;
use App\Models\fees_category;
use App\Models\SiteSetting;

class SchoolFeesController extends Controller
{






    public function StudentFeeView(){


    	$data['allData'] = student_fees::latest()->get();
        $data['fee_categories'] = Fees_Category::all();
    	
    	return view('admin.pages.account.student_fee.student_fee_view',$data);
    }



	public function StudentClassFees(Request $request){

    	$year = $request->year;
    	$class = $request->class;
		$term = $request->term;
        $fee_category_id = $request->fee_category_id;
        $data['fee_categories'] = Fees_Category::all();
	
    	$data['allData'] = student_fees::with(['student'])->where('year',$year)->where('class',$class)->where('term',$term)->where('fee_category_id',$fee_category_id)->latest()->get();
		return view('admin.pages.account.student_fee.student_fee_view',$data);

    } 





    
    public function GetStudentFee(){
    	
    	 
    	$allData = Students::where('status',1)->get();
    	return view('admin.pages.account.student_fee.get_student_fee',compact('allData'));
 
    }


    public function StudentClassWise(Request $request){

    	$class = $request->class;
    	$allData = Students::where('class',$class)->where('status',1)->get();

    	return view('admin.pages.account.student_fee.get_student_fee',compact('allData'));

    } 


    public function StudentFeeAdd($id){

		$data['fee_categories'] = Fees_Category::all();
		$data['allData'] = Students::where('id',$id)->first();

    	return view('admin.pages.account.student_fee.student_fee_add',$data);

    }




	
	public function StudentAddFees($id){

        $data['fee_categories'] = Fees_Category::all();
		
		$data['allData'] = Student_Fees::with(['student'])->find($id);

    	return view('admin.pages.account.student_fee.student_add_FEES',$data);

    }




    
  public function GetFeeCategoryAmount(Request $request){

	$fee_category_id = $request->fee_category_id;
	$class = $request->class; 
    $day_boarding = $request->day_boarding;

	$stock = Fees_Category_Amount::where('fee_category_id',$fee_category_id)->where('class',$class)->where('day_boarding',$day_boarding)->first()->amount;
	return response()->json($stock);

} // End Mehtod 


 


  

    public function StudentFeeStore(Request $request,$id){


		$class = $request->class;
		$term = $request->term;
		$fee_category_id = $request->fee_category_id;

		$check = student_fees::where('class',$class)->where('term',$term)->where('student_id',$id)->where('fee_category_id',$fee_category_id)->first();


			      
		if($check == null){

		DB::transaction(function() use($request,$id){


    			$data = new student_fees();
    			$data->class = $request->class;
				$data->term = $request->term;
                $data->day_boarding = $request->day_boarding;
				$data->student_id = $id;
				$data->fee_category_id = $request->fee_category_id;
				$data->payment_mode = $request->payment_mode;
    			$data->fee_amount = $request->fee_amount;
				$data->totalfee_amount = $request->totalfee_amount;
				$data->invoice_no = mt_rand(10000000,99999999);
				$data->date = Carbon::today()->format('Y-m-d');
				$data->month = Carbon::today()->format('F Y');
				$data->year = Carbon::now()->format('Y');
    			$data->save();





    		});

    	$notification = array(
    		'message' => 'Student Fees Information Added Successfully...!',
    		'alert-type' => 'success'
    	);

		

    	return redirect()->route('student.fee.view')->with($notification);

		

	}



	else{


		$notification = array(
		  'message' => 'STUDENT`s  FEES  RECORD  ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }	

    	

    } // end method 



	
    public function StudentFeeEdit($id){

		$data['fee_categories'] = Fees_Category::all();

		$data['editData'] = Student_Fees::with(['student'])->where('id',$id)->first();
    	return view('admin.pages.account.student_fee.student_fee_edit',$data);

    }


	
  
	public function StudentFeeUpdate(Request $request,$id){
  
		DB::transaction(function() use($request,$id){

			
			$class = $request->class;
			$day_boarding = $request->day_boarding;
			$fee_category_id = $request->fee_category_id;

			$schoolfee = Fees_Category_Amount::where('fee_category_id',$fee_category_id)->where('class',$class)->where('day_boarding',$day_boarding)->first();

			$originalfee = $schoolfee->amount;
 
    			$data = student_fees::where('id',$id)->first();    	 
    			$data->class = $request->class;
				$data->term = $request->term;
                $data->day_boarding = $request->day_boarding;
				$data->fee_category_id = $request->fee_category_id;
				$data->payment_mode = $request->payment_mode;
    			$data->fee_amount = $request->fee_amount;
				$data->totalfee_amount = $originalfee;
				
    			$data->save();





    		});

		
		$notification = array(
		'message' => 'Student`s School Fees  Update Successfully', 
		'alert-type' => 'success'
		); 
		
		return redirect()->back()->with($notification);
		
		
		}
	


		public function StudentFeesDelete($id)
		{
		  
			student_fees::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Pupil`s Fees Payment DELETED Successfully...',
				'alert-type' => 'error'
			);
	
			return redirect()->back()->with($notification);
	
		}


 
		public function StudentFeeTrackStore(Request $request,$id){
	
			$account = student_fees::find($id);
			$originalfee = $account->totalfee_amount; 
			$previous_fees = $account->fee_amount; 
			$present_fees = (float)$previous_fees+(float)$request->increment_fees; 
			$account->fee_amount = $present_fees;
			$account->save();
	
			$feesData = new student_fees_log();
			$feesData->fees_pay_id = $id;
			$feesData->student_id = $account->student_id;
			$feesData->invoice_no = $account->invoice_no;
			$feesData->previous_fees = $previous_fees;
			$feesData->increment_fees = $request->increment_fees;
			$feesData->present_fees= $present_fees;
			$feesData->previous_balance = (float)$originalfee-(float)$previous_fees;
			$feesData->current_balance = (float)$originalfee-(float)$present_fees;
			$feesData->effected_date = Carbon::today()->format('Y-m-d');
			$feesData->payment_mode = $request->payment_mode;
			$feesData->save();
	
			$notification = array(
				'message' => 'Student Fees Paid Updated Successfully',
				'alert-type' => 'success'
			);
	
			return redirect()->back()->with($notification);
	
		}
		
	
			
			public function StudentIncrementDelete($id)
			{
		  
				$fees = Student_Fees_Log::find($id);
				$increment = $fees->increment_fees;
				$invoice = $fees->fees_pay_id;
			  
				
				$acct_amount = student_fees::where('id',$invoice)->first();
				$amount = $acct_amount->fee_amount;
				$new_amount = (float)$amount-(float)$increment;
				
	
				 student_fees::where('id',$invoice)->where('fee_amount',$amount)->update([
	
					'fee_amount' => $new_amount,
	
				]);
	
	
			  Student_Fees_Log::find($id)->delete();
		   
				$notification = array(
				  'message' => 'Payment has been DELETED Successfully...',
				  'alert-type' => 'error'
			  );
				return redirect()->back()->with($notification);
	
		  
			}


		
public function StudentFeeDetails($id){


	$data['details'] = student_fees::with(['student'])->find($id);
	$data['student_fees_log'] = student_fees_log::where('fees_pay_id',$data['details']->id)->get();
	
	
	$data['allData'] = student_fees::with('student')->where('class',$data['details']->class)->where('year',$data['details']->year)->where('student_id',$data['details']->student_id)->latest()->get();
	
	
	return view('admin.pages.account.student_fee.student_fee_details',$data);
	
	}
	 
	 
		
		public function PaymentFeeTrackPDF($id){
			
			$data['student_fees_log'] = student_fees_log::where('id',$id)->first();
			$data['setting'] = SiteSetting::find(1);
		   return view('admin.pages.account.student_fee.payment_fee_track_pdf', $data);

			
		   }
		
	
	
	
		public function StudentFeesTrackPDF($id){
			$data['details'] = student_fees::with(['student'])->where('id',$id)->first();
			$data['student_fees_log'] = student_fees_log::where('fees_pay_id',$data['details']->id)->get();
			$data['setting'] = SiteSetting::find(1);
		   return view('admin.pages.account.student_fee.student_fees_track__pdf', $data);
			
		   }
	
	
	
	
		public function StudentFeesDetailsPDF($id){
			$data['details'] = student_fees::with(['student'])->where('id',$id)->first();
			$data['setting'] = SiteSetting::find(1);
		   return view('admin.pages.account.student_fee.student_fees_pdf', $data);
			
		   }
	




		   	
    public function StudentFeeFiltrationView(){

		$data['fee_categories'] = Fees_Category::all();

    	$data['allData'] = student_fees::latest()->get();
    	
    	return view('admin.pages.account.student_fee.student_fee_filter_view',$data);
    }



	public function StudentFeesFilter(Request $request){


    	$year= $request->year;
    	$class= $request->class;
		$term= $request->term;
		//$fee_category_id= $request->fee_category_id;

		$min = $request->fee_amount1; 
        $max = $request->fee_amount2;
       
		$fee_total = student_fees::with(['student'])->select('student_id','year','class','term','day_boarding')->groupBy('student_id','year','class','term','day_boarding')->where('year',$year)->where('class',$class)->where('term',$term)->sum('totalfee_amount');
	
		$allData = student_fees::with(['student'])->where('year',$year)->where('class',$class)->where('term',$term)->whereBetween('fee_amount',[$min,$max])->get();


		return view('admin.pages.account.student_fee.students_fee_filter_report',compact('allData','fee_total'));
		


    } 





	///SchoolFees Financial Statements///


	

public function SchoolFeesStatementView(){

	$data['allData'] = Students::where('status', 1)->get();
	return view('admin.pages.report.incomes.students_fees_report.schoolfees_statement_view',$data);

}




public function SchoolFeesClassWise(Request $request){
 
	$class = $request->class;
	 
	$data['allData'] = Students::where('status', 1)->where('class',$class)->get();
	return view('admin.pages.report.incomes.students_fees_report.schoolfees_statement_view',$data);

} 




public function SchoolFeesWise($id){

	$data['allData'] = students::where('id',$id)->first();

	return view('admin.pages.report.incomes.students_fees_report.view_fees_statement_reports',$data);

}






public function SchoolFeesStatementReport(Request $request, $student_id)
{


	$year = $request->year;
	$class = $request->class;
	
	
$singleStudent = student_fees::where('year',$year)->where('class',$class)->where('student_id',$student_id)->first();
if ($singleStudent == true) {

$allFees = student_fees::with(['student'])->where('year',$year)->where('class',$class)->where('student_id',$student_id)->get();
	
return view('admin.pages.report.incomes.students_fees_report.show_fees_statement_report_pdf',compact('allFees'));



}else{

	$notification = array(
		'message' => ' Student`s Fees Details Not Available !',
		'alert-type' => 'error'
	);

	return redirect()->back()->with($notification);
   }




}


	





}
