<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\class_sessions;
use App\Models\fees_category;
use App\Models\fees_category_amount;


class StudentSetController extends Controller
{
    







    //Class Sessions
    
    public function ViewSessions(){
        $data['session'] = class_sessions::all();
        return view('admin.pages.setup.sessions.view_session',$data);
    
    }
    
    
    
    public function StoreSession(Request $request){
    
        $validatedData = $request->validate([
            'name' => 'required|unique:class_sessions,name',
            
        ]);
    
        $data = new class_sessions();
        $data->name = $request->name;
        $data->save();
    
        $notification = array(
            'message' => 'Class Session Inserted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('class.session.view')->with($notification);
    
    }
    
    
    
    public function EditSession($id){
    
        $sessions = class_sessions::findOrFail($id);
      
        return response()->json(array(
            'sessions' => $sessions,
        ));
    
    }
    
    
    public function UpdateSession(Request $request){
    
    
        $id = $request->input('id');
        $data = class_sessions::find($id);
     
     $validatedData = $request->validate([
            'name' => 'required|unique:class_sessions,name,'.$data->id
            
        ]);
    
        
        $data->name = $request->name;
        $data->save();
    
        $notification = array(
            'message' => 'Class Session Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('class.session.view')->with($notification);
        
    }
    
    




    
    // Fees_Category //

    public function ViewFeeCat(){
    	$data['allData'] = Fees_Category::all();
    	return view('admin.pages.setup.fee_category.view_fee_cat',$data);
 
    }


public function FeeCatStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:fees_categories,name',
	    		
	    	]);

	    	$data = new Fees_Category();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Fees Category Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('fee.category.view')->with($notification);

	    }



	 public function FeeCatEdit($id){



            $cate = Fees_Category::findOrFail($id);
      
            return response()->json(array(
                'cate' => $cate,
            ));

	    }



	 public function Fees_CategoryUpdate(Request $request){

        $id = $request->input('id');
	 $data = Fees_Category::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Fee Category Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.category.view')->with($notification);
    }


    // Fee Category Amount ///

    
    public function ViewFeeAmount(){
        // $data['allData'] = Fees_Category_Amount::all();
        $data['allData'] = Fees_Category_Amount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('admin.pages.setup.fee_amount.view_fee_amount',$data);
    }


    public function AddFeeAmount(){
    	$data['fee_categories'] = Fees_Category::all();
    	return view('admin.pages.setup.fee_amount.add_fee_amount',$data);
    }


    public function StoreFeeAmount(Request $request){



    	$countClass = count($request->class);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 

    			$fee_amount = new Fees_Category_Amount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class = $request->class[$i];
    			$fee_amount->amount = $request->amount[$i];
                $fee_amount->day_boarding = $request->day_boarding[$i];
    			$fee_amount->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Fee Amount Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.amount.view')->with($notification);

    }  // End Method 



    public function EditFeeAmount($fee_category_id){
    	$data['editData'] = Fees_Category_Amount::where('fee_category_id',$fee_category_id)->orderBy('id','asc')->get();
    	$data['fee_categories'] = Fees_Category::all();

    	return view('admin.pages.setup.fee_amount.edit_fee_amount',$data);

    }


    public function UpdateFeeAmount(Request $request,$fee_category_id){
    	if ($request->class == NULL) {
       
        $notification = array(
    		'message' => 'Sorry You do not select any class amount',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->class);
	Fees_Category_Amount::where('fee_category_id',$fee_category_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new Fees_Category_Amount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class = $request->class[$i];
    			$fee_amount->amount = $request->amount[$i];
                $fee_amount->day_boarding = $request->day_boarding[$i];
    			$fee_amount->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.amount.view')->with($notification);
    } // end Method 



 	public function DetailsFeeAmount($fee_category_id){
   $data['detailsData'] = Fees_Category_Amount::where('fee_category_id',$fee_category_id)->orderBy('id','asc')->get();

   return view('admin.pages.setup.fee_amount.details_fee_amount',$data);


 	}


















}
