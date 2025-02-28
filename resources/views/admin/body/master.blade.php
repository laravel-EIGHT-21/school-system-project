<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Dell High | @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<link rel="shortcut icon" href="{{ asset($setting->logo) }}" type="image/x-icon">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<!--Font-Awesome-->


  <script src="https://kit.fontawesome.com/02761bcd61.js" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">




<!--Tables-->
<link rel="stylesheet" href="{{asset('Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


<!--Forms-->

<link rel="stylesheet" href="{{asset('Backend/plugins/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('Backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/bs-stepper/css/bs-stepper.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/dropzone/min/dropzone.min.css')}}">


<link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/jqvmap/jqvmap.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/daterangepicker/daterangepicker.css')}}">

<!-- Toastr -->
<link rel='stylesheet' type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css " >

<!-- Sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="{{asset('Backend/plugins/summernote/summernote-bs4.min.css')}}">


<link rel="stylesheet" href="{{asset('Backend/plugins/summernote/summernote-bs4.min.css')}}">


<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="24353445-1da8-4ec7-a3c5-631acc6a1358">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">



@include('admin.body.header')


@include('admin.body.sidebar')

<div class="content-wrapper">

@yield('admin') 

</div>


@include('admin.body.footer')


<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('Backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('Backend/dist/js/adminlte2167.js?v=3.2.0')}}"></script>

<script src="{{asset('Backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('Backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>


<script src="{{asset('Backend/dist/js/pages/dashboard2.js')}}"></script>

<!--Tables-->
<script src="{{asset('Backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('Backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('Backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!--Forms-->
<script src="{{asset('Backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

<script src="{{asset('Backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Backend/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<script src="{{asset('Backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<script src="{{asset('Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

<script src="{{asset('Backend/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script src="{{asset('Backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>


<script src="{{asset('Backend/plugins/summernote/summernote-bs4.min.js')}}"></script>


<!--SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{asset('Backend/js/pages/editor.js')}}"></script>
<script src="{{ asset('Backend/js/code.js') }}"></script>
<script src="{{ asset('Backend/js/handlebars.js') }}"></script>

<!--HandleBarsjs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

	<!--Toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	


  <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

  <script>

@if(Session::has('message'))

var type = "{{ Session::get('alert-type','info')}}"
switch(type){
  
  case 'info':
    toastr.info("{{Session::get('message')}}");
    break;

  case 'success':
  toastr.success("{{Session::get('message')}}");
  break;

  case 'warning':
  toastr.warning("{{Session::get('message')}}");
  break; 

  case 'error':
  toastr.error("{{Session::get('message')}}");
  break;

}

@endif

</script>	


<script type="text/javascript">


/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    var min = parseInt($('#min').val(), 10);
    var max = parseInt($('#max').val(), 10);
    var fees = parseFloat(data[5]) || 0; // use data for the age column
 
    if (
        (isNaN(min) && isNaN(max)) ||
        (isNaN(min) && fees <= max) ||
        (min <= fees && isNaN(max)) ||
        (min <= fees && fees <= max)
    ) {
        return true;
    }
    return false;
});


  $(function () {

    var table = $("#example5").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
    
        dom: 'Bfrtip',
        buttons: ['print']

    });
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup(function () {
        table.draw();
 
    });


    
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel","print","pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example44').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $('#example00').DataTable({
      "paging": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example002').DataTable({
      "paging": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example001').DataTable({
      "paging": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example003').DataTable({
      "paging": true,
      "autoWidth": false,
      "responsive": true,
    });
   
  });
</script>




<script>

  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  });

</script>




<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  
</script>



</body>

</html>
