  

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
    <span class="btn btn-info"><b> {{ $allData['0']->term}}</b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>
@foreach($allData as $key => $mark)


<div class="row">
<div class="col-12 table-responsive">


@php
      $class=App\Models\lessons::where('class',$mark->class)->get();
      @endphp

    
<h5 class="text-center"><b>Class  : </b> <b>{{ $class['0']->class}}</b> </h5>

<table class="table table-striped">
<thead>
<tr>


<th class="text-center"><strong>Session</strong></th>
<th class="text-center"><strong>Mon</strong></th>
<th class="text-center"><strong>Tue</strong></th>
<th class="text-center"><strong>Wed</strong></th>
<th class="text-center"><strong>Thur</strong></th>
<th class="text-center"><strong>Fri</strong></th>
<th class="text-center"><strong>Sat</strong></th>

</tr>
</thead>
<tbody>

@php

$session=App\Models\lessons::where('class',$mark->class)->select('class')->groupBy('class')->get();


        $mon = App\Models\lessons::where('day',$mark->day)->where('day','Monday')->where('class',$mark->class)->get();
        $tue = App\Models\lessons::where('day',$mark->day)->where('day','Tuesday')->where('class',$mark->class)->get();
        $wed = App\Models\lessons::where('day',$mark->day)->where('day','Wednesday')->where('class',$mark->class)->get();
        $thur = App\Models\lessons::where('day',$mark->day)->where('day','Thursday')->where('class',$mark->class)->get();
        $fri = App\Models\lessons::where('day',$mark->day)->where('day','Friday')->where('class',$mark->class)->get();
        $sat = App\Models\lessons::where('day',$mark->day)->where('day','Saturday')->where('class',$mark->class)->get();

        @endphp
        <tr> 



        <td class="text-center">{{ $session['0']['session']['name'] }}</td>
        <td class="text-center">  </td>
        <td class="text-center">  </td>
        <td class="text-center">  </td>
        <td class="text-center">  </td>
        <td class="text-center">  </td>
        <td class="text-center">  </td>
            



        </tr>
           
           
           
                            </tbody>
</table>
</div>

</div>

@endforeach


<br/><br/>



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