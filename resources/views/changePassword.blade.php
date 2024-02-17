@extends($layout)

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6 text-right">

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
                            </div>

                            <div class="card-body">


                                <form class="" action="{{ url('admin/store/district') }}" method="post">

                                    @csrf
                                    <div class="row d-flex justify-content-center">
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="text" value="" class="form-control" name="district">
                                            @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row d-flex justify-content-center">
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="text" value="" class="form-control" name="district">
                                            @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row d-flex justify-content-center">
                                        <div class="form-group col-sm-6 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>


                                        </div>
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
