

@extends('admin.body.master')
@section('admin')




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Financial Year & School Terms Data Charts </h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Data Charts</li>
</ol>
</div>
</div>
</div>
</section>

<br><br>


<section class="content">
<div class="container-fluid">

<div class="card no-print">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>Enter Financial Year & School Term</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    
 
    <div class="card-body p-0">
    <div class="row">
        <div class="col-md-9">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title"><b>
        <i class="fas fa-calendar"></i>
        
        </b>
        </h3>
        </div>
        
        <div class="card-body">
         <form method="post" action="{{ route('financial-year-terms') }}">
             @csrf
     
                  
     <div class="form-group">
     <label>Select Term</label>
     <select name="term"  required="" class="form-control">
      <option value="Term 1">Term 1</option>
      <option value="Term 2">Term 2</option>
      <option value="Term 3" >Term 3</option>
      
      </select>
     </div> 
   
     <div class="form-group">
     <label>Enter Year</label>
     <input type="month" name="year" class="form-control"> 
     @error('year') 
     <span class="text-danger">{{ $message }}</span>
     @enderror 
     </div> 
                 
     <div class="text-xs-right">
     <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">					 
     </div>
     </form>
     
       
        </div>
        
        </div>
        
        </div>
        
        
        
        </div>
        
    

    </div>
</div>
   
<br />
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>Annual Fees Collections & Expenses per Term  </b>


</h3>

    </div>

    <div class="card-body p-2">

<div class="row">
<div class="col-md-6">

<div class="card card-success">
<div class="card-header">
<h3 class="card-title"><b>BarChart For Monthly Fees Collected </b></h3>
</div>

<div class="card-body">
<canvas id="chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>






<div class="col-md-6">

<div class="card card-warning">
<div class="card-header">
<h3 class="card-title"><b>Line Chart For Monthly Fees Collected </b></h3>
</div>

<div class="card-body">
<canvas id="linechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>


</div>



</div>
    


<br>


<div class="row">
<div class="col-md-6">

<div class="card card-danger">
<div class="card-header">
<h3 class="card-title"><b>BarChart For Monthly Expenses </b></h3>
</div>

<div class="card-body">
<canvas id="exchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>






<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><b>Line Chart For Monthly Expenses </b></h3>
</div>

<div class="card-body">
<canvas id="exlinechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>


</div>


  




<br>


<div class="row">
<div class="col-md-6">

<div class="card card-danger">
<div class="card-header">
<h3 class="card-title"><b>BarChart For Monthly Purchases </b></h3>
</div>

<div class="card-body">
<canvas id="purchase_chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>






<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><b>Line Chart For Monthly Purchases </b></h3>
</div>

<div class="card-body">
<canvas id="purchaselinechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


</div>


</div>


</div>




<div class="d-print-none">
<a href="javascript:print()" class="btn-sm btn-success"><i class="fa fa-print"> Print</i></a>
    </div>

</div>





</div>
</section>
<br><br>





<!-- ChartJS -->
<script src="{{asset('Backend/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('Backend/plugins/chart.js/Chart.bundle.min.js')}}"></script>



<script type="text/javascript">
 var ctx = document.getElementById("chart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'bar',
              data:{
                      labels:<?php echo json_encode($months); ?>,
                      datasets:[
                        {
                            label               : 'Fees Collected',
                            backgroundColor     : 'rgba(199, 21, 133,0.8)',
                            borderWidth          : 2,
                            borderColor         : 'rgba(199, 21, 133,1)',
                            pointRadius          : false,
                            pointColor          : 'rgba(199, 21, 133,0.8)',
                            pointStrokeColor    : '#3b8bba', 
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(199, 21, 133,0.8)',
                            data                : <?php echo json_encode($fees_total);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });

</script>










<script type="text/javascript">

var ctx = document.getElementById("linechart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'line',
              data:{
                      labels:<?php echo json_encode($months); ?>,
                      datasets:[
                        {
                            label               : 'Fees Collected',
                            backgroundColor     : 'rgba(176, 224, 230,0.5)',
                            borderWidth          : 10,
                            borderColor         : 'rgba(176, 224, 230,1)',
                            pointRadius          : true,
                            pointDotRadius      :50,
                            pointDotStrokeWidth : 15,
                            pointColor          : 'rgba(176, 224, 230,0.5)',
                            pointStrokeColor    : '#3b8bba',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(176, 224, 230,0.5)',
                            data                : <?php echo json_encode($fees_total);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                pointDot   :true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });
</script>









<script type="text/javascript">
 var ctx = document.getElementById("exchart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'bar',
              data:{
                      labels:<?php echo json_encode($month_expense); ?>,
                      datasets:[
                        {
                            label               : 'Expense Amount',
                            backgroundColor     : 'rgba(128, 128, 0,0.8)',
                            borderWidth          : 2,
                            borderColor         : 'rgba(128, 128, 0,1)',
                            pointRadius          : false,
                            pointColor          : 'rgba(128, 128, 0,0.8)',
                            pointStrokeColor    : '#3b8bba', 
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(128, 128, 0,0.8)',
                            data                : <?php echo json_encode($expense_amount);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });

</script>










<script type="text/javascript">

var ctx = document.getElementById("exlinechart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'line',
              data:{
                      labels:<?php echo json_encode($month_expense); ?>,
                      datasets:[
                        {
                            label               : 'Expense Amount',
                            backgroundColor     : 'rgba(238, 130, 238,0.5)',
                            borderWidth          : 10,
                            borderColor         : 'rgba(238, 130, 238,1)',
                            pointRadius          : true,
                            pointDotRadius      :50,
                            pointDotStrokeWidth : 15,
                            pointColor          : 'rgba(238, 130, 238,0.5)',
                            pointStrokeColor    : '#3b8bba',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(238, 130, 238,0.5)',
                            data                : <?php echo json_encode($expense_amount);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                pointDot   :true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });
</script>












<script type="text/javascript">
 var ctx = document.getElementById("purchase_chart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'bar',
              data:{
                      labels:<?php echo json_encode($month_purchase); ?>,
                      datasets:[
                        {
                            label               : 'Total Prices',
                            backgroundColor     : 'rgba(75, 0, 130,0.8)',
                            borderWidth          : 2,
                            borderColor         : 'rgba(75, 0, 130,1)',
                            pointRadius          : false,
                            pointColor          : 'rgba(75, 0, 130,0.8)',
                            pointStrokeColor    : '#3b8bba', 
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(75, 0, 130,0.8)',
                            data                : <?php echo json_encode($purchase_amount);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });

</script>










<script type="text/javascript">
var ctx = document.getElementById("purchaselinechart").getContext('2d');
          var myChart = new Chart(ctx, {
              type:'line',
              data:{
                      labels:<?php echo json_encode($month_purchase); ?>,
                      datasets:[
                        {
                            label               : 'Total Prices',
                            backgroundColor     : 'rgba(128, 0, 0,0.5)',
                            borderWidth          : 10,
                            borderColor         : 'rgba(128, 0, 0,1)',
                            pointRadius          : true,
                            pointDotRadius      :100,
                            pointDotStrokeWidth : 50,
                            pointColor          : 'rgba(128, 0, 0,0.5)',
                            pointStrokeColor    : '#3b8bba',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(128, 0, 0,0.5)',
                            data                : <?php echo json_encode($purchase_amount);?>, 
                        },

                      ]

              },

              options: {
                maintainAspectRatio : false,
                responsive : true,
                pointDot   :true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }



      });
</script>







@endsection





