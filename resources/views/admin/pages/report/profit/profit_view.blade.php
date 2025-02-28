@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Monthly & Yearly Profits Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Profits Details </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

          <h4 class="card-title">Manage <strong>Monthly & Yearly Profits</strong></h4>

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

             <div class="row"> <!-- start 2nd row  -->
    


<div class="col-md-5">
<div class="form-group">
<label>Start Date <span class="text-danger">*</span></label>
<input type="date" name="start_date" id="start_date" class="form-control" > 
</div>

</div> <!-- End Col md 3 --> 

<div class="col-md-5">
<div class="form-group">
<label>End Date <span class="text-danger">*</span></label>
<input type="date" name="end_date" id="end_date" class="form-control" > 
</div>

</div> <!-- End Col md 3 --> 

<div class="col-md-4" style="padding-top: 30px;">
<a id="search" class="btn btn-info" name="search"> Search</a>

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

        <br>
        
<div class="row">
<div class="col-md-12">

<div id="DocumentResults">
 	<script id="document-template" type="text/x-handlebars-template">

<table class="table table-bordered table-striped" style="width: 100%;">
<thead>
<tr>
@{{{thsource}}}
</tr>
</thead>
<tbody>

<tr>
@{{{tdsource}}}	
</tr>

</tbody>
</table>

</script>
</div>
</div>
</div>
</div>



</section>
<br><br>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var start_date = $('#start_date').val(); 
    var end_date = $('#end_date').val();  
     $.ajax({
      url: "{{ route('report.profit.datewais.get')}}",
      type: "get",
      data: {'start_date':start_date,'end_date':end_date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>


@endsection
