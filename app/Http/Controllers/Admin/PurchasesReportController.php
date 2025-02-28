<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchase_stocks;
use App\Models\purchases;
use Carbon\Carbon;

class PurchasesReportController extends Controller
{
    






    public function ViewPurchaseReports(){


        $products = purchases::all();
        return view('admin.pages.general_items.purchases_reports.view_reports',compact('products'));
    }
    
    
    public function PurchasesReportByTermMonth(Request $request){
       
        $term = $request->term;
        $month = Carbon::parse($request->month)->format('F Y');
        $allData = purchase_stocks::where('month',$month)->where('term',$term)->get();
    
       
        return view('admin.pages.general_items.purchases_reports.show_reports',compact('allData','month'));
    
    
    
    } // end mehtod 
    
    
    
    
    
    public function PurchasesReportByTermYear(Request $request){
    
        $term = $request->term;
        $year= $request->year;
        $allData = purchase_stocks::where('year',$year)->where('term',$term)->get();
        
        
        return view('admin.pages.general_items.purchases_reports.show_term_year_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
    
    public function PurchasesReportByYear(Request $request){
    

        $year= $request->year;
        $allData = purchase_stocks::where('year',$year)->get();
    
        
        return view('admin.pages.general_items.purchases_reports.show_year_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
     
    
    
    
    
    
    
    
    
    /// purchases CATEGORIES ///
    
    
    public function PurchaseItemReportByTermMonth(Request $request){
        // return $request->all();
       
        $term = $request->term;
        $purchase_id = $request->purchase_id;
        $month = Carbon::parse($request->month)->format('F Y');
        $allData = purchase_stocks::where('month',$month)->where('term',$term)->where('purchase_id',$purchase_id)->get();
    
        
        return view('admin.pages.general_items.purchase_items_report.purchase_items_show_reports_month',compact('allData','month'));
    
    
    
    } // end mehtod 
    
    
    
    
    
    public function PurchaseItemReportByTermYear(Request $request){
    
        $term = $request->term;
        $purchase_id = $request->purchase_id;
    
        $year= $request->year;
        $allData = purchase_stocks::where('year',$year)->where('term',$term)->where('purchase_id',$purchase_id)->get();
        

        return view('admin.pages.general_items.purchase_items_report.purchase_items_show_reports',compact('allData','year'));
    
    } // end mehtod 
    
    
    
    
    public function PurchaseItemReportByYear(Request $request){
    
        
         
        
        $purchase_id = $request->purchase_id;
              
        $year= $request->year;
        $allData = purchase_stocks::where('year',$year)->where('purchase_id',$purchase_id)->get();
    

        return view('admin.pages.general_items.purchase_items_report.purchase_items_show_year_report',compact('allData','year'));
    
    } // end mehtod 







}
