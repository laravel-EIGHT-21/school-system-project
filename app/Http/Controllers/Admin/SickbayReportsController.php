<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicineCategory;
use App\Models\Medicines;
use App\Models\medicines_stocks;
use App\Models\MedicalSupplies;
use App\Models\MedicalSuppliesStock;
use Carbon\Carbon;

class SickbayReportsController extends Controller
{
    



    
   public function ViewMedicineStock() 
   {

   $allData = medicines_stocks::all();
   return view('admin.pages.sickbay.view_medicinestock',compact('allData'));

   }



   public function AddMedicineStock()
   {
       $data['medicines'] = Medicines::all();

       return view('admin.pages.sickbay.add_newMedicine',$data);
   }


   public function StoreMedicineStock(Request $request){

       $medicinestock = new medicines_stocks();
       $medicinestock->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
       $medicinestock->mfg_date = date('Y-m-d',strtotime($request->mfg_date));		
       $medicinestock->expire_date = date('Y-m-d',strtotime($request->expire_date));
       $medicinestock->invoice_no= $request->invoice_no;	
       $medicinestock->supplier = $request->supplier;
       $medicinestock->medicine_id = $request->medicine_id;
       $medicinestock->term = $request->term;
       $medicinestock->medicine_qty = $request->medicine_qty;
       $medicinestock->quantity_type = $request->quantity_type;
       $medicinestock->unit_price= $request->unit_price;
       $medicinestock->buying_price= (float)$request->unit_price * (float)$request->medicine_qty;
       $medicinestock->notes = $request->notes;		
       $medicinestock->purchase_month = Carbon::now()->format('F Y');
       $medicinestock->purchase_year = Carbon::now()->format('Y');
        $medicinestock->save();



       $notification = array(
           'message' => 'Medicine Stock Info Added Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('medicine.stock.view')->with($notification);

   } // End Method 


   public function EditMedicineStock($id){
      
       $data['medicines'] = Medicines::all();

       $data['editData'] = medicines_stocks::find($id);
       // dd($data['editData']->toArray());
       return view('admin.pages.sickbay.edit_medicinestock',$data);

   }


   public function UpdateMedicineStock(Request $request, $id){
   
       $medicinestock = medicines_stocks::find($id);
       $medicinestock->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
       $medicinestock->mfg_date = date('Y-m-d',strtotime($request->mfg_date));		
       $medicinestock->expire_date = date('Y-m-d',strtotime($request->expire_date));
       $medicinestock->invoice_no= $request->invoice_no;	
       $medicinestock->supplier = $request->supplier;
       $medicinestock->medicine_id = $request->medicine_id;
       $medicinestock->term = $request->term;
       $medicinestock->medicine_qty = $request->medicine_qty;
       $medicinestock->quantity_type = $request->quantity_type;
       $medicinestock->unit_price= $request->unit_price;
       $medicinestock->buying_price= (float)$request->unit_price * (float)$request->medicine_qty;
       $medicinestock->notes = $request->notes;	
        $medicinestock->save();
        

       $notification = array(
           'message' => 'Medicine-Stock Info Updated Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('medicine.stock.view')->with($notification);


   }// END METHOD







   

    /// MEDICAL SUPPLIES SECTION ///

    

    public function ViewMedicalSuppliesStock()
    {

    $allData = MedicalSuppliesStock::all();
    return view('admin.pages.sickbay.medical_supplies.view_medical_supplystock',compact('allData'));

    }



    public function AddMedicalSuppliesStock()
    {
		$data['medic_supply'] = MedicalSupplies::all();

    	return view('admin.pages.sickbay.medical_supplies.add_medical_supplystock',$data);
    }


    public function StoreMedicalSuppliesStock(Request $request){
    	

    	$supplies_stock = new MedicalSuppliesStock(); 
        $supplies_stock->medic_equipement_id = $request->medic_equipement_id;
        $supplies_stock->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
        $supplies_stock->invoice_no= $request->invoice_no;
        $supplies_stock->supplier = $request->supplier;
        $supplies_stock->term = $request->term;
    	$supplies_stock->equipment_qty = $request->equipment_qty;
        $supplies_stock->equipment_qty_type = $request->equipment_qty_type;
    	$supplies_stock->unit_price= $request->unit_price;
        $supplies_stock->buying_price= (float)$request->unit_price * (float)$request->equipment_qty;
        $supplies_stock->notes = $request->notes;		
		$supplies_stock->purchase_month = Carbon::now()->format('F Y');
    	$supplies_stock->purchase_year = Carbon::now()->format('Y');

 	    $supplies_stock->save();

    	


    	$notification = array(
    		'message' => 'Medical Supply-Stock Info Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('medical.supplies.stock.view')->with($notification);

    } // End Method 


    public function EditMedicalSuppliesStock($id){
       
		$data['medic_supply'] = MedicalSupplies::all();

    	$data['editData'] = MedicalSuppliesStock::find($id);
    	
    	return view('admin.pages.sickbay.medical_supplies.edit_medical_supplystock',$data);

    }

 
	public function UpdateMedicalSuppliesStock(Request $request, $id){
    
    	$supplies_stock = MedicalSuppliesStock::find($id);
        $supplies_stock->medic_equipement_id = $request->medic_equipement_id;
        $supplies_stock->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
        $supplies_stock->invoice_no= $request->invoice_no;
        $supplies_stock->supplier = $request->supplier;
        $supplies_stock->term = $request->term;
    	$supplies_stock->equipment_qty = $request->equipment_qty;
        $supplies_stock->equipment_qty_type = $request->equipment_qty_type;
    	$supplies_stock->unit_price= $request->unit_price;
        $supplies_stock->buying_price= (float)$request->unit_price * (float)$request->equipment_qty;
        $supplies_stock->notes = $request->notes;		
 	    $supplies_stock->save();
         

    	$notification = array(
    		'message' => 'Medical Supply-Stock Info Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('medical.supplies.stock.view')->with($notification);


    }// END METHOD














///Medical Purchases Reports///

	

public function ViewPurchasedMedicineReports(){


    return view('admin.pages.report.purchases.medical_purchases.medicines.view_reports');
}



public function PurchasedMedicineReportByDate(Request $request){

    $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = medicines_stocks::whereBetween('purchase_date',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        
    return view('admin.pages.report.purchases.medical_purchases.medicines.show_daily_reports',compact('allData','start_date','end_date'));

} // end mehtod 





public function PurchasedMedicineReportByMonthly(Request $request){

    $month = Carbon::parse($request->purchase_month)->format('F Y');  
        $allData = medicines_stocks::where('purchase_month',$month)->get();

    return view('admin.pages.report.purchases.medical_purchases.medicines.show_month_reports',compact('allData','month'));

} // end mehtod 





   public function PurchasedMedicineReportByYears(Request $request){

    $year = Carbon::parse($request->purchase_year)->format('Y');   
        $allData = medicines_stocks::where('purchase_year',$year)->get();

    return view('admin.pages.report.purchases.medical_purchases.medicines.show_yearly_reports',compact('allData','year'));

} // end mehtod 





public function ViewPurchasedMedicalSuppliesReports(){


    return view('admin.pages.report.purchases.medical_purchases.medical_supplies.view_reports');
} 





 
public function PurchasedMedicalSuppliesReportByDate(Request $request){


    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
    $allData = MedicalSuppliesStock::whereBetween('purchase_date',[$sdate,$edate])->get();


    $start_date = date('Y-m-d',strtotime($request->start_date));
    $end_date = date('Y-m-d',strtotime($request->end_date));


    return view('admin.pages.report.purchases.medical_purchases.medical_supplies.show_daily_reports',compact('allData','start_date','end_date'));

} // end mehtod 




public function PurchasedMedicalSuppliesReportByMonths(Request $request){



    $month = Carbon::parse($request->purchase_month)->format('F Y');  
    $allData = MedicalSuppliesStock::where('purchase_month',$month)->get();


    return view('admin.pages.report.purchases.medical_purchases.medical_supplies.show_reports',compact('allData','month'));

} // end mehtod 







   public function PurchasedMedicalSuppliesReportByYears(Request $request){


    $year = Carbon::parse($request->purchase_year)->format('Y');   
    $allData = MedicalSuppliesStock::where('purchase_year',$year)->get();

    return view('admin.pages.report.purchases.medical_purchases.medical_supplies.show_year_reports',compact('allData','year'));

} // end mehtod 

















    
}
