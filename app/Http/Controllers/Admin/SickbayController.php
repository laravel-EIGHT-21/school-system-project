<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\students;
use App\Models\school_clinic; 
use App\Models\MedicineCategory;
use App\Models\Medicines;
use App\Models\MedicalSupplies;
use Carbon\Carbon;

class SickbayController extends Controller
{
    

    
    public function GetStudents(){
    	$allData = Students::where('status',1)->get();
    	return view('admin.pages.sickbay.students_medic.getstudents',compact('allData'));
 
    }

    public function StudentClassMedic(Request $request){
    	$class = $request->class;
    	$allData = Students::where('class',$class)->where('status',1)->get();
    	return view('admin.pages.sickbay.students_medic.getstudents',compact('allData'));

    } 


    public function IssueMedication($id) 
    {


        $data['medicines'] = Medicines::where('medical_status', 'Available')->get();

        $data['allData'] = Students::where('id',$id)->first();
    	return view('admin.pages.sickbay.students_medic.add_students_medic',$data);

    }
 



     // Issued Books 
	public function IssuedMedics(){
        
		$medic_issued = school_clinic::select('clinic_no','student_id','date','year','class','term','medic_status')->groupBy('clinic_no','student_id','date','year','class','term','medic_status')->where('medic_status','On Medication')->latest()->get();
		
		return view('admin.pages.sickbay.students_medic.view_students_medic',compact('medic_issued'));

	} // end mehtod 


    // Issued Books Details 
	public function IssuedMedicDetails($clinic_no){



 
		$medic_issued = school_clinic::with('student')->where('clinic_no',$clinic_no)->first();
    	$medics = school_clinic::with('medicine')->where('clinic_no',$clinic_no)->orderBy('id','DESC')->get();
    	return view('admin.pages.sickbay.students_medic.medic_details',compact('medic_issued','medics'));


	} // end method 



    // Returned Books
	public function FinishedMedic(){

		$medic1_issued = school_clinic::select('clinic_no','student_id','date','year','class','term','medic_status')->groupBy('clinic_no','student_id','date','year','class','term','medic_status')->where('medic_status','Finished Medication')->latest()->get();

		return view('admin.pages.sickbay.students_medic.view_finishedDosage',compact('medic1_issued'));

	} // end mehtod


    public function StartToFinish($clinic_no){
		
        school_clinic::where('clinic_no',$clinic_no)->update([
			'medic_status' => 'Finished Medication',
		]);
  
        $notification = array(
              'message' => 'Medication Dosage Has Been Completed Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('finished.medics.view')->with($notification);
  
  
      } // end method






    public function ViewMedicine()
    {

    $allData = Medicines::all();
    return view('admin.pages.sickbay.view_medicine',compact('allData'));

    }


    


    public function AddMedicine()
    {

    $categories = MedicineCategory::all();
    return view('admin.pages.sickbay.addMedicine',compact('categories'));

    }




    


    public function StoreMedicine(Request $request){
    	DB::transaction(function() use($request){
    
    	$medic = new Medicines();
    	$medic->name = $request->name;
		$medic->medicine_category_id = $request->medicine_category_id;
		$medic->medical_status = $request->medical_status;
    
 	        $medic->save();


    	});


    	$notification = array(
    		'message' => 'New Medicine Details Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('medicine.info.view')->with($notification);

    } // End Method 


	public function EditMedicine($id){
       
    	$data['categories'] = MedicineCategory::all();

    	$data['editData'] = Medicines::find($id);
    	// dd($data['editData']->toArray());
    	return view('admin.pages.sickbay.editmedicine',$data);

    }


    public function UpdateMedicine(Request $request, $id){
    
    	$medic = Medicines::find($id);
        $medic->name = $request->name;
		$medic->medicine_category_id = $request->medicine_category_id;
		$medic->medical_status = $request->medical_status;

  	    $medic->save(); 
         

    	$notification = array(
    		'message' => 'Medicine Details Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('medicine.info.view')->with($notification);


    }// END METHOD



    public function inactiveMedic($id)
    { 
            Medicines::findOrFail($id)->update(['status' => 0]);
            $notification = array(
                'message' => 'Medicine Unavailable...',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

    }


    public function activeMedic($id)
    {
        Medicines::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Medicine Aavailable...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


	public function StoreIssuedMedic(Request $request,$student_id){
		DB::transaction(function() use($request,$student_id){

			$startOfYear = Carbon::now()->startOfYear();
			$endOfYear = Carbon::now()->endOfYear();
			 $students = school_clinic::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
			$count = 'Clinic_No-' .count($students) + 1;
	

			$medicineCount = count($request->medicine_id);
			if ($medicineCount !=NULL) {
			for ($i=0; $i <$medicineCount ; $i++) { 
			$medic_issued = new school_clinic();
			$medic_issued->student_id = $student_id; 
			$medic_issued->clinic_no = Carbon::now()->toDateString() . '-' . $count;
			$medic_issued->year = $request->year; 
			$medic_issued->class = $request->class;
			$medic_issued->term = $request->term;
			$medic_issued->illness = $request->illness;
			$medic_issued->date = Carbon::now()->format('d F Y');
			$medic_issued->month = Carbon::now()->format('F Y');
			$medic_issued->year = Carbon::now()->format('Y');
			$medic_issued->medic_status='On Medication';
			$medic_issued->start_date = $request->start_date;
			$medic_issued->end_date = $request->end_date;
			$medic_issued->diagnostics = $request->diagnostics;
			$medic_issued->medicine_id = $request->medicine_id[$i];
			$medic_issued->dosage = $request->dosage[$i];
			$medic_issued->save();

		} // End For Loop
    }// End If Condition

			
		});
	
			$notification = array(
			'message' => 'Medication Has Been Issued Successfully',
			'alert-type' => 'success'
			);

    	return redirect()->route('issued.medics.view')->with($notification);

    } // End Method 






    
    public function ViewMedicCategory()
    {
        $category = MedicineCategory::latest()->get();
        return view('admin.pages.sickbay.medicine_categories.view_medicine_cate',compact('category'));

    }



    public function StoreMedicCategory(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
           
        ],[
            'name.required' => 'Input Category Name',

        ]);

        MedicineCategory::insert([
            'name' =>$request->name,
           
        ]);

        $notification = array(
            'message' => 'Medicine Category Info ADDED Successfully...',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }


    public function EditMedicCategory($id)
    {
        $category = MedicineCategory::findOrFail($id);
        return view('admin.pages.sickbay.medicine_categories.edit_medicine_cate',compact('category'));

    }


    public function UpdateMedicCategory(Request $request,$id)
    {
        $cate_id=$request->id;

        MedicineCategory::findOrFail($cate_id)->update([
                    'name' =>$request->name,
                
            ]);
        
            $notification = array(
                'message' => 'Medicine Category Info UPDATED Successfully...',
                'alert-type' => 'info'
            );
            return redirect()->route('medicine.category.view')->with($notification);

   }




///Medical Supplies


public function ViewMedicalSupplyList()
{

$allData = MedicalSupplies::all();
return view('admin.pages.sickbay.medical_supplies.view_medical_supply',compact('allData'));

}


   
public function StoreMedicalSupplies(Request $request){
    DB::transaction(function() use($request){

    $medic = new MedicalSupplies();
    $medic->name = $request->name;
    $medic->status = $request->status;
     $medic->save();


    });


    $notification = array(
        'message' => 'Medical Supply Details Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('medical.supply.list.view')->with($notification);

} // End Method 


public function EditMedicalSupplies($id){
   
    $data['editData'] = MedicalSupplies::find($id);
    // dd($data['editData']->toArray());
    return view('admin.pages.sickbay.medical_supplies.editmedical_supply',$data);

}


public function UpdateMedicalSupplies(Request $request, $id){

    $medic = MedicalSupplies::find($id);
    $medic->name = $request->name;
    $medic->status = $request->status;

      $medic->save(); 
     

    $notification = array(
        'message' => 'Medical Supply Details Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('medical.supply.list.view')->with($notification);


}// END METHOD






    
}
