
@extends('admin.layouts.app')

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
                                <a href="{{ route('admin.nurseryReport','total_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">


                                        <h3>{{$data['pending_applications']}}</h3>

                                        <!-- <sup style="font-size: 20px">%</sup> -->
                                  <p>Pending Application </p>

                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-stats-bars"></i> -->
                                </div>
                                <a href="{{ route('admin.nurseryReport','pending_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="{{ route('admin.nurseryReport','approved_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="{{route('admin.nurseryReport','rejected_applications')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <!-- district wise -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['districtCount'] }}</h3>

                                    <p>Total Districts Received Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-bag"></i> -->
                                </div>
                                <a href="{{ route('admin.districtReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-bg-success">
                                <div class="inner">
                                    <h3>{{ $data['govt']}}</h3>
                                    <p>Govt. Category Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-person-add"></i> -->
                                </div>
                                <a href="{{ route('admin.nurseryCategoryReport','govt')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $data['private']}}</h3>
                                    <p>Private Category Applications</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-person-add"></i> -->
                                </div>
                                <a href="{{ route('admin.nurseryCategoryReport','private')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                         <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$data['gameApp']}}</h3>
                                    <p>Total Number of Players</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-pie-graph"></i> -->
                                </div>
                                <a href="{{route('admin.gameDispReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                      
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                     <div class="row">
                        <div class="col-sm-3">
                            <canvas id="pieChart" width="200" height="100"></canvas>
                        </div>
                        <div class="col-sm-9">
                            <canvas id="barChart" width="200" height="100"></canvas>
                        </div>
                    </div>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <script>

            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                
                type: 'pie',
                data: {
                    labels: ['Total', 'Pending', 'Approved', 'Rejected'],
                    datasets: [{
                        data: {{ collect($data)->values() }},
                        backgroundColor: ['red', 'orange', 'green', 'blue']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Pie Chart'
                        },
                        legend: {
                            position: 'left',
                            labels: {
                                boxWidth: 10
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });

            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total', 'Pending', 'Approved', 'Rejected'],
                    datasets: [{
                        label: 'Bar Chart',
                        
                        data: {{ collect($data)->values() }},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        </script>

@endsection
