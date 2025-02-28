@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Stock Report Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Stock Report </li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Stocks List </h3>

<a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-info btn-rounded" style="float:right;"><i class="fa fa-print"> Stock Report Print </i></a>

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
                        <tr>
                            <th>Sl</th>
                            <th>Supplier Name </th>
                            <th>Unit</th>
                            <th>Category</th> 
                            <th>Product Name</th> 
                            <th>Stock </th>
                            <th>In Qty</th> 
                            <th>Out Qty </th>  
                            
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
@php
$buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
$selling_total = App\Models\InvoiceDetails::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('out_qty');
@endphp

    <tr>
        <td> {{ $key+1}} </td> 
        <td> {{ $item['supplier']['name'] }} </td> 
        <td> {{ $item['unit']['name'] }} </td> 
        <td> {{ $item['category']['name'] }} </td> 
        <td> {{ $item->name }} </td> 
        <td> <span class="btn btn-success"> {{ $item->quantity }}</span> </td> 
        <td> <span class="btn btn-warning"> {{ $buying_total  }}</span>  </td> 
        <td> <span class="btn btn-danger"> {{ $selling_total  }}</span> </td> 

        
       
    </tr>
    @endforeach
                        
                        </tbody>                  
                    </table>


</div>

</div>

</div>





</div>


</div>

</section>


@endsection
