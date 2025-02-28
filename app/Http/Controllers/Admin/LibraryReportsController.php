<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bookstocks;
use Carbon\Carbon;

class LibraryReportsController extends Controller
{
    




    
	
	
		
		public function BookStockReport(){
			return view('admin.pages.library.books.bookstock_report');
		}// End Method 
	
	
		public function BookStockReportPdf(Request $request){
	
			$sdate = date('Y-m-d',strtotime($request->start_date));
			$edate = date('Y-m-d',strtotime($request->end_date));
			$allData = bookstocks::whereBetween('purchase_date',[$sdate,$edate])->where('status','1')->get();
	
	
			$start_date = date('Y-m-d',strtotime($request->start_date));
			$end_date = date('Y-m-d',strtotime($request->end_date));
			return view('admin.pages.general_items.pdf.bookstock_report_pdf',compact('allData','start_date','end_date'));
	
		}// End Method 
	
	
		
		public function MonthlyBookStockPdf(Request $request){
	
	
			$month = Carbon::parse($request->purchase_month)->format('F Y');  
			$allData = bookstocks::where('purchase_month',$month)->where('status','1')->get();
	
			return view('admin.pages.general_items.pdf.month_bookstock_report_pdf',compact('allData','month'));
	
		}// End Method 
	
	
	
			
		public function YearlyBookStockPdf(Request $request){
	
			$year = Carbon::parse($request->purchase_year)->format('Y');   
			$allData = bookstocks::where('purchase_year',$year)->where('status','1')->get();
	
			return view('admin.pages.general_items.pdf.year_bookstock_report_pdf',compact('allData','year'));
	
		}// End Method 







}
