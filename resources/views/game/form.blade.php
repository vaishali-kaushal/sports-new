@extends($layout)

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{!empty($game->id)? 'Update' : 'Add'}} Game</h1>
                </div>
                <div class="col-sm-6 text-right">

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
                            <?php
                            if (!empty($game->id)) {


                            ?>
                                <form class="row" action="{{url('admin/update/game').'/'.$game->id}}" method="post">
                                <?php } else { ?>

                                    <form class="row" action="{{url('admin/store/game')}}" method="post">

                                    <?php } ?>
                                    @csrf
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Game Name</label>
                                        <input type="text" value="{{!empty($game->name)?$game->name : ''}}" class="form-control" name="name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-primary">Save</button>

                                    </div>

                                    </form>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>


@endsection