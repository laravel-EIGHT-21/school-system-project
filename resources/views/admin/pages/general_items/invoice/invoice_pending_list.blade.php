@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Pending Kitchen-Stock Information</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Pending Kitchen-Stock </li>
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
<h3 class="card-title">Pending Kitchen-Stock Details </h3>

<a href="{{ route('invoice.add') }}" class="btn btn-info btn-rounded" style="float:right;"><i class="fas fa-plus-circle"> Add Kitchen-Stock Usage  </i></a>

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
                        <tr>

                           
                            <th>Invoice No </th>
                            <th>Date </th>
                            <th>Desctipion</th>  
                            <th>Status</th>
                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
            <tr>

              
                <td> #{{ $item->invoice_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                 
                  
                 <td>  {{ $item->description }} </td> 


                 <td> @if($item->status == '0')
                    <span class="btn btn-warning">Pending</span>
                    @elseif($item->status == '1')
                    <span class="btn btn-success">Approved</span>
                    @endif </td>

      <td>
       @if($item->status == '0')
 <a href="{{ route('invoice.approve',$item->id) }}" class="btn btn-dark sm" title="Approved Data" >  <i class="fas fa-check-circle"></i> </a>

<a href="{{ route('invoice.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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
