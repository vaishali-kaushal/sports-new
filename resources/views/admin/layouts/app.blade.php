<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sports</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href='{{ asset('forntend/css/theme.css') }}'>
    <script src="{{ asset('assets/plugins/jquery') }}/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<script>
    var csrf = "{{ csrf_token() }}";
    var baseRoute = "{{ url('/') }}";
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
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>


                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Name : {{ Auth::user()->name }} </a>
                </a>
                </li>

            </ul>

            <!-- SEARCH FORM -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon fas fa-user-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="#" class="dropdown-item">
                            Name : {{ Auth::user()->name }}
                        </a>
                        <a href="#" class="dropdown-item">
                            Email : {{ Auth::user()->email }}
                        </a>
                        <a href="#" class="dropdown-item">
                            Mobile : {{ Auth::user()->mobile }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('admin/changepassword') }}" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Change Password
                        </a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>

                    </a>

                </li>
                {{--  <li class="nav-item mr-2">
                    <a class="btn btn-primary" href="#" role="button">
                        Change Password
                    </a>
                </li>
                <li class="nav-item">

                    <a class="btn btn-primary" href="{{ url('logout') }}" role="button">
                        Logout
                    </a>
                </li>  --}}

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('admin/dashboard') }}" class="brand-link text-center">
                <img src="{{ url('public/forntend/images/department-logo.png') }}" alt="Sports"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <br>
                <span class="brand-text font-weight-light" style="font-size: 14px;">NURSERY MANAGEMENT SYSTEM</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas  fa-anchor"></i>
                                <p>
                                    Nursery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/list/r') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recommended</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/list/notr') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Not Recommended</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="{{ url('admin/nursery/list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending List</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/1') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Approved List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/2') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reject List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/nursery/3') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Objection List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{--  ========================================  --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/dso') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DSO List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coach List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Players List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        {{--  ========================================  --}}
                        <li class="nav-item ">
                            <!-- <a href="#" class="nav-link"> -->
                            <a href="{{ url('admin/game') }}" class="nav-link">
                                <i class="nav-icon fas  fa-gamepad"></i>
                                {{--  <i class="fa-solid fa-gamepad"></i>  --}}
                                <p>
                                    Games
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <!-- <a href="#" class="nav-link"> -->
                            <a href="{{ url('admin/district') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    District
                                </p>
                            </a>

                        </li>
                        {{--  <li class="nav-item">
                            <a href="{{ url('admin/dso') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    DSO
                                </p>
                            </a>

                        </li>  --}}








                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="row mb-2">
            <div class="col-sm-12">


            </div><!-- /.col -->
        </div><!-- /.row -->


        @yield('content')
        <footer class="main-footer">
            <!-- <strong>Copyright &copy; 2014-2019 <a href="">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.4
            </div> -->
        </footer>

        <!-- Control Sidebar -->

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
            $('#example2').DataTable({
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
</body>



</html>
