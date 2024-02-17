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
                                        <th>DSO Action</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($nurserys as $n) {
                                        $n = $n['nursery'];
                                       
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
                                                <a href="{{url('admin/nursery/view/').'/'.$n['secure_id']}}" class="btn btn-primary">View</a>

                                                <?php if ($n['nursery_status']['approved_by_admin_or_reject_by_admin'] == 0 && $n['nursery_status']['approved_reject_by_dso'] == 1 ) { ?>
                                                    <a href="{{url('admin/nursery/approve_reject').'/'.$n['secure_id']}}" class="btn btn-primary">Proceed</a>

                                                <?php  } ?>


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



<script>
    $(document).ready(function() {
        $('.approve').click(function() {
            let id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                // text: 'Some text.',
                type: 'success',
                showCancelButton: true,
                // confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No.'
            }).then((isConfirm) => {
                if (isConfirm.isConfirmed) {
                    window.location.replace("{{url('admin/nursery/status/update')}}/1/" + id);
                }
            });

        });
        $('.reject').click(function() {
            let id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                // text: 'Some text.',
                type: 'success',
                showCancelButton: true,
                // confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No.'
            }).then((isConfirm) => {


                if (isConfirm) {
                    if (isConfirm.isConfirmed) {
                        window.location.replace("{{url('admin/nursery/status/update')}}/2/" + id);
                    }
                }

            });

        });


    });
</script>
@endsection