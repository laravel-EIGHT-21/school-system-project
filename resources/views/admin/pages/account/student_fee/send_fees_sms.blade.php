@extends('admin.admin_master')
@section('admin')


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<h1>Send SMS to Parents About School Fees Information</h1>
</div>

</div>
</div>
</section>



 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b> Send Sms to Parents</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

            <div class="panel-body">
               @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                   </div>
               @endif
 
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif

<form action="{{ route('send.message') }}" method="post" enctype="multipart/form-data">
                  @csrf  

         <div class="row"> <!-- start 2nd row  -->

             
<div class="col-md-6">
<div class="form-group">
<label>Enter Parent Telephone Number </label>
<input class="form-control" type="text" name="mobile" id=" " autocomplete="off"  required />

</div>
</div> <!-- end col md 4 -->

 
</div> <!-- end 2nd row  -->

<div class="row">

<div class="col-md-6">
         <div class="form-group">
    <label >Enter Message</label>
   
      <textarea name="message" id="" class="form-control" rows="4" placeholder="Enter Message" required></textarea>

    </div>
  </div><!-- end col md 4 -->

 <!-- end 2nd row  -->

</div>




<br>

<button type="submit"  class="btn btn-rounded btn-primary mb-5">Send SMS Message to Parent </button>

                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

        </div>

        </div>
    </div>
   
    <br><br>
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->



 



@endsection