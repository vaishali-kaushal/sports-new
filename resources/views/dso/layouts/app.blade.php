<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Department of Sports, Haryana</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> -->
    <!-- DataTables Buttons JavaScript -->
    <!-- <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href='{{asset("forntend/css/theme.css")}}'>
    <script src="{{asset('assets/plugins/jquery')}}/jquery.min.js"></script>
    <!-- <script src="/jquery.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<script>
    var csrf = "{{csrf_token()}}";
    var baseRoute = "{{url('/')}}";
</script>


@if ($message = Session::get('success'))

<script>
    $(document).ready(function() {
        Swal.fire(
            'NURSERY MANAGEMENT SYSTEM',
            '{{ $message }}',
            'success'
        )

    });
</script>
@endif

@if ($message = Session::get('error'))

<script>
    $(document).ready(function() {
        Swal.fire(
            'NURSERY MANAGEMENT SYSTEM',
            '{{ $message }}',
            'error'
        )

    });
</script>
@endif


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php 

$profile = App\Models\User::where('secure_id',Auth::user()->secure_id)->first();

?>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>-->

      <li class="nav-item d-none d-sm-inline-block">



<a href="#" class="nav-link"> {{$profile->name}}</a>
      </li> 
            </ul>
            <ul class="navbar-nav">
            

      <li class="nav-item d-none d-sm-inline-block">



        <a href="#" class="nav-link"> {{$profile->district->name}}</a>
      </li> 
            </ul>

            <!-- SEARCH FORM -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <!-- <li class="nav-item mr-2">
                    <a class="btn btn-primary" href="#" role="button">
                        Change Password
                    </a>
                </li> -->
                <li class="nav-item">

                    <a class="btn btn-primary" href="{{url('logout')}}" role="button">
                        Logout
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('dso/dashboard') }}" class="brand-link text-center">
                <img src="{{ url('public/forntend/images/department-logo.png') }}" alt="Sports"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <br>
                <span class="brand-text font-weight-light" style="font-size: 14px;">NURSERY MANAGEMENT SYSTEM</span>
            </a>
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                         <li class="nav-item ">
                            <!-- <a href="#" class="nav-link"> -->
                            <a href="{{ url('dso/dashboard') }}" class="nav-link {{ Request::is('dso/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>
                        <li class="nav-item {{ Request::is('dso/nursery*') ? 'menu-open' : '' }}">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas  fa-anchor"></i>
                                <p>
                                    Nursery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('dso/nursery')}}" class="nav-link {{ Request::is('dso/nursery') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{url('dso/nursery/pendingapproval/recommended')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recommended for Approval</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{url('dso/nursery/pendingapproval/notrecommended')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Not Recommended</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{url('dso/nursery/approvedList')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Approved by Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{url('dso/nursery/reject/list')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reject by Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{url('dso/nursery/objection/list')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Objection by Admin</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <!-- <a href="#" class="nav-link"> -->
                            <a href="{{ route('dso.nurseryList') }}" class="nav-link {{ Request::is('dso/nursery/registration') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Add New Nursery
                                </p>
                            </a>

                        </li>
                        <!-- <li class="nav-item has-treeview menu-open">
                            <a href="{{url('admin/service/type/list')}}" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Service Type
                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{url('admin/service/category/list')}}" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Service category
                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{url('admin/service/sub/list')}}" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Sub Service
                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{url('admin/section/list')}}" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                               Sections
                                </p>
                            </a>

                        </li> -->






                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')
        <footer class="main-footer">
            <!-- <strong>Copyright &copy; 2014-2019 <a href="">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.4
            </div> -->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->


</body>

</html>
<style>
    .error-msg {
        color: red;
    }

    .hide {
        display: none;
    }
</style>
<script>
$(document).ready(function() {

     $('#datatable').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

});
</script>
