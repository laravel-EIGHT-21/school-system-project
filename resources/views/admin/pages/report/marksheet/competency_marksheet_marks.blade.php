@extends('admin.body.master')
@section('admin')


@section('title')
 Results Report Card
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/rowgroup/1.3.0/js/dataTables.rowGroup.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.3.0/css/rowGroup.dataTables.min.css">



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
                    <h3 class="text-center"><u><strong>COMPETENCY RESULTS FOR</u> - &nbsp;
    <span class="btn btn-info"><b>{{ $allMarks3['0']['student']['name'] }} </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row" >
<div class="col-12">

<h4 class="text-center"><b><u>{{ $allMarks3['0']['term'] }}  -  {{ $allMarks3['0']['exam_type'] }} Examination Results</u></b></h4>

<br>
<h5 class="text-center"><u><b>Class  : </b> <b>{{ $allMarks3['0']['class']}}</b> &nbsp; <b>|</b>  &nbsp; <b>Year : </b> <b>{{ $allMarks3['0']['year'] }}</b></u></h5>

<br>

<table id="example" class="table table-bordered" >
<thead>
<tr>

<th class="text-center"><strong>Subjects</strong></th>
<th class="text-center"><strong>Competency</strong></th>
<th class="text-center"><strong>Score</strong></th>

<th class="text-center"><strong>Descriptor</strong></th>

</tr>
</thead>

<tbody>
  
 
@foreach($allMarks3 as $key => $mark)
@php
$get_mark = $mark->score;
$total_subject = App\Models\competency_marks::where('year',$mark->year)->where('class',$mark->class)->where('term',$mark->term)->where('exam_type',$mark->exam_type)->where('student_id',$mark->student_id)->get()->count();

$grade_marks = App\Models\score_ranges::where([['score_start', '<=' , $get_mark],['score_end', '>=',$get_mark ]])->first();
$descriptor = $grade_marks->descriptor;

@endphp


<tr>

@php
$subjects=App\Models\competency_marks::where('subject_id',$mark->subject_id)->get();
@endphp


<td class="text-center" ><b><u>{{ $subjects['0']['school_subject']['name']}}</u></b></td>



@php
$quests=App\Models\competency_marks::where('competency_id',$mark->competency_id)->get();
@endphp

<td class="text-center">{{ $quests['0']['competency']['competency'] }}</td>


<td class="text-center">{{ $get_mark }}</td>


<td class="text-center">{{ $descriptor }}</td>
</tr>

@endforeach

</tbody>




</table>
</div>


</div>



<br><br>

<p>Classteacher Signature: .................................................................................................................................................................................................................................................................</p>

<p>Remarks:.................................................................................................................................................................................................................................................</p>

<p> Headteacher Signature: ..............................................................................................................................................................................................................................................................</p>

<p>School Stamp: .............................................................................................................................................................................................................................................................</p>

<p> Date: ............................................................................................................................................................................................................................................................</p>

<h6><strong>NOTE : </strong><b>THIS RESULTS REPORT IS NOT VALID WITHOUT SCHOOL STAMP AND HEADTEACHER`S SIGNATURE</b></h6>

<br><br>


<div class="row">

<div class="col-12">
<div class="table-responsive">
    
<h6><b>Grading</b></h6>

<table class="table table-bordered">

<thead>
<tr>

<th class="text-center"><strong>Score Range</strong></th>
<th class="text-center"><strong>Remarks</strong></th>
<th class="text-center"><strong>Descriptor</strong></th>



</tr>
</thead>

<tbody>

@foreach($allGrades3 as $key => $value )
<tr>
<td>
  {{$value->score_start }} - {{$value->score_end}}
</td>

<td>
  {{$value->remarks}}
</td>


<td>
  {{$value->descriptor}}
</td>

</tr>
@endforeach

</tbody>



</table>
</div>
</div>

</div>

<br><br>


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

<script type="text/javascript">

$(document).ready(function () {
var groupColumn = 0;
var table = $('#example').DataTable({

"paging": false,
"lengthChange": false,
"searching": false,
"ordering": false,
"info": false,
"autoWidth": false,
"responsive": true,

columnDefs: [{ visible: false, targets: groupColumn }],
drawCallback: function (settings) {
var api = this.api();
var rows = api.rows({ page: 'current' }).nodes();
var last = null;

api
.column(groupColumn, { page: 'current' })
.data()
.each(function (group, i) {
if (last !== group) {
$(rows)
.eq(i)
.before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

last = group;
}
});
},
});


});




</script>


@endsection