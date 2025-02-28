  

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
                    <h2 class="font-size-12 text-center"><strong>O-LEVEL STUDENT EXAM RESULTS REPORT

                    </strong></h2>
	
                    <h4 class="text-center"><strong>Year : </strong> {{ $allMarks2['0']['year']}} &nbsp; <b> | </b> &nbsp; <strong>Class : </strong> {{ $allMarks2['0']['class'] }} &nbsp; <b> | </b> &nbsp; <strong>Term : </strong> {{ $allMarks2['0']['term'] }} &nbsp; <b> | </b> &nbsp; <strong>Exam Type : </strong> {{ $allMarks2['0']['exam_type'] }}  </h4>

                    <br>
    <h5 class="text-center"><strong>Student : </strong> {{ $allMarks2['0']['student']['name']}} &nbsp; <b> | </b> &nbsp; <strong>ID No : </strong> {{ $allMarks2['0']['student']['id_no'] }}  </h5>



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

<th class="text-center"><strong>Subjects</strong></th>
<th class="text-center"><strong>Marks</strong></th>
<th class="text-center"><strong>Letter Grades</strong></th>
<th class="text-center"><strong>Grades</strong></th>
<th class="text-center"><strong>Remarks</strong></th>

</tr>
</thead>
<tbody>
 
        
@php
$total_marks = 0;
$total_agg = 0;

$div1 = 1;
$div2 = 2;
$div3 = 3;
@endphp

@foreach($allMarks2 as $key => $mark)
@php
$get_mark1 = $mark->paper1_marks;
$get_mark2 = $mark->paper2_marks;
$get_mark3 = (float)$get_mark1+(float)$get_mark2;

$avg_mark =0;
$avg_mark1 =round(((float)$get_mark3/2),0);
$avg_mark2 =(float)$get_mark3;
$total_subject = App\Models\OlevelStudentsMarks::where('year',$mark->year)->where('class',$mark->class)->where('term',$mark->term)->where('exam_type',$mark->exam_type)->where('student_id',$mark->student_id)->get()->count();


@endphp

		
<tr>

@php
        $subjects=App\Models\AssignStudentSubject::where('subject_id',$mark->subject_id)->get();
        @endphp
			<td class="text-center">{{ $subjects['0']['school_subject']['name'] }}</td>


            <td class="text-center">

                    @if($get_mark2== NULL)

                    {{$avg_mark=$avg_mark2}} 

                    @elseif($get_mark2 !== NULL)

                    {{$avg_mark=$avg_mark1}}

                    @endif
            </td>




            @php

$grade_marks = App\Models\OlevelGrades::where([['start_marks','<=', (int)$avg_mark ],['end_marks', '>=',(int)$avg_mark ]])->first();
$grade_name = $grade_marks->grade_name;
$numeric_grade = $grade_marks->numeric_grade;
$total_agg = (float)$total_agg+(float)$numeric_grade;
$remarks = $grade_marks->remarks;
@endphp



            <td class="text-center">{{ $grade_name }}</td>
            <td class="text-center">{{$numeric_grade}}</td>

            <td class="text-center">{{ $remarks }}</td>


                        
        </tr>


@endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>

<hr />

<br><br><br>

<div class="row">


<div class="col-6">
<div class="table-responsive">
<table class="table">

<tr>

<td class="desc"><h3>Class-Teacher`s Section</h3>
<br>
<p class="total">ClassTeacher :            ________________________________________________________ </p>
<br><br>
<p class="total">Date :                    _________________________________________________________</p>
<br><br>
<p class="total">Remarks :                 _________________________________________________________</p>
<br><br>
<p class="total"> HeadTeacher:             _________________________________________________________</p>

</td> 
</tr>
</table>
</div>

</div>

<br><br><br>

<div class="col-6">
<div class="table-responsive">
<table class="table">




<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>AGGREGATES :</strong></td>
<td class="no-line text-end"><h5 class="m-0">{{$total_agg}}</h5></td>
</tr>
&nbsp;


@php
$div1 = 1;
$div2 = 2;
$div3 = 3;
@endphp


<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>DIVISION :</strong></td>
<td class="no-line text-end"><h5 class="m-0">


@if($total_agg >= 8 && $total_agg <= 32)
{{$div1}}

@elseif($total_agg >= 33 && $total_agg <= 40)
{{$div2}}

@elseif($total_agg >= 41 && $total_agg <= 50)
{{$div3}}

@endif
</h5></td>
</tr>
&nbsp;


</table>
</div>
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