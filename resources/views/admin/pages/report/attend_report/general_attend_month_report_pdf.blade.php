 

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
                    <h4 class="text-center"><strong>EMPLOYEES GENERAL ATTENDANCE REPORT

                    </strong></h4>

					<br>

					<h6 class="text-center"><strong>ATTENDANCE MONTH : {{ $allData['0']['month']}}

                    </strong></h6>
	


                    <p></p>
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

<th class="text-center"><strong>Teacher</strong></th>
<th class="text-center"><strong>Designation</strong></th>
<th class="text-center"><strong>Date</strong></th>
<th class="text-center"><strong>Attendance Status</strong></th>

</tr>
</thead>
<tbody>
 
@foreach($allData as $key => $value)
		
<tr>

            <td class="text-center">{{ $value['user']['name'] }}</td>
            <td class="text-center">{{ $value['user']['designation']['name'] }}</td>
            <td class="text-center">{{ Carbon\Carbon::parse($value->date)->format('l d F Y')}}</td>
            <td class="text-center">{{ $value->attend_status }}</td>


                        
        </tr>


@endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>
<br>
<hr />
<br>



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