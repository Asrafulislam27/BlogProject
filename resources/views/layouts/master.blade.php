<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


            <!-- App favicon -->
            <link rel="shortcut icon" href="{{asset('backend/assets/images/logo1.jpg')}}">

            <!-- jquery.vectormap css -->
            <link href="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

           

            <!-- DataTables -->
            <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

            <!-- Responsive datatable examples -->
            <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  

            <!-- Bootstrap Css -->
            <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
            <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
                <!--toastr Css -->
            <link href="{{asset('backend/assets/css/toastr/toastr.css')}}" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
            
            <!-- App Css-->
            <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body data-topbar="dark">
 <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
        @include('layouts.inc.admin-navbar')
            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.inc.admin-sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('admin')
                <!-- End Page-content -->
                
                @include('layouts.inc.admin-footer')
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>










        <!-- JAVASCRIPT -->
    

        <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    
        <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

        
        <!-- apexcharts -->
        <script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('backend/assets/js/pages/dashboard.init.js')}}"></script>
        <!-- Datatable init js -->
        <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

        <script src="{{asset('backend/assets/js/toastr.min.js')}}"></script>


        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" crossorigin="anonymous"></script>
        

        <!-- App js -->
        <script src="{{asset('backend/assets/js/app.js')}}"></script>

        <!-- Sweet alert For Deleted -->
        <script src="{{ asset('backend/assets/js/sweetalert2.all.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/code.js') }}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
    }
    @endif 
</script>
<script type="text/javascript">
    $('#mynote').summernote({

        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        
    });
    $('.dropdown-toggle').dropdown();
</script>

</body>
</html>