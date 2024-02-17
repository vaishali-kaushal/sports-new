@extends($layout)

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="{{url('admin/add/dso')}}" class="btn btn-primary">Add DSO</a> -->

                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Nursery Name</th>
                                        <th>Email</th>
                                        <th>District</th>
                                        <th>Games</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($nurserys as $nn) {
                                        $n = $nn['nursery'];
// echo"<pre>";
//                                         print_r($nn);
//                                         print_r();
// die;
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        <td>
                                            <?= $n['name_of_nursery'] ?>
                                        </td>
                                        <td>
                                            <?= $n['email'] ?>
                                        </td>
                                        <td>
                                            <?= $n['district']['name'] ?>
                                        </td>
                                        <td>
                                            <?= $n['game']['name'] ?>
                                        </td>
                                        <td>
                                            <?php if($n['nursery_status']['approved_reject_by_dso'] == 0)
                                                {
                                                    echo 'Pending';
                                                }
                                                elseif ($n['nursery_status']['approved_reject_by_dso'] == 1) {
                                                    echo 'Recommended';
                                                }
                                                else {
                                                    echo 'Not Recommended';

                                                }
                                                
                                                ?>
                                        </td>

                                        <td>
                                            <a href="{{url('dso/nursery/view/').'/'.$n['secure_id']}}"
                                                class="btn btn-primary">View</a>
                                            <?php
                                                if ($n['nursery_status']['approved_reject_by_dso'] == 0) { ?>
                                            <a href="{{url('dso/nursery/report/').'/'.$n['secure_id']}}"
                                                class="btn btn-primary">Proceed</a>

                                            <?php  }  ?>

                                        </td>
                                    </tr>
                                    <?php  } ?>
                                </tbody>

                            </table>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>


@endsection