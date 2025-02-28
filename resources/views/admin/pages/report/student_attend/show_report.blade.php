  

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
                <h3 class="text-center"><strong> Students Attendance Details
                    </strong></h3>

                    
<h5 class="text-center"> <strong>Class : </strong> {{ $allData['0']['class'] }} &nbsp; <b> | </b> &nbsp;  <strong>Term  : </strong> {{ $allData['0']['term'] }} &nbsp; <b> | </b> &nbsp; <strong>Session  : </strong> {{ $allData['0']['session']['name'] }}  </h5>

<br>

<h6 class="text-center"> <strong>Attendance Date : </strong> {{ $allData['0']['date'] }} &nbsp; <b> | </b> &nbsp; <strong>Subject : </strong> {{ $allData['0']['school_subject']['name'] }}   </h6>


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


<th class="text-center"><strong>Student</strong></th>
<th class="text-center"><strong>Reg.no</strong></th>

<th class="text-center"><strong>Attendance </strong></th>

<th class="text-center"><strong>Teacher </strong></th>


</tr>
</thead>
<tbody>
 

        @foreach($allData as $key => $item)
        <tr>

      <td class="text-center">{{ $item['student']['name'] }}</td>

			<td class="text-center">{{ $item['student']['id_no'] }}</td>

            <td class="text-center">{{ $item->attend_status }}</td>

            <td class="text-center">{{ $item['teacher']['name'] }}</td>
                        
        </tr>

                @endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>

<div class="row">


<div class="col-6">

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