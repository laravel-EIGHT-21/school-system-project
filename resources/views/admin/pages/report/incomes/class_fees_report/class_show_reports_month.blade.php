  



@extends('admin.body.master')
@section('admin')

 
<div class="row">
<div class="col-12">

<div class="invoice p-3 mb-3">

@php
    $setting = App\Models\SiteSetting::find(1);
    $setting_logo = $setting->logo;
@endphp


<div class="row">
<div class="col-12">
<h4>

<small class="float-right">Print Date : {{ date("d M Y") }}</small>
</h4>
</div>

</div>




<div class="row invoice-info">
<div class="col-sm-5 invoice-col">
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
                    <h3 class="font-size-16"><strong>Monthly Class Termly Fees Collection  Details For - 
    <span class="btn btn-info"><b> {{ $month }} </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>

<th class="text-center"><strong>Class</strong></th>
<th class="text-center"><strong>Term</strong></th>
<th class="text-center"><strong>Fees  Amount</strong></th>

</tr>
</thead>
<tbody>

@php
        $total_sum = '0';
        @endphp
        @foreach($allData as $key => $item)
		
        <tr>

	
           
		<td class="text-center">{{ $item->class }}</td>
            <td class="text-center">{{ $item->term }}</td>
            <td class="text-center">{{ ($student_fee_total) }}</td>

                        
        </tr>
        @php
        $total_sum += $student_fee_total;
        @endphp
        @endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>

<div class="row">


<div class="col-6">

</div>


<div class="col-6">
<div class="table-responsive">
<table class="table">
<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Fees Collected</strong></td>
<td class="no-line text-end"><h4 class="m-0">${{ $total_sum}}</h4></td>
</tr>
</table>
</div>
</div>

</div>



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