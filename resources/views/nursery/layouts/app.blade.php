<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Department</title>
    <link href="{{asset('forntend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('forntend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('forntend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('forntend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets/plugins/jquery')}}/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>
<style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999; 
        }

        #loading-image {
            width: 50px; 
            height: 50px; 
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

        .freeze { pointer-events:none; }
        .gen-instr h3 {font-size:18px; font-weight:600;margin-bottom:10px;}
        .gen-instr h4 {color:#fff; font-size:16px; padding:6px 10px;background:#b81121;font-weight:500;border-radius:5px;display:inline-block;width:100%;margin-bottom:10px;}
        .gen-instr ul li {margin-bottom:5px; line-height:20px; font-size:14px;}
        .gen-instr ul {margin-bottom:20px;}
        .gen-instr ul li b {margin:0 10px;}
       
        .otp_msg{
            color: red;
            font-weight: bold;
            font-size: smaller;
         }
    </style>


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


<body>
   
@yield('content')

</body>

</html>
