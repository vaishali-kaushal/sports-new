@extends($layout)

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Games</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{url('admin/add/game')}}" class="btn btn-primary">Add Game</a>

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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($games as $game){ ?>
                                    <tr>
                                        <td>
                                            <?=$i++ ?>
                                        </td>
                                        <td>
                                            <?=$game['name']?>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/edit/game/').'/'.$game['id']}}" class="btn btn-primary">Edit</a>
                                            <!-- <a href="" class="btn btn-primary">Delete</a> -->
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