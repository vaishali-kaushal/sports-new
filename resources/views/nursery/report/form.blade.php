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

                            <div class="row mt-3">
                                <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['cat_of_nursery']) }}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Games</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{$nursery['game']['name']}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['district']['name'] }}</div>
                                    </div>
                                </div> 

                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Type of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($nursery['cat_of_nursery'] == 'private')
                                            @if($nursery['type_of_nursery'] == 'pvt_institute')
                                                <div>Private Institute</div>
                                            @elseif($nursery['type_of_nursery'] == 'pvt_school')
                                                <div>Private School</div>
                                            @endif
                                        @else
                                        <div> {{ ucfirst($nursery['type_of_nursery'])}}</div>
                                        @endif
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Name of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['name_of_nursery'] ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Address</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['address'] ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Registration No. </label>
                                    </div>
                                    <div class="col-sm-6">
                                       <div>{{ $nursery['reg_no_running_nursery'] ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Name of Head/Principal</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['head_pricipal'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Email</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['email'] ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Mobile Number </label>
                                    </div>
                                    <div class="col-sm-6">
                                       <div>{{ $nursery['mobile_number'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Game Discipline</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['game_disp'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Playground available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['playground_hall_court_available']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Equipment available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['equipment_related_to_selected_games_available']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Fee Concession</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Number of Students</label>
                                    </div>
                                     @if($nursery['game_disp'] == 'boys')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['boys'] ?? '0' }} Boys</div>
                                    </div>
                                    @endif
                                    @if($nursery['game_disp'] == 'girls')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['girls'] ?? '' }} Girls</div>
                                    </div>
                                    @endif
                                    @if($nursery['game_disp'] == 'mix')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['girls'] ?? '' }} Girls and {{ $nursery['girls'] ?? '' }} Boys</div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Provide Sports Kit</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']) ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Coach Available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_qualified_coach_is_available_for_the_concerned_game']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Achievement</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['any_specific_achievements_of_the_institute_during_last']) ?? ''}}</div>
                                    </div>
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
                            <h3 class="card-title"><b>Present Status of Pending/Approved Nurseries (District-wise)</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Total (in {{strtoupper($nurseryStatus['district'])}})</th>
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
                                            <th>Total (in {{strtoupper($nursery['game']['name']) ?? ''}})</th>
                                            <th>Approved</th>
                                            <th>Pending</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ count($games) ?? '' }}</td>
                                            <td>{{ $games['totalApprovedCount']}}</td>
                                            <td>{{ $games['totalPendingCount']}}</td>
                                        </tr>
                                      
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