@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Purchases Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Purchases </li>
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
<h3 class="card-title"> Purchases List </h3>

@can('other-cost-view')
<a href="{{ route('purchase.add') }}" class="btn btn-info btn-rounded" style="float:right;"><i class="fas fa-plus-circle"> Add Purchase </i></a>
@endcan

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
                        <tr>
                        <th>Invoice No</th> 
                            <th>Date </th>
                            <th>Term</th>
                            <th>Unit px</th> 
                            <th>Qty</th> 
                            <th>Total px</th> 
                            <th>Product</th> 
                            <th width="15%">Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
            <tr>

                <td> {{ $item->invoice_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                 <td> {{ $item->term }} </td> 
                 <td> {{ $item->unit_price }} </td> 
                 <td> {{ $item->item_qty }} </td> 


                 <td> {{ $item->total_price }} </td> 
                 <td> {{ $item['product']['name'] }} </td> 


                <td> 



@can('other-cost-edit')
  
<a href="{{ route('edit.purchase.information',$item->id) }}" class="btn btn-info" title="Edit Details" ><i class="fa fa-edit"></i></a>

@endcan


@can('other-cost-view')
<a target="_blank" href="{{ route('purchase.information.report',$item->id) }}" title="Print Invoice Details" class="btn btn-success"><i class="fa fa-download"></i></a>
@endcan

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
