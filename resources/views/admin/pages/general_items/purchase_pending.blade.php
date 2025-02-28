@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Purchases Pending Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Purchases Pending</li>
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
<h3 class="card-title"> Purchases Pending List </h3>


<a href="{{ route('purchase.add') }}" class="btn btn-info btn-rounded" style="float:right;"><i class="fas fa-plus-circle"> Add Purchase </i></a>


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
                        <tr>
                        <th>Sl</th>
                            <th>Invoice No</th> 
                            <th>Date </th>
                            <th>Supplier</th>
                            <th>Category</th> 
                            <th>Quantity Bought</th> 
                            <th>Product Name</th> 
                            <th>Status</th>
                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
            <tr>
                <td> {{ $key+1}} </td>
                <td> {{ $item->purchase_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                 <td> {{ $item['supplier']['name'] }} </td> 
                 <td> {{ $item['category']['name'] }} </td> 
                 <td> {{ $item->buying_qty }} </td> 
                 <td> {{ $item['product']['name'] }} </td> 


                 <td> 
                    @if($item->status == '0')
                    <span class="btn btn-warning">Pending</span>
                    @elseif($item->status == '1')
                    <span class="btn btn-success">Approved</span> 
                    @endif
                     </td> 

                <td> 
@if($item->status == '0')
<a href="{{ route('purchase.approve',$item->id) }} " class="btn btn-danger sm" title="Approved" id="ApproveBtn">  <i class="fas fa-check-circle"></i> </a>
@endif
                </td>

               
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
