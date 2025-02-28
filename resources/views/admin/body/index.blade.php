
@extends('admin.body.master')
@section('admin')
@section('title')
Dashboard
@endsection




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@php 


$employees = App\Models\User::where('status','active')->get();

$students = App\Models\Students::where('status',1)->get();


$library_books = App\Models\books::where('status',1)->get();

$school_subjects = App\Models\school_subjects::all();



$male_students = App\Models\Students::where('status',1)->where('gender','Male')->get();


$female_students = App\Models\Students::where('status',1)->where('gender','Male')->get();



$day_students = App\Models\Students::where('status',1)->where('day_boarding','Day')->get();


$boarding_students = App\Models\Students::where('status',1)->where('day_boarding','Boarding')->get();






$teachers = App\Models\User::where('status','active')->where('user_type',1)->get();


$non_teachers = App\Models\User::where('status','active')->where('user_type',2)->get();


$male_employees = App\Models\User::where('status','active')->where('gender','Male')->get();


$female_employees = App\Models\User::where('status','active')->where('gender','Female')->get();




@endphp



<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-8">
    <h1 class="m-0"><b><u><i>SUMMARY INFORMATION &nbsp; DASHBOARD</i></u></b></h1>
    </div>
    
    </div>
    </div>
    </div>


    
<br>





    
<section class="content">
    <div class="container-fluid">
    
    
        
<div class="row">
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Employees</b></span> 
    <span class="info-box-number">
    
        {{ count($employees) }}
    
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Students</b></span> 
    <span class="info-box-number">
    
        {{ count($students) }}
    
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Library Books</b></span>
    <span class="info-box-number">
        {{ count($library_books) }}
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Subjects</b></span>
    <span class="info-box-number">
        {{ count($school_subjects) }}
    </span>
    </div>
    
    </div>
    
    </div>
    
    </div>
    

    

<br>


<h3><b>Students` Detailed Information</b></h3>


        
<div class="row">
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Males Students</b></span> 
    <span class="info-box-number">
    
        {{ count($male_students) }}
    
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Female Students</b></span> 
    <span class="info-box-number">
    
        {{ count($female_students) }}
    
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Day Students</b></span>
    <span class="info-box-number">
        {{ count($day_students) }}
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Boarding Students</b></span>
    <span class="info-box-number">
        {{ count($boarding_students) }}
    </span>
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    

        

<br>


<h3><b>Employees` Detailed Information</b></h3>
    
        
<div class="row">
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Teaching Staff</b></span> 
    <span class="info-box-number">
    
        {{ count($teachers) }}
    
    </span>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>All Non-Teaching Staff</b></span> 
    <span class="info-box-number">
    
        {{ count($non_teachers) }}
    
    </span>
    </div>
    
    </div>
    
    </div>




    <div class="col-12 col-sm-3 col-md-3">
        <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
        <span class="info-box-text"><b>Female Employees</b></span> 
        <span class="info-box-number">
        
            {{ count($female_employees) }}
        
        </span>
        </div>
        
        </div>
        
        </div>




        <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><b>Male Employees</b></span> 
            <span class="info-box-number">
            
                {{ count($male_employees) }}
            
            </span>
            </div>
            
            </div>
            
            </div>


    
</div>
    
    <br>
    
    
    
    </div>
    </section>
    
    
    








@endsection