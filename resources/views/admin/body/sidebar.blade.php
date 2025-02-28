
@php 

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();



$id = Auth::user()->id;
$adminId = App\Models\User::find($id);
$status = $adminId->status; 

$setting = App\Models\SiteSetting::find(1);

$admindata = App\Models\User::find($id);
@endphp


<aside class="main-sidebar sidebar-light-primary elevation-4">

<a href="{{ url('/') }}" class="brand-link">
<img src="{{ asset($setting->logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
</a>

<div class="sidebar">



<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{(!empty($admindata->profile_photo_path))? url('upload/admin_images/'.$admindata->profile_photo_path):url('upload/no_image.jpg') }}" id="showImage" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
</div>
<div class="info">
<a href="#" class="d-block"><b>{{$admindata->name}}</b></a>
</div>
</div>

<div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div>

<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

<li class="nav-item menu-open">
<a href="{{ url('dashboard') }}" class="nav-link {{ ($route == 'dashboard')? 'active':'' }} ">
<i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
<p>
Dashboard
 
</p>
</a>

</li>



<li class="nav-item">
<a href="#" class="nav-link {{ ($prefix == '/setups')?'active':'' }}">
 <i class="nav-icon fas fa-cogs" style="color:red;"></i>
<p>
System Setup
<i class="right fas fa-angle-left" style="color:green;"></i>
</p>
</a>
<ul class="nav nav-treeview">


<li class="nav-item">
<a href="{{route('user.roles.view')}}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>System Users</p>
</a> 
</li>



<li class="nav-item">
<a href="{{ route('class.session.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Class Sessions</p>
</a>
</li>



<li class="nav-item">
<a href="{{ route('fee.category.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Fee Category</p>
</a>
</li>





<li class="nav-item">
<a href="{{ route('fee.amount.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Fee Category Amounts</p>
</a>
</li>


<li class="nav-item">
<a href="{{ route('school.subject.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>School Subjects</p>
</a>
</li>





<li class="nav-item">
<a href="{{ route('subject.competency.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Subject Competencies</p>
</a>
</li>





<li class="nav-item">
<a href="{{ route('lessons.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Lessons Timetable</p>
</a>
</li>


<li class="nav-item">
<a href="{{ route('designation.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Designations</p>
</a>
</li>





<li class="nav-item">
<a href="{{ route('marks.entry.grade') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> O-level Grading</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('competency.grades.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Competency Grading</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('points.entry.grade') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> A-Level Grading</p>
</a>
</li>




<li class="nav-item">
<a href="{{route('user.roles.list')}}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>User Groups</p>
</a>
</li>





<li class="nav-item">
<a href="{{route('permissions.view')}}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>User Permissions</p>
</a>
</li>





</ul>
</li>




<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-users" style="color:red;"></i>
    <p>
    Students Information
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



        <li class="nav-item">
            <a href="{{route('student.admissions.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Admissions</p>
            </a>
            </li>


            

<li class="nav-item">
    <a href="{{route('student.registration.view')}}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>All Students</p>
    </a>
    </li>



                

<li class="nav-item">
    <a href="{{route('students.class.promote')}}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Class Promotion</p>
    </a>
    </li>



    
<li class="nav-item">
    <a href="{{route('students.term.change')}}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Term Change</p>
    </a>
    </li>



    
<li class="nav-item">
    <a href="{{route('student.information.filter')}}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Filter</p>
    </a>
    </li>



    
@can('alevel-students-subjects-view')
<li class="nav-item">
<a href="{{ route('assign.student.subject.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Students` Subjects</p>
</a>
</li>
@endcan




    </ul>
</li>



@can('employees-view')

<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-users" style="color:red;"></i>
    <p>
    Employees Details
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



        <li class="nav-item">
            <a href="{{route('employees.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>All Employees</p>
            </a>
            </li>
        
        
        
                        
        
        <li class="nav-item">
            <a href="{{route('employee.leave.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Employees` Leave</p>
            </a>
            </li>
        
        
                        
        <li class="nav-item">
            <a href="{{route('employee.attendance.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Employees` Attendance</p>
            </a>
            </li>
        

                                    
        <li class="nav-item">
            <a href="{{route('general.attendance.report.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Attendance Reports</p>
            </a>
            </li>
        
            
        <li class="nav-item">
            <a href="{{route('teacher.subject.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Teachers Subjects</p>
            </a>
            </li>
        
            


@can('attend-report-view')
<li class="nav-item">
<a href="{{ route('lessons.schedule.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Lessons Reports</p>
</a>
</li>
@endcan

        
        

    </ul>
</li>
@endcan



@can('olevel1-attend-view')

@php 

$id = Auth::user()->id;

$date = Carbon\Carbon::now()->format('l d F Y');

$teacher = App\Models\employee_attendance::where('date', $date)->where('user_id',$id)->where('attend_status','Present')->first();

@endphp

@if($teacher == NULL)
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-solid fa-users-line" style="color:red;"></i>

<p>
Students Attendance
<i class="right fas fa-angle-left" style="color:green;"></i>
</p>
</a>

<ul class="nav nav-treeview">


    @can('olevel1-attend-create')

    <li class="nav-item">
    <a href="{{ route('students.attendance.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Enter Attendance </p>
    </a>
    </li>
    @endcan
    
    
    
    <li class="nav-item">
    <a href="{{ route('students.general.attendance.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>General Attendance </p>
    </a>
    </li>


        
    <li class="nav-item">
        <a href="{{ route('students.attendance.reports.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Attendance Reports </p>
        </a>
        </li>

</ul>

</li>

@else

@endif


@endcan




@can('students-marks-create')
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-solid fa-user-graduate" style="color:red;"></i>
<p>
Academics
<i class="right fas fa-angle-left" style="color:green;"></i>
</p>
</a>

<ul class="nav nav-treeview">

@can('students-marks-create')
<li class="nav-item">

<a href="{{ route('teacher.lessons.schedule.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Lessons Schedules</p>
</a>
</li>
@endcan





<li class="nav-item">
<a href="#" class="nav-link">
 <i class="nav-icon fas fa-chart-line" style="color:red;"></i>
<p>
O-Level

</p>
</a>
<ul class="nav nav-treeview">


@can('students-marks-create')
<li class="nav-item">
<a href="{{ route('marks.entry.add') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Marks Entry(Primary)</p>
</a>
</li>
@endcan



@can('students-marks-create')
<li class="nav-item">
<a href="{{ route('competency.results.add') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Competency Based</p>
</a>
</li>
@endcan


@can('olevel-marks-view')
<li class="nav-item">
<a href="{{ route('marks.olevel.entry.add') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Marks Entry(S3 & S4)</p>
</a>
</li>
@endcan



</ul>
</li>



@can('alevel-points-view')
<li class="nav-item ">
<a href="#" class="nav-link" >
<i class="nav-icon far fa-envelope" style="color:red;"></i>
<p>
A-Level
</p>
</a>

<ul class="nav nav-treeview">    


@can('alevel-points-view')
<li class="nav-item">
<a href="{{ route('alevel.marks.entry.add') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Points Entry</p>
</a>
</li>
@endcan


</ul>
</li>
@endcan






<li class="nav-item">
    <a href="{{ route('marksheet.generate.view') }}" class="nav-link">
     <i class="nav-icon fas fa-chart-line" style="color:red;"></i>
    <p>
    Students Exam Reports
    
    </p>
    </a>
</li>

    

</ul>

</li>
@endcan








<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-money-bill" style="color:red;"></i>
    <p>
    Schoolfees  Collection
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



        <li class="nav-item">
            <a href="{{route('student.fee.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Schoolfees Details</p>
            </a>
            </li>
        
        
            
@can('students-fees-get')
<li class="nav-item">
<a href="{{ route('get.student.fee') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>New Fees Payments</p>
</a>
</li> 
@endcan
        

@can('students-fees-view')
<li class="nav-item">
<a href="{{ route('student.fee.filtration.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Fees Filtration</p>
</a>
</li>
@endcan


            @can('account-salary-view')
            <li class="nav-item">
            <a href="{{ route('schoolfees.statment.view') }}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p> Fees Statements</p>
            </a>
            </li>  
            @endcan

                    
            @can('account-salary-view')
        <li class="nav-item">
            <a href="{{route('student.fees.reports.view')}}" class="nav-link">
            <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
            <p>Schoolfees Reports</p>
            </a>
            </li>
        @endcan
        
        

    </ul>
</li>


@can('other-cost-view')

<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-money-bill" style="color:red;"></i>
    <p>
    Expenses Information
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



        @can('account-salary-view')
        <li class="nav-item">
        <a href="{{ route('account.salary.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>All Employees` Salary</p>
        </a>
        </li>
        @endcan 
        
        
        @can('account-salary-view')
        <li class="nav-item">
        <a href="{{ route('employee.salary.report.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Salary Report</p>
        </a>
        </li>
        @endcan 
        
        
        @can('other-cost-view')
        <li class="nav-item">
        <a href="{{ route('other.cost.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Expenses Details</p>
        </a>
        </li>
        @endcan
        
        
        
        @can('other-cost-view')
        <li class="nav-item">
        <a href="{{ route('other.cost.cate.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Expense Category</p>
        </a>
        </li>
        @endcan
        
        @can('other-cost-view')
        <li class="nav-item">
        <a href="{{ route('other.cost.report.view') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Expenses Report</p>
        </a>
        </li>
        @endcan
        

    </ul>
</li>
@endcan






@can('other-cost-view')
<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-money-bill" style="color:red;"></i>
    <p>
    Puchases Information
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



@can('other-cost-view')
<li class="nav-item">
<a href="{{ route('view.products') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Purchase Items</p>
</a>
</li>

<li class="nav-item" >
    <a href="{{ route('general.item.cate.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Purchase Categories </p>
    </a>
    </li>
    

    

<li class="nav-item" >
<a href="{{ route('purchase.all') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>All Purchases</p>
</a>
</li>



<li class="nav-item" >
<a href="{{ route('view.purchases.reports') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Purchases Report</p>
</a>
</li>
@endcan



</ul>
</li>
@endcan








@can('other-cost-view')

<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-money-bill" style="color:red;"></i>
    <p>
    Financial Statement
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">



        
        
        @can('other-cost-view')
        <li class="nav-item">
        <a href="{{ route('income.statement.reports') }}" class="nav-link">
        <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
        <p>Reports</p>
        </a>
        </li>
        @endcan
        
        
        

    </ul>
</li>
@endcan





@can('issue-books-view')
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-solid fa-school" style="color:red;"></i>
<p>
 School Library 
<i class="right fas fa-angle-left" style="color:green;"></i>
</p>
</a>

<ul class="nav nav-treeview">

@can('library-books-details')
<li class="nav-item">
<a href="{{ route('books.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Books Listed</p>
</a>
</li>
@endcan



@can('authors-view')
<li class="nav-item">
<a href="{{ route('authors.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> Book Authors </p>
</a>
</li>
@endcan


@can('books-cates-details')
<li class="nav-item">
<a href="{{ route('category.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> Book Categories</p>
</a>
</li>
@endcan




@can('issue-books-view')
<li class="nav-item">
<a href="{{ route('library.books-issued.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>All Books Issued</p>
</a>
</li>
@endcan



@can('issue-books-returned')
<li class="nav-item">
<a href="{{ route('returned-books') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>All Books Returned</p>
</a>
</li>
@endcan



@can('issue-books-less-returned')
<li class="nav-item">
<a href="{{ route('less-returnedbooks') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Less Books Returned</p>
</a>
</li>
@endcan



@can('issue-books-less-returned')
<li class="nav-item">
<a href="{{ route('damaged-booksreturned') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Damaged Returned </p>
</a>
</li>
@endcan


@can('issue-books-view')
<li class="nav-item">
<a href="{{ route('nondamaged.books.submitted') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Non-Damaged Books </p>
</a>
</li>
@endcan


@can('issue-books-view')
<li class="nav-item">
<a href="{{ route('less.books.submitted') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Less Books Submitted</p>
</a>
</li>
@endcan



<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-book" style="color:red;"></i>
    <p>
     Library Stock
    
    </p>
    </a>
    <ul class="nav nav-treeview">
    
    
    @can('library-books-details')
    
    <li class="nav-item">
    <a href="{{ route('library.bookstock.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Book Purchases </p>
    </a>
    </li>
    
    
    
    <li class="nav-item" >
    <a href="{{ route('bookstock.pending') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Book-Stock Approval</p>
    </a>
    </li>
     
    
    
    <li class="nav-item" >
    <a href="{{ route('bookstock.report') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p>Book-Stock Reports</p>
    </a>
    </li>
    
    @endcan
    
    
    
    </ul>
    </li>    



</ul>

</li>
@endcan







@can('sickbay-medicine-list')
<li class="nav-item">
<a href="#" class="nav-link ">
<i class="nav-icon fa-solid fa-hospital" style="color:red;"></i>
<p>
School Clinic
<i class="right fas fa-angle-left" style="color:green;"></i>
</p>
</a>

<ul class="nav nav-treeview">


@can('sickbay-medicine-view')
<li class="nav-item">
<a href="{{ route('medicine.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Medicine List</p>
</a>
</li>
@endcan

@can('sickbay-view')
<li class="nav-item">
<a href="{{ route('issued.medics.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Issued Medications</p>
</a>
</li>
@endcan

@can('sickbay-view')
<li class="nav-item">
<a href="{{ route('finished.medics.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Finished Medications</p>
</a>
</li>
@endcan


@can('medical-cate-view') 
<li class="nav-item">
<a href="{{ route('medical.supply.list.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> Supplies List</p>
</a>
</li>
@endcan


@can('medical-cate-view')
<li class="nav-item">
<a href="{{ route('medicine.category.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Medication Categories</p>
</a>
</li>
@endcan




<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fa-solid fa-notes-medical" style="color:red;"></i>
    <p>
     Clinic Stock
    
    </p>
    </a>
    <ul class="nav nav-treeview">
    
    
   

@can('sickbay-medicine-list')
<li class="nav-item">
<a href="{{ route('medicine.stock.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Medicine Stock</p>
</a> 
</li>
@endcan


@can('medical-cate-view') 
<li class="nav-item">
<a href="{{ route('medical.supplies.stock.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p> Supplies Stock</p>
</a>
</li>
@endcan



@can('medical-cate-view')
<li class="nav-item">
<a href="{{ route('medicines.purchased.reports.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Medicine Reports</p>
</a>
</li>
@endcan



@can('medical-cate-view')
<li class="nav-item">
<a href="{{ route('medical.suppies.purchased.reports.view') }}" class="nav-link">
<i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
<p>Supplies Reports</p>
</a>
</li>
@endcan

    
    
    
    </ul>
    </li>    







</ul>

</li>
@endcan




@can('other-cost-view')
<li class="nav-item">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-chart-line" style="color:red;"></i>
    <p>
    Income Charts
    <i class="right fas fa-angle-left" style="color:green;"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    
    
    <li class="nav-item">
    <a href="{{ route('charts.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p> Years</p>
    </a>
    </li> 
    
    
    
    

    <li class="nav-item">
    <a href="{{ route('current.charts.view') }}" class="nav-link">
    <i class="fas fa-angle-double-right nav-icon" style="color:green;"></i>
    <p> Year & Terms</p>
    </a>
    </li> 

    
    
    </ul>
    </li>
    @endcan


</ul>
</nav>

</div>

</aside>
