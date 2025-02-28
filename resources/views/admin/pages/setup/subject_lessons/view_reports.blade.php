
@extends('admin.body.master')
@section('admin')


@section('title')
Lessons Schedules Report
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Lessons Schedules Report</h1>
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
                    <h3 class="card-title"><b>Lessons Schedules Report</b></h3>
                  </div>
                  <!-- /.card-header -->
        
        <div class="card-body">
        <div class="row">
        <div class="col-md-12 ">
        
            <form method="get" action="{{ route('lessons.schedule.teacher.get') }}" target="_blank">
                @csrf
                     <div class="row"> <!-- start 2nd row  -->
        
                        
        
          <div class="col-md-4">
            <div class="form-group">
            <label> Term <span class="text-danger"></span></label>
            <select id="term" name="term" class="form-control select2" data-allow-clear="true">
              <option value="">Select Term</option>
              <option value="Term 1">Term 1 </option>
              <option value="Term 2">Term 2 </option>
              <option value="Term 3">Term 3 </option>
              </select>
            </div>
            </div> 
        
            <div class="col-md-4">
            <div class="form-group">
                <label>Select Teacher</label>
                <select name="user_id" id="user_id"  required="" class="form-control select2">
                <option value="" selected="" disabled="">Select Teacher</option>
                @foreach($teachers as $term)
                <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
                </select> 
                </div> 
            </div>

        
                            
        
        <div class="col-md-3" style="padding-top: 30px;">
            <input type="submit" class="btn btn-rounded btn-info" name="search" value="Submit">
            
            </div> <!-- end col md 4 -->
            
        


        
        
        </div> <!-- end 2nd row  -->
        
         
        
        
                                            </form>
                                    </div>
                                </div><!--End of row-->
        
        
                                    </div>
        
                                    </div>
        
                                    </div>
        
                                    </div><!--End of  main row-->
        
        

   
<br>








   
   
   </div>
   </section>

   

@endsection
