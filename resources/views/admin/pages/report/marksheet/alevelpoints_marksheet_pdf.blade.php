  

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
                    <h2 class="font-size-12 text-center"><strong>A-LEVEL STUDENT EXAM RESULTS REPORT

                    </strong></h2>

	
                    <h5 class="text-center"><strong>Year : </strong> {{ $allPoints4['0']['year']}} &nbsp; <b> | </b> &nbsp; <strong>Class : </strong> {{ $allPoints4['0']['class'] }} &nbsp; <b> | </b> &nbsp; <strong>Term : </strong> {{ $allPoints4['0']['term'] }} &nbsp; <b> | </b> &nbsp; <strong>Exam Type : </strong> {{ $allPoints4['0']['exam_type'] }}  </h5>
                    <br>

                    <h6 class="text-center"><strong>Student : </strong> {{ $allPoints4['0']['student']['name']}} &nbsp; <b> | </b> &nbsp; <strong>ID No : </strong> {{ $allPoints4['0']['student']['id_no'] }}  </h6>


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
<th class="text-center"><strong>Letter Points</strong></th>
<th class="text-center"><strong>Numberic Points</strong></th>

</tr>
</thead>
<tbody>
 
@php 
$total_points = 0;
@endphp

    @foreach($allPoints4 as $key => $point)
    @php
    $get_point = $point->points;

    $total_subject = App\Models\AlevelStudentPoints::where('year',$point->year)->where('class',$point->class)->where('exam_type',$point->exam_type)->where('student_id',$point->student_id)->get()->count();
    @endphp

					<tr>

    @php
        $subjects=App\Models\AssignStudentSubject::where('subject_id',$point->subject_id)->get();

        @endphp		


@php
        $subjects=App\Models\AssignStudentSubject::where('subject_id',$point->subject_id)->get();
        @endphp
			<td class="text-center">{{ $subjects['0']['school_subject']['name'] }}</td>

                
    @php
    
    $grade_marks = App\Models\points_grades::where('grade_point',$get_point)->first();
    $grade_name = $grade_marks->grade_name;
    $numeric_grade = $grade_marks->grade_point;
    $total_points = (float)$total_points+(float)$numeric_grade;
    
    
    
        @endphp

            <td class="text-center">

            {{$grade_name}}
            </td>


            <td class="text-center">{{$numeric_grade}}</td>


                        
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
<strong>TOTAL POINTS:</strong></td>
<td class="no-line text-end"><h5 class="m-0">{{$total_points}}</h5></td>
</tr>


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