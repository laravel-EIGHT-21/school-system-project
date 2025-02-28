@extends('admin.admin_master')
@section('admin')


@section('title')
Employee`s Salary
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{ $allData['user']['name'] }}`s</span>  Salary Amount Picked Update</b></h1>
</div>

</div>
</div>
</section>

<section class="content"> 
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> <strong> Year :</strong> <b>{{ $allData->year }}</b> &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;</b>  <b> <strong> Month :</strong> <b>{{ $allData->month }}</b> </h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('account.salary.picked.update',$allData->id) }}">
	 	@csrf

    
<div class="row">

<div class="col-4">
<div class="form-group">
<label>Total Salary Amount<span style="color:red;"></span></label>
<input type="text" name="previous_salary" class="form-control" readonly value="{{$allData->previous_salary}}" > 
	 </div>
   </div>

<div class="col-4">
<div class="form-group">
<label>Salary Amount Picked<span style="color:red;"></span></label>
<input type="text" name="salary_picked" class="form-control" value="{{$allData->salary_picked}}" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Salary Amount Remaining<span style="color:red;"></span></label>
<input type="text" name="salary_left" class="form-control" readonly value="{{$allData->salary_left}}" > 
	 </div>
   </div>



   </div><!--End 1st Row-->




   @can('account-salary-view')
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Salary Amount Picked </button>
@endcan
                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>


	  

@endsection