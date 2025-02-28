<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Examination Results Report Card</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}" media="screen" >
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{asset('assets/css/lobipanel.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{asset('assets/css/prism.css')}}" media="screen" >
        <!-- DATATABLE STYLE  -->
        <link rel="stylesheet" href="{{asset('assets/js/dataTables/dataTables.bootstrap.css')}}"  />
        <!-- CUSTOM STYLE  -->
        <link rel="stylesheet"  href="{{asset('assets/css/main.css')}}" media="screen" />        
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    </head>
    <body style="background-color:mistyrose";>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                           
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section" id="exampl">
                            <div class="container-fluid">

                                <div class="row">
                              
                             
    @php
    $setting = App\Models\SiteSetting::find(1);
    $setting_logo = $setting->logo;

    $settings = App\Models\SiteSetting::find(1);

    @endphp



                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    
                                                <h5 align="center"><img align="center" src="{{ asset($setting_logo) }}"  width="50px"; height="60px";/></h5>
                                                <h1 align="center"><b>{{ $settings->school_name}}</b></h1>
                                                               
                                               <h5 align="center"><b>Address : {{ $settings->company_address }}</b></h5> 
                                    
                                    <h5 align="center"><b>Tel : {{ $settings->phone_one}}, &nbsp;{{ $settings->phone_two}}</b></h5>
                                    <h5 align="center"><b>Email : {{ $settings->email}}</b></h5>

                                    <h6 align="center">Print Date : {{ date("d M Y") }}</h6>
                                                              <hr>
                                                                                                                                        
                                    <h4 align="center"><b><u>{{ $allMarks1['0']['term'] }}  -  {{ $allMarks1['0']['exam_type'] }} Examination Results</u></b></h4>
                                                
                                                                                                                                                                   
                                                <h5 align="center"><strong><b><u> {{ $allMarks1['0']['student']['name'] }} `s  EXAMINATION RESULT CARD</u></b></strong></h5>
                                                  

<p><b>Class  : </b> <b>{{ $allMarks1['0']['class'] }}</b> &nbsp; <b>|</b>  &nbsp; <b>Year : </b> <b>{{ $allMarks1['0']['year'] }}</b></p>




                                            </div>
                                            <div class="panel-body p-20">
                                            <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="1" style= "border-color:black;" cellspacing="2" cellpadding="2" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            

                                                            <th style="text-align: center"> SUBJECTS</th>    
                                                            <th style="text-align: center">MARKS</th>
                                                            <th style="text-align: center">LETTER GRADE</th>

                                                            <th style="text-align: center">REMARKS</th>
                                                        </tr>
                                               </thead>
  


<tbody>
                                               
@php
$total_marks = 0;
$total_point = 0;
$total_marks_avg = 0;
$total_agg = 0;
@endphp

@foreach($allMarks1 as $key => $mark)
@php
$get_mark = $mark->marks;
$total_marks = (float)$total_marks+(float)$get_mark;
$total_subject = App\Models\primary_marks::where('year',$mark->year)->where('class',$mark->class)->where('term',$mark->term)->where('exam_type',$mark->exam_type)->where('student_id',$mark->student_id)->get()->count();
$total_marks_avg = ((float)$total_marks)/(float)$total_subject;

$grade_marks = App\Models\OlevelGrades::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
$grade_name = $grade_marks->grade_name;
$remarks = $grade_marks->remarks;
$numeric_grade = $grade_marks->numeric_grade;

$total_agg = (float)$total_agg+(float)$numeric_grade;


@endphp

                                                		<tr>

                                                        @php
      $subjects=App\Models\primary_marks::where('subject_id',$mark->subject_id)->get();
      @endphp

<td style="text-align: center">{{ $subjects['0']['school_subject']['name'] }}</td>
<td style="text-align: center">{{ $get_mark }}</td>
<td style="text-align: center">{{ $grade_name }}</td>
<td style="text-align: center">{{ $remarks }}</td>
</tr>

                                                        @endforeach

                                                	</tbody>
                                                </table>
                                                </div>

                                                    <table>

                                                    <tr>
<th scope="row" colspan="2" style="text-align: center"><b>Total Marks :</b></th>
<td style="text-align: center"><b>{{ round($total_marks,0) }}</b> | </td>
    &nbsp;&nbsp;&nbsp;&nbsp;         

<th scope="row" colspan="2" style="text-align: center"><b>Average Score :</b></th>           
<td style="text-align: center"><b>{{round($total_marks_avg,0)}}</b> |  </td>


&nbsp;&nbsp;&nbsp;&nbsp;         

<th scope="row" colspan="2" style="text-align: center"><b>Aggregate Score :</b></th>           
<td style="text-align: center"><b>{{round($total_agg)}}</b></td>



</tr>

<tr>                              
<td colspan="3" align="center"><a class="fa fa-print fa-2x"  href="javascript:window.print()" ></a></td>
                                                             </tr>


                                                    </table>


                                                <p>Classteacher Signature: ...............................................................................................................................................................................</p>
                                                    
                                                <p>Remarks:................................................................................................................................................................</p>
                                                
                                                <p> Headteacher Signature: ...............................................................................................................................................................................</p>

                                                <p>School Stamp: .............................................................................................................................................................................</p>

                                                <p> Date: ...............................................................................................................................................................................</p>

                                                <h6>NOTE : <b>THIS RESULTS REPORT IS NOT VALID WITHOUT SCHOOL STAMP AND HEADTEACHER`S SIGNATURE</b></h6>



                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                      </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/pace.min.js')}}"></script>
        <script src="{{asset('assets/js/lobipanel.min.js')}}"></script>
        <script src="{{asset('assets/js/iscroll.js')}}"></script>

          <!-- DATATABLE SCRIPTS  -->
    <script src="{{asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="{{asset('assets/js/prism.js')}}"></script>

      
        <!-- ========== THEME JS ========== -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

       



    </body>
</html>
