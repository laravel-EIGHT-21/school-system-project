
@extends('admin.body.master')
@section('admin')

@section('title')
Expense View
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>School Expenses Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Expenses </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">


<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>School Expenses Search</b></h3>

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('other.costs.year.wise') }}">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-4">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<input type="text" name="year" class="form-control" required > 
</div>
</div> <!-- end col md 4 -->




<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search Expenses ">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->

 


                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

        <br>






<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Expenses List </h3>

@can('other-cost-view')
<a href="{{ route('other.cost.add') }}" class="btn btn-success" style="float: right;">Add Expense</a>
@endcan

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr> 
<th>Date</th> 
<th>Term </th>
<th>Expense</th> 
<th>Total</th>
<th>Invoice_No</th>
<th>PayMode</th>
<th>Pay Status</th> 
<th width="20%">Action</th>
</tr> 
</thead> 
<tbody>

@foreach($allData as $key => $value )

    <tr>
    <td> {{ date('d-m-Y', strtotime($value->date)) }}</td>			
    <td> {{ $value->term }}</td>
    <td> {{ $value['category']['name'] }}</td>	 
    <td> {{ $value->invoice_amount }}</td>	
    <td> {{ $value->invoice_no }}</td>	
    <td> {{ $value->payment_mode }}</td>
    <td>

@php 

$originalfees = $value->invoice_amount;

$zero_per = (float)0.0 * (float)$originalfees;
$all_per = (float)1 *(float)$originalfees;

@endphp

@if($value->amount_paid == $zero_per )
<span class="badge badge-pill badge-danger">No Payment</span>

@elseif($value->amount_paid > $zero_per &&  $value->amount_paid < $all_per)
<span class="badge badge-pill badge-warning">Partial</span>

@elseif($value->amount_paid == $all_per )
<span class="badge badge-pill badge-success">Paid</span>
@endif


</td>	



    <td> 
    @can('other-cost-edit')
    <a href="{{ route('edit.other.cost',$value->id ) }}" class="btn btn-sm btn-info" title="Edit Amount Paid "><i class="fa fa-edit"></i></a>
    @endcan


&nbsp;&nbsp;

@can('other-cost-view')
<a title="Amount Payment Details" target="_blank" href="{{ route('other.cost.details',$value->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
@endcan

&nbsp;&nbsp;

@can('other-cost-view')
<a target="_blank" href="{{ route('other.cost.details.pdf',$value->id) }}" title="Amount Payment Invoice" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
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
<br><br>

@endsection
