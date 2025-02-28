@extends('admin.body.master')
@section('admin')


@section('title')
 Termly Financial Statement Report
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<div class="row" >
<div class="col-12"> 

<div class="invoice p-3 mb-3">

@php
    $setting = App\Models\SiteSetting::find(1);
    $setting_logo = $setting->logo;
@endphp




<div class="row">
<div class="col-12">
<h5 class="text-center">

<img src="{{ asset($setting->logo) }}" alt="Logo Image" width="80" height="90">

</h5>

<h5>
<small class="float-right">Print Date : {{ date("d M Y") }}</small>
</h5>
</div>

</div>




<div class="row invoice-info">
<div class="col-sm-12 invoice-col text-center">
<address>
<strong>{{ $setting->school_name}}</strong><br>
<b>{{ $setting->company_address }}</b>
<br>

<b>Phone: {{ $setting->phone_one}} , &nbsp; {{ $setting->phone_two}}</b>
<br>
<b>Email: <a href="">{{ $setting->email}}</a></b>
</strong>
</address>
</div>


        <div class="col-12">
            <div>
                <div class="p-2">
                    <h3 class="text-center"><u><strong>ANNUAL FINANCIAL STATEMENT REPORT FOR YEAR : {{$school_details->year}}</u> &nbsp;

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row" >
<div class="col-12">


<h5><b>Income Revenues </b> </h5>

<table id="example" class="table table-bordered" >
<thead>
<tr>

<th class="text-center"><strong>Term</strong></th>
<th class="text-center"><strong>Amount Collected</strong></th>


</tr>
</thead>

<tbody>
    @foreach($schoolfees as $key => $value )
    <tr>
                              
@php


$term= App\Models\student_fees::where('term',$value->term)->orderBy('id','asc')->get();

  $total_amount_collected = App\Models\student_fees::where('term',$value->term)->where('year',$value->year)->sum('fee_amount');

  @endphp

            	
<td class="text-center"> {{ $term['0']->term}}</td>	

<td class="text-center">ugx {{ ($total_amount_collected) }}</td>	

</tr>

@endforeach

</tbody>

<tfoot>
    <!-- start row -->
    <tr>
      <th colspan="1" style="text-align: right">
      <b>Grand Total : </b>
      </th>
      <th><b>ugx {{$total_fees_paid}}</b></th>
    </tr>
    <!-- end row -->

  </tfoot>




</table>
</div>


</div>


<br>


<div class="row" >
    <div class="col-12">
    
    
    <h5><b>Expenses</b> </h5>
    
    <table id="example" class="table table-bordered" >
    <thead>
    <tr>
    
    <th class="text-center"><strong>Expense</strong></th>
    <th class="text-center"><strong>Term</strong></th>
    <th class="text-center"><strong>Amount Paid</strong></th>
    
    
    </tr>
    </thead>
    
    <tbody>
        @foreach($expensefees as $key => $exp )
        <tr>
                                  
        @php
  
  
$exp_term= App\Models\expenses::where('term',$exp->term)->where('category_id',$exp->category_id)->get();
  $expense_paid = App\Models\expenses::where('term',$exp->term)->where('category_id',$exp->category_id)->where('year',$exp->year)->sum('amount_paid');

  @endphp
       
                    
    <td class="text-center"> {{ $exp['category']['name'] }}</td>
    
                	
<td class="text-center"> {{ $exp_term['0']->term}}</td>	
    
    <td class="text-center">ugx {{ ($expense_paid) }}</td>	
    
    </tr>
    
    @endforeach
    
    </tbody>
    
    <tfoot>
        <!-- start row -->
        <tr>
          <th colspan="2" style="text-align: right">
          <b>Grand Total : </b>
          </th>
          <th><b>ugx {{$total_expense_paid}}</b></th>
        </tr>
        <!-- end row -->
    
      </tfoot>
    
    
    
    
    </table>
    </div>
    
    
    </div>

<br>


<div class="row" >
    <div class="col-12">
    
    
    <h5><b>Purchases </b> </h5>
    
    <table id="example" class="table table-bordered" >
    <thead>
    <tr>
    
    <th class="text-center"><strong>Purchase Items</strong></th>
    <th class="text-center"><strong>Term</strong></th>
    <th class="text-center"><strong>Total Price Paid</strong></th>
    
    
    </tr>
    </thead>
    
    <tbody>
        @foreach($purchases as $key => $item )
        <tr>
                                  
        @php

$purchase_term= App\Models\purchase_stocks::where('term',$item->term)->where('purchase_id',$item->purchase_id)->get();
  
  $price_paid = App\Models\purchase_stocks::where('term',$item->term)->where('year',$item->year)->where('purchase_id',$item->purchase_id)->sum('total_price');

  @endphp
       
                    
    <td class="text-center"> {{ $item['product']['name'] }}</td>	
                    	
<td class="text-center"> {{ $purchase_term['0']->term}}</td>	

    <td class="text-center">ugx {{ ($price_paid) }}</td>	
    
    </tr>
    
    @endforeach
    
    </tbody>
    
    <tfoot>
        <!-- start row -->
        <tr>
          <th colspan="2" style="text-align: right">
          <b>Grand Total : </b>
          </th>
          <th><b>ugx {{$total_price_paid}}</b></th>
        </tr>
        <!-- end row -->
    
      </tfoot>
    
    
    
    
    </table>
    </div>
    
    
    </div>


<br>



<div class="row">

    <div class="col-12">
    <div class="table-responsive">
        
    <h6><b>Net Income</b></h6>
    
    <table class="table table-bordered">
    
    <thead>
    <tr>
    
    <th class="text-center"><strong>Net Income</strong></th>
    
    
    @php

    $net_income = (float)$total_fees_paid-((float)$total_expense_paid+(float)$total_price_paid);

    @endphp

    <th><b>ugx {{$net_income}}</b></th>
    
    
    </tr>
    </thead>    
    
    
    </table>
    </div>
    </div>
    
    </div>

<br>


<h6><strong>NOTE : </strong><b>IF LOST AND FOUND , PLEASE RETURN TO THE ABOVE ADDRESS.</b></h6>


<br><br>

<div class="d-print-none">
<div class="float-end">
<a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
</div>
</div>


</div>



</div>

</div>


<br><br>


@endsection