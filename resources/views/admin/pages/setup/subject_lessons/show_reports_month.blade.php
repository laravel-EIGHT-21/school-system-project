  

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
                    <h3 class="font-size-12 text-center"><strong>Lesson Schedules Details For - 
    <span class="btn btn-info"><b> {{ $allData['0']['term'] }}</b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>



<div class="row">
<div class="col-12 table-responsive">



<h3 class="text-left"><strong>Class : </strong> {{ $allData['0']['class'] }} </h3>
<table class="table table-striped">
<thead>
<tr>


<th class="text-center"><strong>Session</strong></th>
@foreach($weekDays as $day)
<th class="text-center"><strong>{{ $day }}</strong></th>
@endforeach

</tr>
</thead>
<tbody>

@foreach($allData as $session => $mark)

@php

$sessions= App\Models\lessonstable::where('session_id',$mark->session_id)->get();

        $mon = App\Models\lessonstable::where('day','Monday')->where('session_id',$mark->session_id)->where('subject_id',$mark->subject_id)->get();
        $tue = App\Models\lessonstable::where('day','Tuesday')->where('session_id',$mark->session_id)->get();
        $wed = App\Models\lessonstable::where('day','Wednesday')->where('session_id',$mark->session_id)->get();
        $thur = App\Models\lessonstable::where('day','Thursday')->where('session_id',$mark->session_id)->get();
        $fri = App\Models\lessonstable::where('day','Friday')->where('session_id',$mark->session_id)->get();
        $sat = App\Models\lessonstable::where('day','Saturday')->where('session_id',$mark->session_id)->get();

        @endphp
        <tr> 



        <td class="text-center">{{ $sessions['0']['session']['name'] }}</td>    


        <td class="text-center"></td> 


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