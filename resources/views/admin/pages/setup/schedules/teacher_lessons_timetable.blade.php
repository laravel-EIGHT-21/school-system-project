
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Teacher Lessons Schedules Information </h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Lessons Schedules </li>
</ol>
</div>
</div>
</div>
</section>
<br>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><b>{{$detailsData['0']['user']['name']}} Lessons Schedule For  {{$detailsData['0']->term}}</b></h3>

<div class="d-print-none">
<div class="float-start">
<a href="javascript:window.print()" style="float: right;" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
</div>
</div>
</div>

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
<thead>

<th width="125">Time</th>
                            @foreach($weekDays as $day)
                                <th>{{ $day }}</th>
                            @endforeach

</thead>

<tbody>
@foreach($calendarData as $time => $days)
                                <tr>
                                    <td>
                                        {{ $time }}
                                    </td>
                                    @foreach($days as $value)
                                        @if (is_array($value))
                                            <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#28a745; color:#000000">
                                            <b>{{ $value['class_name'] }}</b><br>
                                                 <b>{{ $value['subject_name'] }}</b><br>
                                                 <b>By : {{ $value['teacher_name'] }}</b><br>
                                                 <b>Time : {{ $value['start'] }} - {{$value['end']}}</b>
                                            </td>
                                        @elseif ($value === 1)
                                            <td></td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach    
</tbody>                  
                    </table>


</div>
</div>

</div>

</div>





</div>


</div>

</section>

<br>


@endsection
