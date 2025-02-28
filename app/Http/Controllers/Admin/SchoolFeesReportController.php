<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student_fees;
use App\Models\fees_category;
use App\Models\expenses;
use App\Models\purchase_stocks;
use App\Models\students;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use AfricasTalking\SDK\AfricasTalking;


class SchoolFeesReportController extends Controller
{




    
/// STUDENT FEES ACCOUNTS INFO SECTION ///


public function ViewStudentFeesReports(){


	$fee_categories = Fees_Category::all();
	return view('admin.pages.report.incomes.view_reports',compact('fee_categories'));
}


public function ReportByTerm(Request $request){
	// return $request->all();
   
	$term = $request->term;
	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('term',$term)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('term','year','month')->groupBy('term','year','month')->where('year',$year)->where('term',$term)->orderBy('created_at', 'asc')->groupBy('month')->get();

	
	return view('admin.pages.report.incomes.show_reports',compact('allData','year','student_fee_total'));


 
} // end mehtod 



public function ReportByTermMonths(Request $request){


	$term = $request->term;
	$month = Carbon::parse($request->month)->format('F Y');	 

	$student_fee_total = student_fees::where('month',$month)->where('term',$term)->sum('fee_amount');
	$allData = student_fees::select('term','month')->groupBy('term','month')->where('month',$month)->where('term',$term)->get();

	
	return view('admin.pages.report.incomes.show_reports_month',compact('allData','month','student_fee_total'));

} // end mehtod 


   public function ReportByFeeYears(Request $request){


	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('term','month')->groupBy('term','month')->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();

	return view('admin.pages.report.incomes.show_year_report',compact('allData','year','student_fee_total'));


} // end mehtod 







/// SCHOOL CLASSES FEES ACCOUNTS INFO SECTION ///


public function SchoolClassReportByTerm(Request $request){
	// return $request->all();
   
	$term = $request->term;
	$class = $request->class;
	

	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('term',$term)->where('class',$class)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('class','term','month')->groupBy('class','term','month')->where('term',$term)->where('class',$class)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();


	return view('admin.pages.report.incomes.class_fees_report.class_show_reports',compact('allData','year','student_fee_total'));



} // end mehtod 





public function SchoolClassReportByTermMonths(Request $request){


	$term = $request->term; 
	$class = $request->class;
	$month = Carbon::parse($request->month)->format('F Y');	 

	
	
	$student_fee_total = student_fees::where('term',$term)->where('class',$class)->where('month',$month)->sum('fee_amount');
	$allData = student_fees::select('class','term')->groupBy('class','term')->where('term',$term)->where('class',$class)->where('month',$month)->get();

	return view('admin.pages.report.incomes.class_fees_report.class_show_reports_month',compact('allData','month','student_fee_total'));

} // end mehtod 




   public function SchoolClassReportByFeeYears(Request $request){

	$class = $request->class;
	
	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('class',$class)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('class','term','month')->groupBy('class','term','month')->where('class',$class)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();

	
	return view('admin.pages.report.incomes.class_fees_report.class_show_year_report',compact('allData','year','student_fee_total'));

} // end mehtod 











/// SCHOOL FEES CATEGORIES  INFO SECTION ///


public function FeesCateReportByTerm(Request $request){
	// return $request->all();
   
	$term = $request->term;
	$fee_category_id = $request->fee_category_id;

	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('term',$term)->where('fee_category_id',$fee_category_id)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('fee_category_id','term','month')->groupBy('fee_category_id','term','month')->where('term',$term)->where('fee_category_id',$fee_category_id)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();

	return view('admin.pages.report.incomes.fee_cate_report.fees_cate_show_reports',compact('allData','year','student_fee_total'));



} // end mehtod 



public function FeesCateReportByTermMonths(Request $request){


	$term = $request->term; 
	$fee_category_id = $request->fee_category_id;
	$month = Carbon::parse($request->month)->format('F Y');	 

	$student_fee_total = student_fees::where('term',$term)->where('fee_category_id',$fee_category_id)->where('month',$month)->sum('fee_amount');
	$allData = student_fees::select('fee_category_id','term')->groupBy('fee_category_id','term')->where('term',$term)->where('fee_category_id',$fee_category_id)->where('month',$month)->get();

	return view('admin.pages.report.incomes.fee_cate_report.fees_cate_show_reports_month',compact('allData','month','student_fee_total'));

} // end mehtod 



   public function FeesCateReportByFeeYears(Request $request){ 

	$fee_category_id = $request->fee_category_id;
		
	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('fee_category_id',$fee_category_id)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('fee_category_id','term','month')->groupBy('fee_category_id','term','month')->where('fee_category_id',$fee_category_id)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();


	return view('admin.pages.report.incomes.fee_cate_report.fees_cate_show_year_report',compact('allData','year','student_fee_total'));

} // end mehtod 












/// SCHOOL CLASS FEES CATEGORIES  INFO SECTION ///


public function ClassFeesCateReportByTerm(Request $request){
	// return $request->all();
   
	$term = $request->term;
	$class = $request->class;
	$fee_category_id = $request->fee_category_id;
	
	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('term',$term)->where('class',$class)->where('fee_category_id',$fee_category_id)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('class','fee_category_id','term','month')->groupBy('class','fee_category_id','term','month')->where('term',$term)->where('class',$class)->where('fee_category_id',$fee_category_id)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();


	return view('admin.pages.report.incomes.class_fees_cate_report.class_fee_cate_show_reports',compact('allData','year','student_fee_total'));



} // end mehtod 



public function ClassFeesCateReportByTermMonths(Request $request){


	$term = $request->term; 
	$class = $request->class;
	$fee_category_id = $request->fee_category_id;
	$month = Carbon::parse($request->month)->format('F Y');	
	

	$student_fee_total = student_fees::where('term',$term)->where('class',$class)->where('fee_category_id',$fee_category_id)->where('month',$month)->sum('fee_amount');
	$allData = student_fees::select('class','fee_category_id','term')->groupBy('class','fee_category_id','term')->where('term',$term)->where('class',$class)->where('fee_category_id',$fee_category_id)->where('month',$month)->get();

	return view('admin.pages.report.incomes.class_fees_cate_report.class_fee_cate_show_reports_month',compact('allData','month','student_fee_total'));

} // end mehtod 



   public function ClassFeesCateReportByFeeYears(Request $request){

	$class = $request->class;
	$fee_category_id = $request->fee_category_id;

	$year= Carbon::parse($request->year)->format('Y');
	$student_fee_total = student_fees::where('fee_category_id',$fee_category_id)->where('class',$class)->where('year',$year)->sum('totalfee_amount');
	$allData = student_fees::select('class','fee_category_id','term','month')->groupBy('class','fee_category_id','term','month')->where('fee_category_id',$fee_category_id)->where('class',$class)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();


	return view('admin.pages.report.incomes.class_fees_cate_report.class_fee_cate_show_year_report',compact('allData','year','student_fee_total'));

} // end mehtod 















	   // Charts Section//

	   
	   public function Charts()
	   {    	 
   
			
		   
		   $fees = student_fees::select(DB::raw('SUM(fee_amount) AS fees,month'))->groupBy('month')->orderBY('created_at')->get();
		   
		   $month = [];
		   $fees_total = [];
		   
		   foreach($fees as $row)
		   {
		   
			  $month[] = $row['month'];
			  $fees_total[] = $row['fees'];
		   
		   }
		   
		   
		   
				   
		   $expense = expenses::select(DB::raw('SUM(amount_paid) AS amount,month'))->groupBy('month')->orderBY('created_at')->get();
		   
		   $month_expense = [];
		   $expense_amount = [];
   
		   foreach($expense as $row)
		   {
		   
			  $month_expense[] = $row['month'];
			  $expense_amount[] = $row['amount'];
		   
		   }
	   
		      
		   				   
   $purchase = purchase_stocks::select(DB::raw('SUM(total_price) AS price,month'))->groupBy('month')->orderBY('created_at')->get();
		   
		    
   $month_purchase = [];
   $purchase_amount = [];
   foreach($purchase->toArray() as $row)
   {
   
	  $month_purchase[] = $row['month'];
	  $purchase_amount[] = $row['price'];
   
   }
   
   
   
   return view('admin.pages.charts.charts_view',compact('month','fees_total','month_expense','expense_amount','month_purchase','purchase_amount'));
   
   
   
	   }
   
   
		   
	   public function financialyear(Request $request){
   
   
		   $year= Carbon::parse($request->year)->format('Y');
			
		   
		   $fees = student_fees::select(DB::raw('SUM(fee_amount) AS fees,month'))->groupBy('month')->orderBY('created_at')->where('year',$year)->get();
		   
		   
		   $month = [];
		   $fees_total = [];
   
		   foreach($fees as $row)
		   {
		   
			  $month[] = $row['month'];
			  $fees_total[] = $row['fees'];
		   
		   }
		   
		   
		   
				   
		   $expense = expenses::select(DB::raw('SUM(amount_paid) AS amount,month'))->groupBy('month')->orderBY('created_at')->where('year',$year)->get();
		   
		   $month_expense = [];
		   $expense_amount = [];
		   
		   foreach($expense as $row)
		   {
		   
			  $month_expense[] = $row['month'];
			  $expense_amount[] = $row['amount'];
		   
		   }



		   
		   				   
   $purchase = purchase_stocks::select(DB::raw('SUM(total_price) AS price,month'))->groupBy('month')->orderBY('created_at')->where('year',$year)->get();
		   
		   
   $month_purchase = [];
   $purchase_amount = [];
   foreach($purchase->toArray() as $row)
   {
   
	  $month_purchase[] = $row['month'];
	  $purchase_amount[] = $row['price'];
   
   }
	   
	   
   
		   return view('admin.pages.charts.charts_view',compact('month','fees_total','month_expense','expense_amount','month_purchase','purchase_amount'));
   
	   
	   } // end mehtod 
	   
   
   
   
   
   
   
   
   
	   
	   public function CurrentCharts()
	   {    	
   

      
		   $fees = student_fees::select(DB::raw('SUM(fee_amount) AS fees,month'))->groupBy('month')->orderBY('created_at')->get();
   
		   $months = [];
		   $fees_total = [];   
   foreach($fees->toArray() as $row)
   {
   
	  $months[] = $row['month'];
	  $fees_total[] = $row['fees'];
   
   }
   
   
   
		   
   $expense = expenses::select(DB::raw('SUM(amount_paid) AS amount,month'))->groupBy('month')->orderBY('created_at')->get();
   
    
   $month_expense = [];
   $expense_amount = [];
   foreach($expense->toArray() as $row)
   {
   
	  $month_expense[] = $row['month'];
	  $expense_amount[] = $row['amount'];
   
   }




   
		   				   
   $purchase = purchase_stocks::select(DB::raw('SUM(total_price) AS amount,month'))->groupBy('month')->orderBY('created_at')->get();
		   
		    
   $month_purchase = [];
   $purchase_amount = [];
   foreach($purchase->toArray() as $row)
   {
   
	  $month_purchase[] = $row['month'];
	  $purchase_amount[] = $row['amount'];
   
   }
   
   
   
   return view('admin.pages.charts.charts_view01',compact('months','fees_total','month_expense','expense_amount','month_purchase','purchase_amount'));
   
   
    
	   }
   
   
   
   
   
   
	   
	   public function financialyearterms(Request $request){
   

   
		   $term = $request->term;
		   $year= Carbon::parse($request->year)->format('Y');
			
		   
		   $fees = student_fees::select(DB::raw('SUM(fee_amount) AS fees,month'))->groupBy('month')->orderBY('created_at')->where('term',$term)->where('year',$year)->get();
		   
		   $months = [];
		   $fees_total = [];
		   foreach($fees->toArray() as $row)
		   {
		   
			  $months[] = $row['month'];
			  $fees_total[] = $row['fees'];
		   
		   }
		   
		   
		   
				   
		   $expense = expenses::select(DB::raw('SUM(amount_paid) AS amount,month'))->groupBy('month')->orderBY('created_at')->where('term',$term)->where('year',$year)->get();
		   
		   $month_expense = [];
		   $expense_amount = [];
		   foreach($expense->toArray() as $row)
		   {
		   
			  $month_expense[] = $row['month'];
			  $expense_amount[] = $row['amount'];
		   
		   }
	   



		   				   
		   $purchase = purchase_stocks::select(DB::raw('SUM(total_price) AS amount,month'))->groupBy('month')->orderBY('created_at')->where('term',$term)->where('year',$year)->get();
		   
		   $month_purchase = [];
		   $purchase_amount = [];
		   foreach($purchase->toArray() as $row)
		   {
		   
			  $month_purchase[] = $row['month'];
			  $purchase_amount[] = $row['amount'];
		   
		   }
	   


	   
   
		   return view('admin.pages.charts.charts_view01',compact('months','fees_total','month_expense','expense_amount','month_purchase','purchase_amount'));
   
	   
	   } // end mehtod 
	   
   





	

	
	   public function SendSMSView(){
    	$allData = Students::where('status',1)->get();
    	return view('admin.pages.account.student_fee.student_parent_filter_view',compact('allData'));
    }




    public function StudentsClassWise(Request $request){

    	$class = $request->class;
    	$allData = Students::where('class',$class)->where('status',1)->get();

    	return view('admin.pages.account.student_fee.student_parent_filter_view',compact('allData'));

    } 



	
	public function SendSmsMessage2(Request $request)
    {


		$message = $request->input('message');
		$mobile2 = $request->input('mobile2');
		$encodeMessage = urlencode($message);
		$postData = $request->all();

		$mobileNumber = implode('',$postData[$mobile2]);

		$arr = str_split($mobileNumber,'13');
		$mobiles = implode(",",$arr);

		
// Set your app credentials
$username = "sandbox";
$apiKey = "atsk_97b1c71928b8f2e612be270733652ea6a69d5c9452fc9d33ec71eb8e46afef13d73c051f";

// Initialize the SDK
$AT= new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms= $AT->sms();


// Set your shortCode or senderId
$from = "akilibit";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $mobiles,
        'message' => $encodeMessage,
        'from'    => $from
    ]);


	$notification = array(
		'message' => 'SMS Messages have been Successfully Sent...!',
		'alert-type' => 'success'
	);
	
	
	return back()->with($notification);

} catch (\Exception $e) {
    echo "Error: ".$e->getMessage();
}

	
		


      
   }





    
}
