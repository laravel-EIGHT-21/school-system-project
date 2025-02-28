  

@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 


<div class="row">
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
{{ $setting->company_address }}<br>

Phone: {{ $setting->phone_one}} , &nbsp; {{ $setting->phone_two}}<br>
Email: <a href="">{{ $setting->email}}</a>
</address>
</div>


        <div class="col-12">
            <div>
                <div class="p-2">
                    <h2 class="font-size-12 text-center"><strong>Students With Fees Balances

                    </strong></h2>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row">
<div class="col-12 table-responsive">


	
<h3 class="text-left"><strong>Year : </strong> {{ $allData['0']['year']}} &nbsp; <b> | </b> &nbsp; <strong>Class : </strong> {{ $allData['0']['class'] }} &nbsp; <b> | </b> &nbsp; <strong>Term : </strong> {{ $allData['0']['term'] }} </h3>


<table class="table table-striped">
<thead>
<tr>

<th class="text-center"><strong>Regno</strong></th>
<th class="text-center"><strong>Name</strong></th>
<th class="text-center"><strong>Section</strong></th>
<th class="text-center"><strong>Paid</strong></th>
<th class="text-center"><strong>Total</strong></th>
<th class="text-center"><strong>Balance</strong></th>

</tr>
</thead>
<tbody>
 

                                               
@foreach($allData as $key => $value )
        <tr>
           

		@php  
        
        $terms1 = App\Models\student_fees::where('student_id',$value->student_id)->where('year',$value->year)->where('class',$value->class)->where('term',$value->term)->sum('fee_amount');

      @endphp
		

			<td class="text-center">{{$value['student']['id_no'] }}</td>
            <td class="text-center">{{ $value['student']['name'] }}</td>
            <td class="text-center">{{ $value->day_boarding }}</td>
            <td class="text-center">ugx {{ ($terms1) }}</td>

            @php 
                                                                                        
                                                                                       
$balancefees = (float)$fee_total-(float)$terms1;

@endphp

            <td class="text-center">ugx {{ ($fee_total) }}</td>
            <td class="text-center">ugx {{ ($balancefees) }}</td>

                        
        </tr>


@endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>
<br><br>



<div class="d-print-none">
<div class="float-end">
<a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
</div>
</div>


</div>



</div>

</div>
</div>

@endsection