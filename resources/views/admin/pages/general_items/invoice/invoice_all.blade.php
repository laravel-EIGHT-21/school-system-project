@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Kitchen Stock Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Kitchen Stock </li>
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
<h3 class="card-title"> Kitchen Stock Details </h3>

<a href="{{ route('invoice.add') }}" class="btn btn-info btn-rounded" style="float:right;"><i class="fas fa-plus-circle"> Add Kitchen-Stock Usage  </i></a>

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
                        <tr>

                        <th>Sl</th>

                            <th>Invoice No </th>
                            <th>Date </th>
                            <th>Desctipion</th>  


                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item) 
            <tr>

            <td> {{ $key+1}} </td>
                <td> #{{ $item->invoice_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                 
                  
                 <td>  {{ $item->description }} </td> 

                 

               
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
