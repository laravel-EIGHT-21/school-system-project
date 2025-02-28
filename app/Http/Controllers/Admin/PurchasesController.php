<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchase_category;
use App\Models\purchase_stocks;
use App\Models\purchases;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
{
    


    
     // Purchase items categories Section //

    
     public function ViewItemCateList()
     {
         $category = purchase_category::latest()->get();
         return view('admin.pages.general_items.item_categories.view_item_cate',compact('category'));
 
     }
 
 
     public function StoreItemCate(Request $request)
     {
         $validateData = $request->validate([
             'name' => 'required',
            
         ],[
             'name.required' => 'Input Category Name',
 
         ]);
 
         purchase_category::insert([
             'name' =>$request->name,
            
         ]);
  
         $notification = array(
             'message' => 'Items Category Info ADDED Successfully...',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
 
     }
 
 
     public function EditItemCate($id)
     {
         $category = purchase_category::findOrFail($id);
         return view('admin.pages.general_items.item_categories.edit_item_cate',compact('category'));
 
     }
 
 
     public function UpdateItemCate(Request $request,$id)
     {
         $cate_id=$request->id;
 
         purchase_category::findOrFail($cate_id)->update([
                     'name' =>$request->name,
                 
             ]);
         
             $notification = array(
                 'message' => 'Item Category Info UPDATED Successfully...',
                 'alert-type' => 'info'
             );
             return redirect()->route('general.item.cate.view')->with($notification);
 
    }
 

 
 
 
 
 
 
    //Purchase Items  Section
 
    
 
    public function ViewPurchaseItemList()
    {

		$product = purchases::latest()->get();
		return view('admin.pages.general_items.product_all',compact('product'));
   

    }

	
    public function AddPurchaseItem()
    {


		$category = purchase_category::all();
		return view('admin.pages.general_items.add_product',compact('category'));
    	
    }

	
    public function StorePurchaseItem(Request $request){

$name = $request->name;
$category_id = $request->category_id;

$check = purchases::where('name',$name)->where('category_id', $category_id)->first();

if($check == null){


    	DB::transaction(function() use($request){
    
			$medic = new purchases();
			$medic->name = $request->name;
			$medic->category_id = $request->category_id;
			$medic->created_at = Carbon::now();  	
 	    	 $medic->save();


    	});


    	$notification = array(
    		'message' => 'New Product Details Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('view.products')->with($notification);

			

	}

	else{


		$notification = array(
		  'message' => ' RECORD ALREADY EXISTS!!!',
		  'alert-type' => 'error'
		);
	  
		return redirect()->back()->with($notification);
	  
	  }


    } // End Method 




	public function EditPurchaseItem($id){
       

		$data['category'] = purchase_category::all();

	  $data['editData'] = purchases::find($id);
	 
	 
	 return view('admin.pages.general_items.edit_product',$data);
    	

    }


    public function UpdatePurchaseItem(Request $request, $id){
    
		$supply = purchases::find($id);
		$supply->name = $request->name;
		$supply->category_id = $request->category_id;
		$supply->updated_at = Carbon::now();
		  $supply->save(); 
	
    
    	$notification = array(
    		'message' => 'Item Details Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('view.products')->with($notification);


    }// END METHOD



 
 
 
 
 
 
 
     /// PURCHASES ///

	 public function PurchaseAll(){

        $allData = purchase_stocks::orderBy('date','desc')->orderBy('id','desc')->latest()->get();
        return view('admin.pages.general_items.purchase_all',compact('allData'));

    } // End Method 


    public function PurchaseAdd(){


        $items = purchases::all();
        return view('admin.pages.general_items.add_purchase',compact('items'));

    } // End Method 


    public function PurchaseStore(Request $request){

            $purchase = new purchase_stocks();
            $purchase->purchase_id = $request->purchase_id;
            $purchase->item_qty = $request->item_qty;
            $purchase->unit_price = $request->unit_price;
            $purchase->date = date('Y-m-d', strtotime($request->date));
            $purchase->invoice_no = $request->invoice_no;
            $purchase->supplier = $request->supplier;
            $purchase->term = $request->term;
            $purchase->total_price = (float)$request->unit_price * (float)$request->item_qty;
            $purchase->notes = $request->notes;
            $purchase->month = Carbon::now()->format('F Y');
            $purchase->year = Carbon::now()->format('Y');
            $purchase->save();



    $notification = array(
        'message' => 'Purchase Submitted Successfully', 
        'alert-type' => 'success'
    );
    return redirect()->route('purchase.all')->with($notification); 

    } // End Method 




    public function PurchaseDelete($id){

        purchase_stocks::findOrFail($id)->delete();

         $notification = array(
        'message' => 'Purchase Iteam Deleted Successfully', 
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification); 

    } // End Method 




    
    public function EditPurchaseInfo($id){


		$data['items'] = purchases::all();
        $data['editData'] = purchase_stocks::find($id);
    	return view('admin.pages.general_items.edit_purchase', $data);
    }



    public function UpdatePurchaseInfo(Request $request, $id){

    	$purchase = purchase_stocks::find($id);
        $purchase->purchase_id = $request->purchase_id;
        $purchase->item_qty = $request->item_qty;
        $purchase->unit_price = $request->unit_price;
        $purchase->date = date('Y-m-d', strtotime($request->date));
        $purchase->invoice_no = $request->invoice_no;
        $purchase->supplier = $request->supplier;
        $purchase->term = $request->term;
        $purchase->total_price = (float)$request->unit_price * (float)$request->item_qty;
        $purchase->notes = $request->notes;
    	$purchase->save();

    	$notification = array(
    		'message' => 'Purchased Stock Updated Successfully',
    		'alert-type' => 'success' 
    	);

    	return redirect()->route('purchase.all')->with($notification);

    } // end method 



	public function PurchaseInfoReport($id){
		$data['details'] = purchase_stocks::where('id',$id)->first();
		$data['setting'] = SiteSetting::find(1);

	   return view('admin.pages.general_items.purchase_pdf',$data);

	    
	   }



      


   public function GetProduct(Request $request){

    $category_id = $request->category_id; 
    $allProduct = purchases::where('category_id',$category_id)->get();
    return response()->json($allProduct);
} // End Mehtod 






public function GetStock(Request $request){
    $product_id = $request->product_id;
    $stock = purchases::where('id',$product_id)->first()->quantity;
    return response()->json($stock);

} // End Mehtod 














      




}
