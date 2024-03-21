@extends('dso.layouts.app')

@section('content')
<style>
    .fs-5 {
        font-size: 1.1em; 
    }
     .star{
        color: red;
        padding: 5px;
    }
    .dropzone .dz-preview .dz-image {
        width: 100px; 
        height: auto; 
    }

    .dropzone .dz-preview .dz-image img {
        width: 100%;
        height: 150px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery Application</h1>
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
                            <h3 class="card-title">Note: All fields with * are mandatory</h3>
                        </div>

                        <div class="card-body">

                           
                            <form class="row" method="post" id="dso-nursery-registration-form" action="{{ route('dso.saveNurseryDetail',$nursery->secure_id ?? '')}}">
                                    @csrf
                                <div class="row"  id="step2">
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">District</label> <span class='star'>*</span>
                                         <input type="text" class="form-control" name="district_id" value="{{ Auth::user()->district->name}}" id="district_id" readonly>

                                        @error('district_id')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Category of Nursery</label> <span class='star'>*</span>
                                        <select class="form-control cat_of_nursery" aria-label="Default select example" name="cat_of_nursery" id="cat_of_nursery">
                                            <option value="">-----Select-----</option>
                                            <option value="departmental" @if(!empty($nursery)) @if($nursery->cat_of_nursery == 'departmental') selected @endif @endif>Departmental</option>
                                        </select>
                                        @error('cat_of_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Name of Coach</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="coach_name" value="{{ $nursery->coach_name ?? ''}}" onkeypress="return /[a-zA-Z ]/i.test(event.key)" maxlength="50" id="coach_name" autocomplete="off">
                                        @error('coach_name')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label class="form-label">Name of Nursery</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="name_of_nursery" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="name_of_nursery" autocomplete="off" value="Department Coach" readonly>
                                        @error('name_of_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Venue of Nursery</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="head_pricipal" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="head_pricipal" autocomplete="off" value="{{ $nursery->head_pricipal ?? ''}}">
                                        @error('head_pricipal')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Email</label> <span class='star'>*</span>
                                        <input type="email" class="form-control" name="email" id="email" autocomplete="off" maxlength="50" value="{{ $nursery->email ?? '' }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Mobile Number</label> <span class='star'>*</span>
                                        <input type="text" name="mobile_number" pattern="[0-9]*" oninput="validateNumber(this)" class="form-control controlDiv" autocomplete="off"  maxlength="10" minlength="10" id="mobile_number" value="{{ $nursery->mobile_number ?? ''}}">
                                    </div>
                            
                                    
                                   
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Pin Code</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="pin_code" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="6" minlength="6" value="{{ $nursery->pin_code ?? ''}}" id="pin_code" autocomplete="off">
                                        @error('pin_code')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                  <div class="col-sm-6 mb-3">
                                        <label class="form-label">Game Applying For</label> <span class='star'>*</span>

                                        <select class="form-control" name="game_id" id="game_id" autocomplete="off">
                                        <option value="">-----Select-----</option>

                                            @foreach ($games as $game) { ?>
                                                <option value="{{$game['id']}}" @if(!empty($nursery)) @if($game['id'] == $nursery->game_id) selected @endif @endif>{{$game['name']}}</option>
                                            @endforeach
                                        </select>

                                        @error('game_id')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Nursery Address</label> <span class='star'>*</span>
                                        <textarea class="form-control" name="address" onkeypress = "return !/[<>]/.test(event.key)" id="address" autocomplete="off" >{{ $nursery->address ?? '' }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Sports Game Discipline(Gender)</label> <span class='star'>*</span>
                                        <select class="form-control game_discipline" name="game_disp" id="game_disp">
                                            <option value="">-----Select-----</option>
                                            <option value="girls" @if(!empty($nursery)) @if($nursery->game_disp =='girls') selected @endif @endif>Girls</option>
                                            <option value="boys" @if(!empty($nursery)) @if($nursery->game_disp =='boys') selected @endif @endif>Boys</option>
                                            <option value="mix" @if(!empty($nursery)) @if($nursery->game_disp =='mix') selected @endif @endif>Mix</option>
                                        </select>
                                        @error('game_disp')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2 gender" @if(!empty($nursery)) @if($nursery->game_disp == "") style="display: none;" @endif @else style="display: none;" @endif>
                                        <label class="form-label">No. of students playing concerned
                                            games</label><span class='star'>*</span>
                                        <div class="row">
                                            <div class="col-sm-3 boys" style="display : none;"><label class="form-label">Number of Boys</label></div>
                                            <div class="col-sm-3 boys" style="display : none;">
                                                <!-- <label class="form-label">Boys</label> <span class='star'>*</span> -->
                                                <input type="text" class="form-control" name="boys" id="boys" oninput="validateNumber(this)" maxlength="3" value="{{ $nursery->boys ?? '0'}}">

                                                @error('boys')
                                                <span class="invalid-feedback" role="alert"
                                                    style="display : block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-3 girls" style="display : none;"><label class="form-label">Number of Girls</label></div>
                                            <div class="col-sm-3 girls" style="display : none;">
                                               <!--  <label class="form-label">Girls</label> <span class='star'>*</span> -->
                                                <input type="text" class="form-control" name="girls" id="girls" oninput="validateNumber(this)" maxlength="3" value="{{ $nursery->girls ?? '0'}}">

                                                @error('girls')
                                                <span class="invalid-feedback" role="alert"
                                                    style="display : block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @if(empty($nursery))
                                    <div class="form-check mt-3">
                                      <input class="form-check-input" type="checkbox" id="term_app">
                                      <label class="form-check-label fw-normal" for="term_app">
                                      I undertake that Sports Nursery allotted to me as Departmental Coach shall be operated as per terms and conditions issued by the Sports Department, Government of Haryana. In case my Sports Nursery is found violating any instructions, the Government shall be free to take any administrative/civil/criminal action against me. 
                                      </label>
                                    </div>
                                    @endif
                                    <div class="col-sm-12 text-right mb-2">
                                        <button type="submit" class="btn btn-danger" id="nursery-details">Submit</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        populateGameDisp();
        function populateGameDisp() {
           var selectedOption = $("#game_disp").val();
            if(selectedOption === "mix") {
                $(".boys, .girls").show();
            }else if(selectedOption === "girls"){
                 $(".boys").hide();
                 $(".girls").show();
            }else if(selectedOption === "boys"){
                 $(".girls").hide();
                 $(".boys").show();
            }
        }
        
       

        $('.game_discipline').change(function(){
            $('.gender, .player_list').show();
           populateGameDisp();
        });     
        $("#dso-nursery-registration-form").submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Perform form validation
            var cat_of_nursery = $("#cat_of_nursery").val();
            if (!cat_of_nursery) {
                Swal.fire('Select Category of Nursery ', '', 'error');
                return false;
            }
            var coach_name = $("#coach_name").val();
            if (!coach_name) {
                Swal.fire('Enter Coach Name', '', 'error');
                return false;
            }
              var head_pricipal = $("#head_pricipal").val();
            if (!head_pricipal) {
                Swal.fire('Enter Venue of Nursery', '', 'error');
                return false;
            }
            var email = $("#email").val();
            if (!email) {
                Swal.fire('Enter Email', '', 'error');
                return false;
            }
            if (!isValidEmail(email)) {
                            Swal.fire('Enter valid email ID', '', 'error');
                            return false;
                        }
            var address = $("#address").val();
            if (!address) {
                Swal.fire('Enter Address', '', 'error');
                return false;
            } 
            var pin_code = $("#pin_code").val();
            if (!pin_code) {
                Swal.fire('Enter Pincode', '', 'error');
                return false;
            } 
       
             var game_id = $("#game_id").val();
            if (!game_id) {
                Swal.fire('Select Game', '', 'error');
                return false;
            }
            var game_disp = $("#game_disp").val();
            if (!game_disp) {
                Swal.fire('Select Game Discipline', '', 'error');
                return false;
            }
            if(game_disp == 'boys'){
                if(! $("#boys").val()){
                    Swal.fire('Select Number of Boys', '', 'error');
                    return false;
                }
            }else if(game_disp == 'girls'){
                if(! $("#girls").val()){
                    Swal.fire('Select number of Girls', '', 'error');
                    return false;
                }
            }else{
                if(! $("#girls").val() && ! $("#boys").val()){
                    Swal.fire('Select number of Girls and number of Boys', '', 'error');
                    return false;
                }
            }
            var nursery = "{{$nursery->id ?? ''}}";
            // alert(nursery);
            if(!nursery){
                if (!$("#term_app").prop('checked')) {
                    Swal.fire('Accept terms of application', '', 'error');
                    return false;
                }
            }
            
            this.submit();
        });

  
    });
     
    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>
