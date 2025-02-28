@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b>Add Kitchen-Stock Usage Information</b></h1>
</div>

</div>
</div>
</section>
 


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b> New Kitchen-Stock Usage Details</b></h3>

            
<a href="{{ route('invoice.all') }}" class="btn btn-info btn-rounded" style="float:right;"> Back </a>


          </div>
          <!-- /.card-header -->

          <div class="card-body">


          <div class="row">


          
<div class="col-md-3"> 
<div class="form-group">
<label>Invoice No.</label>
<input type="text" name="invoice_no" value="{{ $invoice_no }}"  id="invoice_no" readonly style="background-color:#ddd"  class="form-control"  > 
	 </div>
</div> <!-- end col md 4 -->

           
<div class="col-md-4"> 
<div class="form-group">
<label>Date</label>
<input type="date" name="date" id="date" class="form-control"  > 
	 </div>
</div> <!-- end col md 4 -->


<div class="col-4">
<div class="form-group">
<label>Category</label>
<select name="category_id" id="category_id" class="form-control select2">
<option value="" selected="" disabled="">Select Category</option>
 @foreach($category as $cat)
<option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach

</select>
</div>
</div>




</div> <!-- end 2nd row  -->

<div class="row">


<div class="col-4">
<div class="form-group">
<label>Product</label>
<select name="product_id" id="product_id"  class="form-control select2">
<option value="" selected="" disabled="">Select Product</option>

</select>
</div>
</div>


          
<div class="col-md-4"> 
<div class="form-group">
<label>Stock(Pic/Kg)</label>
<input type="text" name="current_stock_qty"  id="current_stock_qty" readonly style="background-color:#ddd"  class="form-control"  > 
	 </div>
</div> <!-- end col md 4 -->




<div class="col-md-4" style="padding-top: 30px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i>Add More </span>    		
     	</div><!-- End col-md-5 -->

</div>  


</div>


         <br>

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('invoice.store') }}">
	 	@csrf    
        
         <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Product Name </th>
                        <th width="7%">PSC/KG</th>

                        <th width="7%">Action</th> 

                    </tr>
                </thead>

                <tbody id="addRow" class="addRow">
                    
                </tbody>

                <tbody>



                </tbody>                
            </table><br>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea name="description" class="form-control" id="description" placeholder="Write Description Here"></textarea>
                </div>
            </div><br>



<div class="form-group">
<button type="submit" class="btn btn-info" id="storeButton">Add </button>

</div>
                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->



    <script id="document-template" type="text/x-handlebars-template">
     
     <tr class="delete_add_more_item" id="delete_add_more_item">
             <input type="hidden" name="date" value="@{{date}}">
             <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
             
        
         <td>
             <input type="hidden" name="category_id[]" value="@{{category_id}}">
             @{{ category_name }}
         </td>
     
          <td>
             <input type="hidden" name="product_id[]" value="@{{product_id}}">
             @{{ product_name }}
         </td>
     
          <td>
             <input type="number" min="1" class="form-control out_qty text-right" name="out_qty[]" value=""> 
         </td>
     

     
          <td>
             <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
         </td>
     
         </tr>
     
     </script>
     
     
     <script type="text/javascript">
         $(document).ready(function(){
             $(document).on("click",".addeventmore", function(){
                 var date = $('#date').val();
                 var invoice_no = $('#invoice_no').val(); 
                 var category_id  = $('#category_id').val();
                 var category_name = $('#category_id').find('option:selected').text();
                 var product_id = $('#product_id').val();
                 var product_name = $('#product_id').find('option:selected').text();
                 if(date == ''){
                     $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                     return false;
                      }
                       
                       if(category_id == ''){
                     $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                     return false;
                      }
                       if(product_id == ''){
                     $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                     return false;
                      }
                      var source = $("#document-template").html();
                      var tamplate = Handlebars.compile(source);
                      var data = {
                         date:date,
                         invoice_no:invoice_no, 
                         category_id:category_id,
                         category_name:category_name,
                         product_id:product_id,
                         product_name:product_name
                      };
                      var html = tamplate(data);
                      $("#addRow").append(html); 
             });
             $(document).on("click",".removeeventmore",function(event){
                 $(this).closest(".delete_add_more_item").remove();
                 totalAmountPrice();
             });


             // Calculate sum of amout in invoice 

         });
     </script>
      
     
     <script type="text/javascript">
         $(function(){
             $(document).on('change','#category_id',function(){
                 var category_id = $(this).val();
                 $.ajax({
                     url:"{{ route('get-product') }}",
                     type: "GET",
                     data:{category_id:category_id},
                     success:function(data){
                         var html = '<option value="">Select Product</option>';
                         $.each(data,function(key,v){
                             html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                         });
                         $('#product_id').html(html);
                     }
                 })
             });
         });
     </script>
      
      <script type="text/javascript"> 
         $(function(){
             $(document).on('change','#product_id',function(){
                 var product_id = $(this).val();
                 $.ajax({
                     url:"{{ route('check-product-stock') }}",
                     type: "GET",
                     data:{product_id:product_id},
                     success:function(data){                   
                         $('#current_stock_qty').val(data);
                     }
                 });
             });
         });
     </script>
     
     

     
 



@endsection