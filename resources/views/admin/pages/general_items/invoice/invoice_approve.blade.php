@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Kitchen Stock Approval</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<h4>Invoice No : #{{ $invoice->invoice_no }} &nbsp;<b> | </b> &nbsp;  Date : {{ date('d-m-Y',strtotime($invoice->date)) }} </h4>
    <a href="{{ route('invoice.pending.list') }}" class="btn btn-warning btn-rounded" style="float:right;"><i class="fa fa-list"> Pending Kitchen Stock  </i></a> <br>  <br>               

     <table class="table table-dark" width="100%">
        <tbody>

             <tr>
             <td></td>
              <td colspan="3"><p> Description : <strong> {{ $invoice->description  }} </strong> </p></td>
             </tr>
        </tbody>
         
     </table>    


     <form method="post" action="{{ route('approval.store',$invoice->id) }}">
      @csrf         
         <table border="1" class="table table-dark" width="100%">
            <thead>
                <tr>
                    <th class="text-center">Sl</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center" style="background-color: #8B008B">Current Stock</th>
                    <th class="text-center">Quantity Used</th>
                    
                </tr>
                
            </thead>
    <tbody>
        
        @foreach($invoice['invoice_details'] as $key => $details)
        <tr>
            
            <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
            <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
            <input type="hidden" name="out_qty[{{$details->id}}]" value="{{ $details->out_qty }}">

            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center" style="background-color: #8B008B">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->out_qty }}</td>

        </tr>

        @endforeach

    </tbody>
             
         </table>
 
         <button type="submit" class="btn btn-info"> Approve Kitchen Stock </button>

     </form> 

                    
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection

