@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Book Quantity Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Book Quantity Details </li>
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
<h5 class="card-title"> <strong> Book Name :</strong> <b>{{ $details->name }}</b>   </h5>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Previous Quantity</th> 
<th>Increment Quantity</th>
<th>Decrement Quantity</th>
<th>Present Quantity</th>
<th>Increment Date</th>
<th>Decrement Date</th>
</tr>
</thead>
<tbody>
@foreach($book_quantities as $key => $qty)
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $qty->previous_qty }}</td>	
<td> {{ $qty->increment_qty }}</td>	
<td> {{ $qty->decrement_qty }}</td>
<td> {{ $qty->present_qty }}</td>	
<td> {{ $qty->increment_date }}</td>	
<td> {{ $qty->decrement_date }}</td>	 

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
<br><br>

@endsection
