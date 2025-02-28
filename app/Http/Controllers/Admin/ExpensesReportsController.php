<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee_salary;
use App\Models\expenses;
use App\Models\expenses_category;
use Carbon\Carbon;
use App\Models\User;

class ExpensesReportsController extends Controller
{
    


    

/// EMPLOYEE`S SALARY REPORTS ACCOUNTS INFO SECTION ///


public function ViewEmployeeSalaryReports(){

	$users = User::where('status', 'active')->get();
	return view('admin.pages.account.employee_salary.employee_salary_report.view_reports',compact('users'));
}





public function EmployeeSalaryReportByMonth(Request $request){


	$month = Carbon::parse($request->month)->format('F Y');

	$other_costs_total = employee_salary::where('month',$month)->sum('salary_amount_picked');
	$other_costs_total2 = employee_salary::where('month',$month)->sum('salary_amount_left');
	$other_costs = employee_salary::select('month')->groupBy('month')->where('month',$month)->get();

	return view('admin.pages.account.employee_salary.employee_salary_report.employee_salary_month_reports',compact('other_costs','other_costs_total','other_costs_total2','month'));

	
} // end mehtod  






   public function EmployeeSalaryReportByYear(Request $request){

	$year = Carbon::parse($request->year)->format('Y');
    
	$other_costs_total = employee_salary::where('year',$year)->sum('salary_amount_picked');
	$other_costs_total2 = employee_salary::where('year',$year)->sum('salary_amount_left');
	$other_costs = employee_salary::select('month','year')->groupBy('month','year')->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();

	return view('admin.pages.account.employee_salary.employee_salary_report.employee_salary_year_reports',compact('other_costs','other_costs_total','other_costs_total2','year'));


} // end mehtod 





public function SalaryReportByYear(Request $request){

	$user_id = $request->user_id;
	$year = Carbon::parse($request->year)->format('Y');
    
	$other_costs_total = employee_salary::where('user_id',$user_id)->where('year',$year)->sum('salary_amount_picked');
	$other_costs_total2 = employee_salary::where('user_id',$user_id)->where('year',$year)->sum('salary_amount_left');
	$other_costs = employee_salary::select('user_id','month','year')->groupBy('user_id','month','year')->where('user_id',$user_id)->where('year',$year)->orderBy('created_at', 'asc')->groupBy('month')->get();
	return view('admin.pages.account.employee_salary.employee_salary_report.employee_salary_report',compact('other_costs','other_costs_total','other_costs_total2','year'));

} // end mehtod

















    /// Expenses REPORTS SECTION ///



    public function OtherCostReportView(){


        $categories = expenses_category::all();
        return view('admin.pages.account.other_cost.other_cost_reports.view_reports',compact('categories'));
    }
    
    
    public function OtherCostReporReportByTermMonth(Request $request){
        // return $request->all();
       
        $term = $request->term;
        $month = Carbon::parse($request->month)->format('F Y');
        $allData = expenses::where('month',$month)->where('term',$term)->get();
    
       
        return view('admin.pages.account.other_cost.other_cost_reports.show_reports',compact('allData','month'));
    
    
    
    } // end mehtod 
    
    
    
    
    
    public function OtherCostReporReportByTermYear(Request $request){
    
        $term = $request->term;
        $year= $request->year;
        $allData = expenses::where('year',$year)->where('term',$term)->get();
        
        
        return view('admin.pages.account.other_cost.other_cost_reports.show_term_year_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
    
    public function OtherCostReporReportByYear(Request $request){
    
    
    
          
        //$year_id = $request->year_id;
        $year= $request->year;
        $allData = expenses::where('year',$year)->get();
    
        
        return view('admin.pages.account.other_cost.other_cost_reports.show_year_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
     
    
    
    
    
    
    
    
    
    /// EXPENSES CATEGORIES ///
    
    
    public function OtherCostCateReporReportByTermMonth(Request $request){
        // return $request->all();
       
        $term = $request->term;
        $category_id = $request->category_id;
        $month = Carbon::parse($request->month)->format('F Y');
        $allData = expenses::where('month',$month)->where('term',$term)->where('category_id',$category_id)->get();
    
        
        return view('admin.pages.account.other_cost.fee_cate_report.fees_cate_show_reports_month',compact('allData','month'));
    
    
    
    } // end mehtod 
    
    
    
    
    
    public function OtherCostCateReporReportByTermYear(Request $request){
    
        $term = $request->term;
        $category_id = $request->category_id;
    
        $year= $request->year;
        $allData = expenses::where('year',$year)->where('term',$term)->where('category_id',$category_id)->get();
        

        return view('admin.pages.account.other_cost.fee_cate_report.fees_cate_show_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
    
    public function OtherCostCateReporReportByYear(Request $request){
    
        
         
        
        $category_id = $request->category_id;
        $year_id = $request->year_id;
              
        $year= $request->year;
        $allData = expenses::where('year',$year)->where('category_id',$category_id)->get();
    

        return view('admin.pages.account.other_cost.fee_cate_report.fees_cate_show_year_report',compact('allData','year'));
    
    } // end mehtod 
    




}
