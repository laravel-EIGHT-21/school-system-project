@extends('admin.body.master')
@section('admin')


@section('title')
BookStock Purchases Report
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>





<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b>BookStock Purchases Report </b></h1> 
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">BookStock Reports </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">




<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"> <strong>BookStock Purchases Report Search By Date </strong></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">

<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">


<div class="card-body">
<div class="row">
<div class="col-md-12 ">
             
<form method="GET" action="{{ route('bookstock.report.pdf') }}" target="_blank" id="myForm">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Start Date <span class="text-danger"></span></label>
<input type="date" name="start_date" class="form-control" id="start_date" > 
</div>
</div> <!-- end col md 4 -->

    
<div class="col-md-6">
<div class="form-group">
<label>End Date <span class="text-danger"></span></label>
<input type="date" name="end_date" class="form-control" id="end_date" > 
</div>
</div> <!-- end col md 4 -->




<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info"  value="Search">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->




</form>
</div>
</div><!--End of row-->


</div>

</div>

</div>

</div><!--End of  main row-->

    

</div>
</div>


<br>


<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"> <strong>BookStock Purchases Report Search By Month </strong></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">

<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">


<div class="card-body">
<div class="row">
<div class="col-md-12 ">
             
<form method="GET" action="{{ route('monthly.bookstock.report.pdf') }}" target="_blank" id="myFormMonth">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Month<span class="text-danger"></span></label>
<input type="month" name="purchase_month" class="form-control" id="month" > 
</div>
</div> <!-- end col md 4 -->





<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info"  value="Search">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->




</form>
</div>
</div><!--End of row-->


</div>

</div>

</div>

</div><!--End of  main row-->

    

</div>
</div>

<br>




<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"> <strong>Annual BookStock Purchases Report Search </strong></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">

<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">


<div class="card-body">
<div class="row">
<div class="col-md-12 ">
             
<form method="GET" action="{{ route('yearly.bookstock.report.pdf') }}" target="_blank" >

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
    <label>Year</label>
    <input type="month" name="purchase_year" class="form-control" required > 
    </div> 


</div> <!-- end col md 4 -->





<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info"  value="Search">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->




</form>
</div>
</div><!--End of row-->


</div>

</div>

</div>

</div><!--End of  main row-->

    

</div>
</div>

<br>




</div>

</section>
<br>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                start_date: {
                    required : true,
                }, 
                 end_date: {
                    required : true,
                },
                 
            },
            messages :{
                start_date: {
                    required : 'Please Select Start Date',
                },
                end_date: {
                    required : 'Please Select End Date',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>





<script type="text/javascript">
    $(document).ready(function (){
        $('#myFormMonth').validate({
            rules: {
                month: {
                    required : true,
                }
                 
            },
            messages :{
                month: {
                    required : 'Please Select Month',
                }
                
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>




@endsection
