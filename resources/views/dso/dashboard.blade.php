
@extends('dso.layouts.app')

@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                     
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$data['total_applications']}}</h3>

                                    <p>Total Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-bag"></i> -->
                                </div>
                                <a href="{{ route('dso.nurseryReport','total_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$data['pending_applications']}}</h3>
                                    <p>Pending for inspection </p>

                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-stats-bars"></i> -->
                                </div>
                                <a href="{{ route('dso.nurseryReport','pending_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $data['approved']}}</h3>

                                    <p>Approved Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-person-add"></i> -->
                                </div>
                                <a href="{{ route('dso.nurseryReport','approved_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$data['rejected']}}</h3>

                                    <p>Rejected Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-pie-graph"></i> -->
                                </div>
                                <a href="{{route('dso.nurseryReport','rejected_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
          
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
     
@endsection