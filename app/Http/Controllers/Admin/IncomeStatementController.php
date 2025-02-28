<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchase_stocks;
use App\Models\expenses;
use App\Models\student_fees;
use Carbon\Carbon;


class IncomeStatementController extends Controller
{



    
       
  public function ViewIncomeStatementReports(){  
   
  return view('admin.pages.report.incomes.income_statement.income_statement_get');


  } 




  
  public function IncomeStatementReportByTerm(Request $request){


    $term = $request->term;
    $year = $request->year;

    
    $schoolfees_check = student_fees::where('term',$term)->where('year',$year)->first();
     


    if($schoolfees_check == true)
{



$schoolfees = student_fees::select('term','class','year')->groupBy('term','class','year')->where('term',$term)->where('year',$year)->latest()->get();

$expensefees = expenses::select('category_id','term','year')->groupBy('category_id','term','year')->where('term',$term)->where('year',$year)->latest()->get();

$purchases = purchase_stocks::select('purchase_id','term','year')->groupBy('purchase_id','term','year')->where('term',$term)->where('year',$year)->latest()->get();

$total_fees_paid= student_fees::where('term',$term)->where('year',$year)->sum('fee_amount');

$total_expense_paid = expenses::where('term',$term)->where('year',$year)->sum('amount_paid');

$total_price_paid = purchase_stocks::where('term',$term)->where('year',$year)->sum('total_price');


$school_details = student_fees::with(['student'])->where('term',$term)->where('year',$year)->first();


return view('admin.pages.report.incomes.income_statement.term_income_statement_report',compact('school_details','total_fees_paid','total_expense_paid','schoolfees','expensefees','purchases','total_price_paid'));


}else{

    $notification = array(
    'message' => 'NO DATA FOR RESULTS ENTERED !',
    'alert-type' => 'error'
    );
    
    return redirect()->back()->with($notification);
      
  } 

}

    
  public function IncomeStatementReportByYears(Request $request){
  

    $year = $request->year;
        
    $schoolfees_check = student_fees::where('year',$year)->first();
     


    if($schoolfees_check == true)
{



$schoolfees = student_fees::select('term','year')->groupBy('term','year')->where('year',$year)->get();

$expensefees = expenses::select('category_id','year','term')->groupBy('category_id','year','term')->where('year',$year)->latest()->get();

$purchases = purchase_stocks::select('purchase_id','year','term')->groupBy('purchase_id','year','term')->where('year',$year)->latest()->get();


$total_price_paid = purchase_stocks::where('year',$year)->sum('total_price');


$total_fees_paid= student_fees::where('year',$year)->sum('fee_amount');

$total_expense_paid= expenses::where('year',$year)->sum('amount_paid');

$school_details = student_fees::with(['student'])->where('year',$year)->first();
 

  return view('admin.pages.report.incomes.income_statement.year_income_statement_report',compact('total_fees_paid','school_details','total_expense_paid','schoolfees','expensefees','purchases','total_price_paid'));



}else{

    $notification = array(
    'message' => 'NO DATA FOR RESULTS ENTERED !',
    'alert-type' => 'error'
    );
    
    return redirect()->back()->with($notification);
      
  } 

  
      

  } 




}
