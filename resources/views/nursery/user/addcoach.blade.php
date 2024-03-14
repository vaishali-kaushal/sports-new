@extends('nursery.user.layouts.app')

@section('content')
<style>
    .fs-5 {
        font-size: 1.1em; 
    }
     .star{
        color: red;
        padding: 5px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Coach</h1>
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

                            <h4>Personal Details</h4>
                                <form class="row" method="post" id="coachForm"  enctype="multipart/form-data" action="{{ route('save.coachDetail')}}">
                                @csrf
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                        <label class="form-label">Name</label><span class='star'>*</span>
                                        <input type="text" name="coach_name" class="form-control" value="{{ $is_coach_exist->coach_name ?? ''}}" id="coach_name" autocomplete="off" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Father's Name</label><span class='star'>*</span>
                                        <input type="text" name="father_name" class="form-control" id="father_name" autocomplete="off" onkeypress="return /[a-zA-Z ]/i.test(event.key)" maxlength="50">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label>Mother's Name</label><span class='star'>*</span>
                                        <input type="text" name="mother_name" class="form-control" id="mother_name" autocomplete="off" onkeypress="return /[a-zA-Z ]/i.test(event.key)" maxlength="50">
                                        
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                    <label class="form-label">Gender</label><span class='star'>*</span>
                                    <select class="form-control" name="gender" id="gender" autocomplete="off">
                                        <option value="">-----Select-----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Date of Birth</label><span class='star'>*</span>
                                        <input type="text" name="dob" id="dob" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label>Mobile Number</label><span class='star'>*</span>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" pattern="[0-9]*" oninput="validateNumber(this)" autocomplete="off" maxlength="10">
                                        
                                    </div>
                                </div>
                                <div class="row col-12">
                                        <div class="form-group col-sm-4">
                                        <label class="form-label">Qualification</label><span class='star'>*</span>
                                        <select class="form-control" name="coach_qualification" id="coach_qualification" autocomplete="off">
                                            <option value="">-----Select-----</option>
                                            @foreach ($coach_qualification as $qualification)
                                            <option value="{{ $qualification['id'] }}" 
                                                @if (!empty($is_coach_exist) && $qualification['id'] == $is_coach_exist->coach_qualification) 
                                                    selected 
                                                @endif>
                                                {{$qualification['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    
                                   
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Pin Code</label><span class='star'>*</span>
                                        <input type="text" name="pin_code" id="pin_code" class="form-control" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="6" minlength="6" autocomplete="off">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label>Profile Photo</label><span class='star'>*</span>
                                        <input type="file" name="profile_photo" id="profile_photo" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                        <label class="form-label">Address</label><span class='star'>*</span>
                                        <textarea type="text" name="address" id="address" class="form-control" onkeypress = "return !/[<>]/.test(event.key)"></textarea> 
                                    </div>
                                </div>

                                <h4>Bank Account Details</h4>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                            <label class="form-label">Bank Account Number</label><span class='star'>*</span>
                                            <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="15" autocomplete="off">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Confirm Account Number</label><span class='star'>*</span>
                                        <input type="text" name="confirm_account_number" id="confirm_account_number" class="form-control" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="15" autocomplete="off">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label>Bank Name</label><span class='star'>*</span>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)" autocomplete="off">
                                        
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                            <label class="form-label">Bank Branch Address</label><span class='star'>*</span>
                                            <input type="text" name="bank_address" id="bank_address" class="form-control" onkeypress = "return !/[<>]/.test(event.key)" autocomplete="off">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">IFSC code</label><span class='star'>*</span>
                                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" maxlength="20" autocomplete="off">
                                    </div>
                                    
                                </div>
                                <h4>Upload Documents</h4>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                        <label class="form-label">ID Proof</label><span class='star'>*</span>
                                        <input type="file" name="id_proof" id="id_proof" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Qualification Document</label><span class='star'>*</span>
                                        <input type="file" name="qualification_doc" id="qualification_doc" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-4">

                                        <label class="form-label">Bank Passbook/Bank Statement</label><span class='star'>*</span>
                                        <input type="file" name="bank_passbook" id="bank_passbook" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col-sm-4">
                                        <div id="id_proof"></div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div id="qualification_doc">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div id="bank_passbook">
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class=" col-md-12 text-center">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<script>
     $(document).ready(function() {
        $("#dob").datepicker();
        $("#coachForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Perform form validation
            var coach_name = $("#coach_name").val();
            if (!coach_name) {
                Swal.fire('Enter Coach Name ', '', 'error');
                return false;
            }
            var father_name = $("#father_name").val();
            if (!father_name) {
                Swal.fire('Enter Father name', '', 'error');
                return false;
            }
            var mother_name = $("#mother_name").val();
            if (!mother_name) {
                Swal.fire('Enter Mother name', '', 'error');
                return false;
            }
            var gender = $("#gender").val();
            if (!gender) {
                Swal.fire('Enter Gender', '', 'error');
                return false;
            }
            var dob = $("#dob").val();
            if (!dob) {
                Swal.fire('Enter Date of Birth', '', 'error');
                return false;
            }
            var pin_code = $("#pin_code").val();
            if (!pin_code) {
                Swal.fire('Enter Pincode', '', 'error');
                return false;
            }
            var mobile_number = $("#mobile_number").val();
            if (!mobile_number) {
                Swal.fire('Enter Mobile number', '', 'error');
                return false;
            }
            var coach_qualification = $("#coach_qualification").val();
            if (!coach_qualification) {
                Swal.fire('Select Coach Qualification', '', 'error');
                return false;
            }
            var profile_photo = $("#profile_photo").val();
            if (!profile_photo) {
                Swal.fire('Upload Profile photo', '', 'error');
                return false;
            }

            var bank_account_number = $("#bank_account_number").val();
            if (!bank_account_number) {
                Swal.fire('Enter Bank account number', '', 'error');
                return false;
            }
            var confirm_account_number = $("#confirm_account_number").val();
            if (!confirm_account_number) {
                Swal.fire('Confirm Bank account number', '', 'error');
                return false;
            }
            if($("#bank_account_number").val() != $("#confirm_account_number").val()){
                Swal.fire('Confirm your bank account number', '', 'error');
                return false;
            }
            var bank_name = $("#bank_name").val();
            if (!bank_name) {
                Swal.fire('Enter Bank name', '', 'error');
                return false;
            }
            var bank_address = $("#bank_address").val();
            if (!bank_address) {
                Swal.fire('Enter Bank address', '', 'error');
                return false;
            }
            var ifsc_code = $("#ifsc_code").val();
            if (!ifsc_code) {
                Swal.fire('Enter IFSC code', '', 'error');
                return false;
            } 
            var id_proof = $("#id_proof").val();
            if (!id_proof) {
                Swal.fire('Upload ID Proof', '', 'error');
                return false;
            }
            var qualification_doc = $("#qualification_doc").val();
            if (!qualification_doc) {
                Swal.fire('Upload Qualification Document', '', 'error');
                return false;
            }
            var bank_passbook = $("#bank_passbook").val();
            if (!bank_passbook) {
                Swal.fire('Upload bank statement', '', 'error');
                return false;
            }

            // if (!$("#term_app").prop('checked')) {
            //     Swal.fire('Accept terms of application', '', 'error');
            //     return false;
            // }
            
            this.submit();
        });
    });

     function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>

@endsection