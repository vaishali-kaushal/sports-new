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
                 
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-5">
                        <form class="regis-form" method="post">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label">Category of Nursery</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="cat_of_nursery">
                                        <option <?php if (empty($nursery['cat_of_nursery'])) {
                                                    echo "selected";
                                                } ?>>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['cat_of_nursery'])) {
                                                                if ($nursery['cat_of_nursery'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Private
                                        </option>
                                        <option value="2" <?php if (!empty($nursery['cat_of_nursery'])) {
                                                                if ($nursery['cat_of_nursery'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Government
                                        </option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Games</label>


                                    <input disabled type="text" class="form-control" name="name_of_nursery" value="{{!empty($nursery['game']['name']) ? $nursery['game']['name'] : '' }}">

                                </div>
                                <!-- </div> -->
                                <div class="col-sm-6">
                                    <label class="form-label">District</label>
                                    <select disabled class="form-control" name="district_id">
                                        <option value="">-----Select District------</option>
                                        <?php foreach ($districts as $district) { ?>

                                            <option value="{{$district['id']}}" <?php if (!empty($nursery['district_id'])) {
                                                                                    if ($nursery['district_id'] == $district['id']) {
                                                                                        echo "selected";
                                                                                    }
                                                                                } ?>>{{$district['name']}}</option>


                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Type of Nursery</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="type_of_nursery">
                                        <option <?php if (empty($nursery['type_of_nursery'])) {
                                                    echo "selected";
                                                } ?>>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['type_of_nursery'])) {
                                                                if ($nursery['type_of_nursery'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>School
                                        </option>
                                        <option value="2" <?php if (!empty($nursery['type_of_nursery'])) {
                                                                if ($nursery['type_of_nursery'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Institute
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Name of Nursery</label>
                                    <input disabled type="text" class="form-control" name="name_of_nursery" value="{{!empty($nursery['name_of_nursery']) ? $nursery['name_of_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address">{{!empty($nursery['address']) ? $nursery['address'] : '' }}</textarea>

                                </div>
                             <!--    <div class="col-sm-6">
                                    <label class="form-label">PAN No. (for private only)</label>
                                    <input disabled type="text" class="form-control" name="pan_private" value="{{!empty($nursery['pan_private']) ? $nursery['pan_private'] : '' }}">
                                </div> -->
                                <div class="col-sm-6">
                                    <label class="form-label">Registration No. of Society who will be running
                                        Nursery</label>
                                    <input disabled type="text" class="form-control" name="reg_no_running_nursery" value="{{!empty($nursery['reg_no_running_nursery']) ? $nursery['reg_no_running_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Name of Head/Principal</label>
                                    <input disabled type="text" class="form-control" name="head_pricipal" value="{{!empty($nursery['head_pricipal']) ? $nursery['head_pricipal'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Email</label>
                                    <input disabled type="email" class="form-control" name="email" value="{{!empty($nursery['email']) ? $nursery['email'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Mobile Number</label>
                                    <input disabled type="number" class="form-control" name="mobile_number" value="{{!empty($nursery['mobile_number']) ? $nursery['mobile_number'] : '' }}">
                                </div>
                              <!--   <div class="col-sm-6">
                                    <label class="form-label">Bank Account Number</label>
                                    <input disabled type="number" class="form-control" name="bank_ac" value="{{!empty($nursery['bank_ac']) ? $nursery['bank_ac'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Bank Name</label>
                                    <input disabled type="text" class="form-control" name="bank_name" value="{{!empty($nursery['bank_name']) ? $nursery['bank_name'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Bank IFSC Code</label>
                                    <input disabled type="text" class="form-control" name="bank_ifc_code" value="{{!empty($nursery['bank_ifc_code']) ? $nursery['bank_ifc_code'] : '' }}">
                                </div> -->
                             
                                <div class="col-sm-6">
                                    <label class="form-label">Select Games/Disciplines</label>
                                 
                                    <select disabled class="form-control form-control" name="game_disp">
                                        <option value="1" <?php if (!empty($nursery['game_disp'])) {
                                                                if ($nursery['game_disp'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>One</option>
                                        <option value="2" <?php if (!empty($nursery['game_disp'])) {
                                                                if ($nursery['game_disp'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Two</option>
                                        <option value="3" <?php if (!empty($nursery['game_disp'])) {
                                                                if ($nursery['game_disp'] = "3") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Three</option>
                                        <option value="4" <?php if (!empty($nursery['game_disp'])) {
                                                                if ($nursery['game_disp'] = "4") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Four</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Playground/Hall/Court available</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="playground_hall_court_available">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['playground_hall_court_available'])) {
                                                                if ($nursery['playground_hall_court_available'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Yes</option>
                                        <option value="2" <?php if (!empty($nursery['playground_hall_court_available'])) {
                                                                if ($nursery['playground_hall_court_available'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Equipment related to selected Games
                                        available</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="equipment_related_to_selected_games_available">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['equipment_related_to_selected_games_available'])) {
                                                                if ($nursery['equipment_related_to_selected_games_available'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Yes</option>
                                        <option value="2" <?php if (!empty($nursery['equipment_related_to_selected_games_available'])) {
                                                                if ($nursery['equipment_related_to_selected_games_available'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether Nursery will provide Sports kits to
                                        selected players?</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="whether_nursery_will_provide_sports_kits_to_selected_players">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'])) {
                                                                if ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Yes</option>
                                        <option value="2" <?php if (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'])) {
                                                                if ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether Nursery will provide fee concession to
                                        selected players?</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="whether_nursery_will_provide_fee_concession_to_selected_players">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'])) {
                                                                if ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Yes</option>
                                        <option value="2" <?php if (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'])) {
                                                                if ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether qualified coach is available for the
                                        concerned game?</label>
                                    <select disabled class="form-control form-select" aria-label="Default select example" name="whether_qualified_coach_is_available_for_the_concerned_game">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game'])) {
                                                                if ($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] = "1") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Yes</option>
                                        <option value="1" <?php if (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game'])) {
                                                                if ($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] = "2") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">No. of students playing concerned games</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Boys</label>
                                            <input disabled type="text" class="form-control" name="boys" value="{{!empty($nursery['boys']) ? $nursery['boys'] : '' }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Girls</label>
                                            <input disabled type="text" class="form-control" name="girls" value="{{!empty($nursery['girls']) ? $nursery['girls'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Any specific achievements of the Institute during
                                        last 5 years</label>
                                    <textarea class="form-control" disabled name="any_specific_achievements_of_the_institute_during_last">{{!empty($nursery["any_specific_achievements_of_the_institute_during_last"]) ? $nursery["any_specific_achievements_of_the_institute_during_last"] : '' }}
                                    </textarea>

                                </div>
                            

                            </div>
                        </form>

                    </div>


                </div>

            </div>

        </div>

    </section>
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Present Status of Pending/Approved Nurseries ({{strtoupper($nurseryStatus['district'])}})</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th>Approved</th>
                                        <th>Pending </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td>{{$nurseryStatus['total'] ?? ''}}</td>
                                       <td>{{$nurseryStatus['approved'] ?? ''}}</td>
                                       <td>{{$nurseryStatus['pending'] ?? ''}}</td>
                                   </tr>
                                </tbody>

                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Details of Allotted Nurseries (Game-wise)</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Game</th>
                                            <th>Approved</th>
                                            <th>Pending</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <!--      @if($gameCounts->isNotEmpty())
                                            @foreach($gameCounts as $gameName => $count)
                                                <tr>
                                                    <td>{{ $gameName ?? '' }}</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2">No nursery games found</td>
                                            </tr>
                                        @endif -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h3>DSO Feasibility Report</h3>   

                <div class="card p-5">

                    <form class="regis-form" id="dsoReportForm" action="{{url('dso/nursery/report/store')}}/{{$nursery['secure_id']}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="application_number" value="{{ $nursery['application_number'] ?? ''}}" id="application_number">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-sm-12">
                                    <label class="form-label">Site visit done?</label>
                                    <select class="form-control site_visit" name="site_visit" id="site_visit">
                                        <option value="">-----Select-----</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div> 
                                <div class="col-sm-12 mt-3">
                                    <label class="form-label">Upload Photographs</label>
                                    <!-- <input type="file" class="form-control" name="pics[]" multiple="multiple"> -->
                                    <div id="reportPhotographDropzone" class="dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <span>Drop files here or click to upload.</span>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="reportphoto_images[]" id="reportphoto_images">
                                    <span class="star" id="reportphotomessage"></span>
                                </div>
                                 <div class="col-sm-12">
                                    <label class="form-label">Remarks </label>
                                    <textarea class="form-control" name="remarks" {{!empty($nursery['remarks'])?"disabled":"" }} id="remarks">{{!empty($nursery['remarks'])?$nursery['remarks']:"" }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-12">
                                <label class="form-label">Nursery Recommendations</label>
                                <select class="form-control recommended" name="recommend_status" id="recommend_status">
                                    <option value="">-----Select-----</option>
                                    <option value="yes">Recommended for Approval</option>
                                    <option value="no">Not Recommended</option>
                                </select>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <label class="form-label">Upload Signed Inspection Report</label>
                                    <!-- <input type="file" class="form-control" name="inspection_report"> -->
                                    <div id="inspectionReportDropzone" class="dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <span>Drop files here or click to upload.</span>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="inspectionreport_images[]" id="inspectionreport_images">
                                    <span class="star" id="inspectionreportmessage"></span>
                                   <!--  <div class="row">

                                        <?php if (!empty($nursery['inspection_report']) && !is_null($nursery['inspection_report'])) {

                                            $pics = json_decode($nursery['inspection_report']);
                                            foreach ($inspection_report as $p) {  ?>

                                                <div class="col-sm-4 pb-2">
                                                    <img src="{{url('public/docs/').'/'.$nursery['secure_id'].'/'.$p}}" class="img-thumbnail">

                                                </div>

                                        <?php   }
                                        } ?>
                                    </div> -->

                                </div>
                            </div>
                            <div class="col-sm-12 ml-3 mt-3 ">
                                <input type="checkbox" class="form-check-input" name="terms_app" id="term_app">
                                <label class="form-label">I have checked the contents of the applications and have visited the site physically. I certified that the details and the photographs attached belongs to the site. </label>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>

                </div>


                </div>

            </div>

        </div>

    </section>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
 
<script>
    Dropzone.autoDiscover = false;
    // Common configuration options for Dropzone
    let commonOptions = {
        url: "{{ route('dso.applicationreport') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        resizeQuality: 1.0,
        addRemoveLinks: true,
        timeout: 60000,
        dictDefaultMessage: "Drop your files here or click to upload",
        dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
    };
    $(document).ready(function() {
        // Initialize Dropzone for playground
        let reportPhotographDropzone = initDropzone("#reportPhotographDropzone", "reportphotosfile", "#reportphotomessage", "#reportphoto_images", 3, 0.3,'jpg', 'jpeg', 'png');

        // Initialize Dropzone for equipment
        let inspectionReportDropzone = initDropzone("#inspectionReportDropzone", "inspectionreportfile", "#inspectionreportmessage", "#inspectionreport_images", 1, 0.3, 'jpg', 'jpeg', 'png');


        // Function to initialize Dropzone
        function initDropzone(dropzoneId, paramName, messageSelector, imagesInputSelector, maxFiles, maxFileSize, ...validFiles) {
            let acceptedFiles = validFiles.map(element => '.'+element);
            let validationError = false
            return new Dropzone(dropzoneId, {
                ...commonOptions,
                maxFilesize: maxFileSize, // MB
                maxFiles: maxFiles,
                paramName: paramName,
                acceptedFiles: acceptedFiles.toString(),
                dictFileTooBig: "File is too big. Max filesize: "+maxFileSize* 1000+"KB.",
                dictMaxFilesExceeded: "You can only upload up to " + maxFiles + " files.",
                dictInvalidFileType: "Invalid file type. Only "+validFiles.toString()+" files are allowed.",
                sending: function (file, xhr, formData) {
                    let app_number = $("#application_number").val();
                    formData.append('application_number', app_number);
                    $(messageSelector).text('File Uploading...');
                },
                success: function (file, response) {
                    $(messageSelector).text('File Uploaded');
                    $(imagesInputSelector).val(function (index, value) {
                        return value + (value ? ',' : '') + response;
                    });
                    file.filePath = response;
                },
                error: function (file, response) {
                    if (file.size > this.options.maxFilesize * 1024 * 1024 || response.includes('jpeg') || response.includes('jpg') || response.includes('png') || response.includes('csv') || this.files.length > this.options.maxFiles) {
                        validationError = true
                        this.removeFile(file);
                    }
                    $(messageSelector).text(response);
                    return false;
                },
                init: function () {
                    this.on("removedfile", function (file) {
                        if(!validationError){
                            let app_number = $("#application_number").val();

                            $(messageSelector).text('File Removing...');
                            $.ajax({
                                url: "{{route('dso.fileRemove')}}",
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                data: {filePath: file.filePath,application_number:app_number },
                                success: function (response) {
                                    let images = $(imagesInputSelector).val().split(",");
                                    let index = images.indexOf(file.filePath);
                                    if (index !== -1) {
                                        images.splice(index, 1);
                                        $(imagesInputSelector).val(images.toString());
                                    }
                                },
                                error: function (xhr, status, error) {
                                }
                            });
                            $(messageSelector).text('File Removed');
                        }else{
                            validationError =  false
                        }
                    });
                }
            });
        }
       
    });


</script>
<script>
    $(document).ready(function() {
        $("#dsoReportForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Perform form validation
            var site_visit = $("#site_visit").val();
            if (!site_visit) {
                Swal.fire('Select Site visit ', '', 'error');
                return false;
            }
            var recommend_status = $("#recommend_status").val();
            if (!recommend_status) {
                Swal.fire('Select Recommendation Status', '', 'error');
                return false;
            }
            var remarks = $("#remarks").val();
            if (!remarks) {
                Swal.fire('Select Remarks', '', 'error');
                return false;
            }
            if (!$("#term_app").prop('checked')) {
                Swal.fire('Accept terms of application', '', 'error');
                return false;
            }
            
            this.submit();
        });
    });
</script>
@endsection