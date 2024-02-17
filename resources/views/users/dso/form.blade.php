@extends($layout)

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{!empty($user->name)?'Edit' :'Add' }} DSO</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="" class="btn btn-primary">Add DSO</a> -->

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

                            <?php if (!empty($user->id)) { ?>
                                <form class="row" method="post" action="{{url('admin/update/dso').'/'.$user->id}}">

                                <?php } else { ?>

                                    <form class="row" method="post" action="{{url('admin/store/dso')}}">
                                    <?php   } ?>
                                    @csrf
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{!empty($user->name)?$user->name :'' }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert" style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{!empty($user->email)?$user->email :'' }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert" style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" value="{{!empty($user->mobile)?$user->mobile :'' }}">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert" style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">District</label>
                                        <select class="form-control" name="district_id">
                                            <option value="">-----Select District------</option>
                                            <?php foreach ($districts as $district) { ?>

                                                <option value="{{$district['id']}}" <?php
                                                                                    if (!empty($user->district_id)) {
                                                                                        if ($user->district_id == $district['id']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>{{$district['name']}}</option>


                                            <?php } ?>
                                        </select>
                                        @error('district_id')
                                        <span class="invalid-feedback" role="alert" style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <?php if (empty($user->id)) { ?>

                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="pwd">
                                            @error('pwd')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" name="cpwd">
                                            @error('cpwd')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    <?php } ?>
                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>

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