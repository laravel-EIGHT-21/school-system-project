<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book_category;
use App\Models\books;
use App\Models\authors;
use App\Models\bookstocks;
use App\Models\IssuedBook;
use App\Models\students;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class LibraryController extends Controller
{
    


    
////Books Authors///

    public function viewAuthors()
    {
        $author = authors::latest()->get();
        return view('admin.pages.library.authors.view_author',compact('author'));

    }


    public function viewAuthorDetails()
    {
        $author = authors::latest()->get();
        return view('admin.pages.library.authors.view_author_details',compact('author'));

    }

    public function StoreAuthor(Request $request)
    {
        $validateData = $request->validate([
            'name' =>  'required|unique:authors,name',
           
        ],[
            'name.required' => 'Input Author Name',

        ]);

        authors::insert([
            'name' =>$request->name,
           
        ]);

        $notification = array(
            'message' => 'Author Info ADDED Successfully...',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }


    public function EditAuthor($id)
    {
        $author = authors::findOrFail($id);
        return view('admin.pages.library.authors.edit_author',compact('author'));

    }


    public function UpdateAuthor(Request $request,$id)
    {
        $author_id=$request->id;

                authors::findOrFail($author_id)->update([
                    'name' =>$request->name,
                
            ]);
        
            $notification = array(
                'message' => 'Author Info UPDATED Successfully...',
                'alert-type' => 'info'
            );
            return redirect()->route('authors.view')->with($notification);

   }




   ////Book Categories ////

   
   public function ViewCate()
   {
       $category = book_category::latest()->get();
       return view('admin.pages.library.category.view_category',compact('category'));

   }


   public function ViewCateDetails()
   {
       $category = book_category::latest()->get();
       return view('admin.pages.library.category.view_category',compact('category'));

   }



   public function StoreCate(Request $request)
   {
       $validateData = $request->validate([
           'name' =>  'required|unique:categories,name',
          
       ],[
           'name.required' => 'Input Category Name',

       ]);

       book_category::insert([
           'name' =>$request->name,
          
       ]);

       $notification = array(
           'message' => 'Category Info ADDED Successfully...',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);


   }


   public function EditCate($id)
   {
       $category = book_category::findOrFail($id);
       return view('admin.pages.library.category.edit_cate',compact('category'));

   }


   public function UpdateCate(Request $request,$id)
   {
       $cate_id=$request->id;

               book_category::findOrFail($cate_id)->update([
                   'name' =>$request->name,
               
           ]);
       
           $notification = array(
               'message' => 'Category Info UPDATED Successfully...',
               'alert-type' => 'info'
           );
           return redirect()->route('category.view')->with($notification);

  }


  public function DeleteCate($id)
   {
     
       book_category::findOrFail($id)->delete();

       $notification = array(
           'message' => 'Category Info DELETED Successfully...',
           'alert-type' => 'error'
       );

       return redirect()->back()->with($notification);

   }














   ////Books List///



		public function ViewBookDetails()
		{

		$allData = books::latest()->get();
		return view('admin.pages.library.books.view_books',compact('allData'));

		}




		
		public function ViewBookStock()
		{
			$allData = BookStocks::orderBy('id','desc')->latest()->get();
			return view('admin.pages.library.books.bookstock_view',compact('allData'));
	
		}
	
	
		public function AddBookStock()
		{
		
			$data['books'] = books::where('status', 1)->orderBy('id','ASC')->get();

			$data['categories'] = book_category::all();
			return view('admin.pages.library.books.add_bookstock',$data);
		}
	
	
	
		
	
		public function StoreBookStock(Request $request){
	

						 $purchase = new BookStocks();
						 $purchase->purchase_date = date('Y-m-d', strtotime($request->purchase_date));
						 $purchase->invoice_no = $request->invoice_no;
						 $purchase->supplier = $request->supplier;
			 
						 $purchase->book_id = $request->book_id;
						 $purchase->book_qty = $request->book_qty;
						 $purchase->unit_price = $request->unit_price;
						 $purchase->buying_price = ((float)$request->unit_price*(float)$request->book_qty);
						 $purchase->purchase_month = Carbon::now()->format('F Y');
						 $purchase->purchase_year = Carbon::now()->format('Y');
						 $purchase->status = '0';
						 $purchase->save();

			 
				 $notification = array(
					'message' => 'Book Stock Info Added Successfully',
					'alert-type' => 'success'
				);
		
				return redirect()->route('library.bookstock.view')->with($notification);
				 
	
	
	
	
	
		} // End Method 
	
	
	
	
	
	
		public function BookStockDelete($id){
	
			bookstocks::findOrFail($id)->delete();
	
			 $notification = array(
			'message' => 'Book Stock Details Deleted Successfully', 
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification); 
	
		} // End Method 
	
	
	
	
	
	
		public function BookStockPending(){
	
			$allData = bookstocks::orderBy('id','desc')->where('status','0')->get();
			return view('admin.pages.library.books.bookstock_pending',compact('allData'));
		}// End Method 
	
	
		public function BookStockApprove($id){
	
			$books_qtty = bookstocks::findOrFail($id);
			$stock_qty = $books_qtty->book_qty;
			$book_qty = books::where('id',$books_qtty->book_id)->first();
			$qtty = $book_qty->quantity;
			$quantity = (float)$stock_qty+(float)$qtty;
			$book_qty->quantity = $quantity;
	
			if($book_qty->save()){
	
				bookstocks::findOrFail($id)->update([
					'status' => '1',
				]);
	
				 $notification = array(
			'message' => 'Book Stock Approved Successfully', 
			'alert-type' => 'success'
			  );
		return redirect()->route('library.bookstock.view')->with($notification); 
	
			}
	
		}// End Method 






        
	public function AddBook()
    {
        $data['authors'] = authors::all();
    	$data['categories'] = book_category::all();
    	return view('admin.pages.library.books.addbook',$data);
    }


	public function StoreBook(Request $request){
    	DB::transaction(function() use($request){
    
    	$book = new books();
    	$book->name = $request->name;
		$book->category_id = $request->category_id;
		$book->author_id = $request->author_id;
		$book->add_date = date('Y-m-d',strtotime($request->add_date));
    	$book->status= 1; 


		$manager = new ImageManager(new Driver());
		$image = $request->file('image');
		$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
		$new_img = $manager->read($request->file('image'));
		$new_img->toJpeg(80)->save(base_path('public/upload/book_images/'.$name_gen));
		$book['image'] = $name_gen;
		
 	        $book->save();


    	});


    	$notification = array(
    		'message' => 'New Book Details Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('books.view')->with($notification);

    } // End Method 


	public function EditBook($id){
        $data['authors'] = authors::all();
    	$data['categories'] = book_category::all();

    	$data['editData'] = books::find($id);
    	// dd($data['editData']->toArray());
    	return view('admin.pages.library.books.editbook',$data);

    }



	public function UpdateBook(Request $request, $id){
    
    	$book = books::find($id);
		$book->name = $request->name;
		$book->category_id = $request->category_id;
		$book->author_id = $request->author_id;
		$book->add_date = date('Y-m-d',strtotime($request->add_date));

		if ($request->file('image')) {

			$manager = new ImageManager(new Driver());
			@unlink(public_path('upload/book_images/'.$book->image));
			$image = $request->file('image');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			$new_img = $manager->read($request->file('image'));
			$new_img->toJpeg(80)->save(base_path('public/upload/book_images/'.$name_gen));
			$book['image'] = $name_gen;
		
		  }    

	
 	    $book->save();
         

    	$notification = array(
    		'message' => 'Book Details Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('books.view')->with($notification);


    }// END METHOD



	public function DeleteBook($id){
    	$book = books::find($id);
    	$book->delete();

    	$notification = array(
    		'message' => 'Book Details Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('books.view')->with($notification);
    }



	public function inactiveBook($id)
    { 
            books::findOrFail($id)->update(['status' => 0]);
            $notification = array(
                'message' => 'Book Status Deactivated...',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

    }


    public function activeBook($id)
    {
        books::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Book status Activated...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }









    ///Library Issued Books Scetion////



    
      // Issued Books 
	public function ViewIssuedBooks(){
        
		$issued_books = Issuedbook::where('issue_status','Issued')->latest()->get();
		
		return view('admin.pages.library.issuedbook.view_issuedbooks',compact('issued_books'));

	} // end mehtod 


    // Issued Books Details 
	public function IssuedBooksDetails($id){


		$data['student'] = Students::where('status',1)->get();
		
		$issued_book = Issuedbook::with('student')->where('id',$id)->first();
    	$bookItem = Issuedbook::with('book')->where('id',$id)->orderBy('id','DESC')->get();
    	return view('admin.pages.library.issuedbook.issued_book_details',compact('issued_book','bookItem'));

	} // end method 


    // Returned Books
	public function Return_Books(){

		$return_books = Issuedbook::where('issue_status','Returned All')->latest()->get();
		return view('admin.pages.library.issuedbook.view_returnedbooks',compact('return_books'));

	} // end mehtod 




//Less books returned
	public function LessBooksReturn(){
        
		$issued_books = Issuedbook::where('issue_status','Returned Less')->latest()->get();
		
		return view('admin.pages.library.issuedbook.view_returnedLess',compact('issued_books'));

	} // end mehtod 




		
//Less books returned
public function DamageBooksReturned(){
        
	$issued_books = Issuedbook::where('issue_status','Damaged Returned')->latest()->get();
	
	return view('admin.pages.library.issuedbook.view_damagedbooks',compact('issued_books'));

} // end mehtod 


 

    public function IssuedToReturned($id){
   
		$issued_book = Issuedbook::where('id',$id)->get();
		foreach ($issued_book as $item) {
		books::where('id',$item->book_id)->update(['quantity'=>DB::raw('quantity +'.$item->issued_quantity)]);

			} 
		
        Issuedbook::findOrFail($id)->update([
			'return_date' => Carbon::now()->format('d F Y'),
			'issue_status' => 'Returned All',
		]);
  
        $notification = array(
              'message' => 'Book Has Been Returned Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('library.books-issued.view')->with($notification);
  
  
      } // end method


    public function GetStudents(){


    	$data['allData'] = Students::where('status',1)->get();
    	return view('admin.pages.library.issuedbook.view_getstudents',$data);
 
    }

    public function StudentClasses(Request $request){

    	$class = $request->class;
	
    	 
    	$data['allData'] = Students::where('status', 1)->where('class',$class)->get();
    	return view('admin.pages.library.issuedbook.view_getstudents',$data);

    } 



    public function IssueBook($id)
    {

        ///$data['students'] = Students::where('status',1)->get();

        $data['books'] = books::where('status', 1)->get();

        $data['allData'] = Students::where('id',$id)->first();
    	return view('admin.pages.library.issuedbook.add_issuebook',$data);


    }



		public function LessBookReturned($id){
		$data['editData'] = Issuedbook::find($id);
		return view('admin.pages.library.issuedbook.returnedless_books',$data);

		}



		public function LessBookQTY(Request $request,$id)
		{

		Issuedbook::findOrFail($id)->update([
		'less_qty' => $request->less_qty,
		]);

		$notifications = array(
		'message' => 'Number of Books Returned Submitted Successfully..!',
		'alert-type' => 'primary'
		);

			return redirect()->route('less-returnedbooks')->with($notifications);
			//return redirect()->back()->with($notifications);


		}


		public function ReturnedLessBooks($id){
     
			Issuedbook::findOrFail($id)->update([
				'return_date' => Carbon::now()->format('d F Y'),
				'issue_status' => 'Returned Less',
			]);
	  
			$notification = array(
				  'message' => 'Less Quantity of Books Returned',
				  'alert-type' => 'success'
			  );
	  
			  return redirect()->route('less-returnedbooks')->with($notification);
			}




			    // LessBooks Returned  Details 
	public function LessBooksReturnedDetails($id){


		$data['student'] = Students::where('status',1)->get();
		
		$issued_book = Issuedbook::with('student')->where('id',$id)->first();
    	$bookItem = Issuedbook::with('book')->where('id',$id)->orderBy('id','DESC')->get();
    	return view('admin.pages.library.issuedbook.lessbooks_returned_details',compact('issued_book','bookItem'));

	} // end method 





			public function ReturnedlessToReturned($id){
   
				$issued_book = Issuedbook::where('id',$id)->get();
				foreach ($issued_book as $item) {
				books::where('id',$item->book_id)->update(['quantity'=>DB::raw('quantity +'.$item->less_qty)]);
		
					} 

					

					Issuedbook::findOrFail($id)->update([
						'issue_status' => 'Less-Books Submitted',
					]);
				
				$notification = array(
					  'message' => 'Returned Books Submitted Successfully',
					  'alert-type' => 'success'
				  );
		  
				  return redirect()->route('less.books.submitted')->with($notification);
		  
		  
			  } // end method


			  public function RecoveredBooksToReturned($id){
   
				$issued_book = Issuedbook::where('id',$id)->get();
				foreach ($issued_book as $item) {
				books::where('id',$item->book_id)->update(['quantity'=>DB::raw('quantity +'.$item->books_recovered)]);
		
					} 


					Issuedbook::findOrFail($id)->update([
						'recovered_status' => 1,
					]);

		 
				$notification = array(
					  'message' => 'Recovered Books Submitted Successfully',
					  'alert-type' => 'success'
				  );
		  
				  return redirect()->back()->with($notification);
		  
		  
			  } // end method



			  

		public function RecoveredBooksForm($id){
			$data['editData'] = Issuedbook::find($id);
			return view('admin.pages.library.issuedbook.recovered_books_form',$data);
	
			}
	
	
	
			public function RecoveredBooksTotal(Request $request,$id)
			{
	
			Issuedbook::findOrFail($id)->update([
				'recovered_date' => Carbon::now()->format('d F Y'),
			'books_recovered' => $request->books_recovered,
			]);
	
			$notifications = array(
			'message' => 'Number of Books Recovered Submitted Successfully..!',
			'alert-type' => 'primary'
			);
	
				return redirect()->route('less.books.submitted')->with($notifications);
				//return redirect()->back()->with($notifications);
	
	
			}






			public function ReturnedDamagedBooks($id){
     
				Issuedbook::findOrFail($id)->update([
					'return_date' => Carbon::now()->format('d F Y'),
					'issue_status' => 'Damaged Returned',
				]);
		  
				$notification = array(
					  'message' => 'Damaged Books Returned !',
					  'alert-type' => 'success'
				  );
		  
				  return redirect()->route('damaged-booksreturned')->with($notification);
				}




				
			    // Damaged Books  Returned  Details 
	public function DamagedBooksReturnedDetails($id){


		$data['student'] = Students::where('status',1)->get();
		
		$issued_book = Issuedbook::with('student')->where('id',$id)->first();
    	$bookItem = Issuedbook::with('book')->where('id',$id)->orderBy('id','DESC')->get();
    	return view('admin.pages.library.issuedbook.damagedbooks_returned_details',compact('issued_book','bookItem'));

	} // end method 




	public function ReturnedDamagedToReturned($id){
   
		$issued_book = Issuedbook::where('id',$id)->get();
		foreach ($issued_book as $item) {
		books::where('id',$item->book_id)->update(['quantity'=>DB::raw('quantity +'.$item->good_books_cond)]);

			} 


			Issuedbook::findOrFail($id)->update([
				'issue_status' => 'Non-Damaged Returned',
			]);
		
		$notification = array(
			  'message' => 'Non-Damaged Books Submitted Successfully',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('nondamaged.books.submitted')->with($notification);
  
  
	  } // end method







	  public function DamagedBooksReturnedForm($id){
		$data['editData'] = Issuedbook::find($id);
		return view('admin.pages.library.issuedbook.damagedbooks_form',$data);

		}



		public function NonDamagedQTY(Request $request,$id)
		{

		Issuedbook::findOrFail($id)->update([
		'good_books_cond' => $request->good_books_cond,
		]);

		$notifications = array(
		'message' => 'Number of Books Not Damaged Submitted Successfully..!',
		'alert-type' => 'primary'
		);

			return redirect()->route('damaged-booksreturned')->with($notifications);
			//return redirect()->back()->with($notifications);


		}





			// Non-Damaged Books Submitted Books 
			public function ViewNonDamagedBooks(){

			$issued_books = Issuedbook::where('issue_status','Non-Damaged Returned')->latest()->get();

			return view('admin.pages.library.issuedbook.submitted_non_damagedbooks',compact('issued_books'));

			} // end mehtod 



			// Damaged Books  Returned  Details 
			public function NonDamagedDetails($id){


			$data['student'] = Students::where('status',1)->get();


			$issued_book = Issuedbook::with('student')->where('id',$id)->first();
			$bookItem = Issuedbook::with('book')->where('id',$id)->orderBy('id','DESC')->get();
			return view('admin.pages.library.issuedbook.nondamaged_books_submitted_details',compact('issued_book','bookItem'));

			} // end method 





			// Less Book Submitted Books 
			public function ViewLessBooksSubmitted(){

			$issued_books = Issuedbook::where('issue_status','Less-Books Submitted')->latest()->get();

			return view('admin.pages.library.issuedbook.less_booksubmitted',compact('issued_books'));

			} // end mehtod 



			// Damaged Books  Returned  Details 
			public function LessBooksSubmittedDetails($id){


			$data['student'] = Students::where('status',1)->get();


			$issued_book = Issuedbook::with('student')->where('id',$id)->first();
			$bookItem = Issuedbook::with('book')->where('id',$id)->orderBy('id','DESC')->get();
			return view('admin.pages.library.issuedbook.lessbooks_submitted_details',compact('issued_book','bookItem'));

			} // end method 			
		




    public function StoreIssuedBook(Request $request,$id){
		DB::transaction(function() use($request,$id){

		
			$issuebook = new IssuedBook(); 
			$issuebook->student_id = $id;
			$issuebook->class = $request->class;
			$issuebook->book_id = $request->book_id;
			$issuebook->term = $request->term;
			$issuebook->issued_quantity = $request->issued_quantity; 
			$issuebook->issue_date = Carbon::now()->format('d F Y');
			$issuebook->issue_month = Carbon::now()->format('F Y');
			$issuebook->issue_year = Carbon::now()->format('Y');
			$issuebook->issue_status= 'Issued';
			$issuebook->return_day = $request->return_day;
			$issuebook->save(); 


			$books_qtty = $issuebook->issued_quantity;

		 $book_qty = books::where('id',$issuebook->book_id)->first();
		$qtty = $book_qty->quantity;
		$quantity = (float)$qtty-(float)$books_qtty;
		$book_qty->quantity = $quantity;
		 $book_qty->save();

			 
		});
	
			$notification = array(
			'message' => 'Book Has Been Issued Successfully',
			'alert-type' => 'success'
			);

    	return redirect()->route('library.books-issued.view')->with($notification);

    } // End Method 




			  

	public function EditBookIssued($id){
		$data['books'] = books::where('status',1)->get();
		$data['editData'] = Issuedbook::find($id);
		return view('admin.pages.library.issuedbook.edit_issuedbook',$data);

		}





		
		public function UpdateIssuedBook(Request $request,$id){
			DB::transaction(function() use($request,$id){
	
				$student_id = $request->student_id;

				$issued = IssuedBook::where('id',$id)->first(); 
				
			$books_qtty = $issued->issued_quantity;

			$book_qty = books::where('id',$issued->book_id)->first();
			$qtty = $book_qty->quantity;
			$quantity = (float)$qtty+(float)$books_qtty;
			$book_qty->quantity = $quantity;
			$book_qty->save();

			$issued = IssuedBook::where('id',$id)->delete(); 
				

		
			$issuebook = new IssuedBook(); 
			$issuebook->student_id = $student_id;
			$issuebook->class = $request->class;
			$issuebook->book_id = $request->book_id;
			$issuebook->term = $request->term;
			$issuebook->issued_quantity = $request->issued_quantity; 
			$issuebook->issue_date = Carbon::now()->format('d F Y');
			$issuebook->issue_month = Carbon::now()->format('F Y');
			$issuebook->issue_year = Carbon::now()->format('Y');
			$issuebook->issue_status= 'Issued';
			$issuebook->return_day = $request->return_day;
			$issuebook->save(); 


			$books_qtty2 = $issuebook->issued_quantity;

		 $book_qty2 = books::where('id',$issuebook->book_id)->first();
		$qtty2 = $book_qty2->quantity;
		$quantity2 = (float)$qtty2-(float)$books_qtty2;
		$book_qty2->quantity = $quantity2;
		 $book_qty2->save();

				
	
				 
			});
		
				$notification = array(
				'message' => 'Issued Book Details Have Been Updated Successfully',
				'alert-type' => 'success'
				);
	
			return redirect()->route('library.books-issued.view')->with($notification);
	
		} // End Method 
	





}
