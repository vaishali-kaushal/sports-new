<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Department of Sports, Haryana</title>
  <link href="{{asset('forntend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('forntend/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('forntend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="login-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-5 col-sm-5 ms-auto pe-0 position-relative">
        <div class="login-side position-relative">
          <div class="login-content">
            <div class="dept-logo text-center">
              <img src="{{url('public/forntend')}}/images/department-logo.png" alt="sports department" width="120px">
            </div>
            <h1 class="text-white mt-3">Department of Sports Haryana <span>NURSERY MANAGEMENT SYSTEM</span></h1>
            <div class="login-form w-100 px-5 pt-4">
              <h1 class="text-white mt-3 text-center">Login Page</h1>
              <form action="{{url('login/')}}" method="post">
                @csrf
                <div class="mt-5">
                  <label class="form-label ">Enter your mobile number</label>
                  <input type="text" class="form-control" name="phone" pattern="[0-9]*" oninput="validateNumber(this)" autocomplete="off"  maxlength="10">
                  @error('email')
                  <span class="invalid-feedback" role="alert" style="display : block;">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                  @error('password')
                  <span class="invalid-feedback" role="alert" style="display : block;">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div> -->
                <div class="d-flex width-100 mt-3 justify-content-end">
                  <button type="submit" class="btn btn-danger ">Login</button>
                </div>
                <div class="text-center">
                  <a href="{{url('nursery/registration')}}" class="ms-2 text-white">Apply for new Nursery</a>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('forntend/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
<script>
  function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>