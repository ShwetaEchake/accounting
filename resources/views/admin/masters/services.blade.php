<x-admin.layout>
    <x-slot name="title">Service Master</x-slot>
    <x-slot name="heading">Service Master</x-slot>


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Department"> Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="department">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                          <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="child_department"> Child Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="child_department">
                                            <option value="">--Select--</option>
                                            <option value="1">two</option>
                                    </select>
                                    <span class="text-danger is-invalid child_department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="name"> Name(English)  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" value="" type="text" placeholder="Name"></input>
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="regional"> Name(Regional) <span class="text-danger">*</span></label>
                                    <input class="form-control" name="regional" value="" type="text" placeholder="Regional"></input>
                                    <span class="text-danger is-invalid regional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="short_code"> Short Code <span class="text-danger">*</span></label>
                                    <input class="form-control" name="short_code" value="" type="text" placeholder="Short Code"></input>
                                    <span class="text-danger is-invalid short_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status"> Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="status">
                                        <option value="">--Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="checklist_verification_applicable"> Checklist Verification Applicable <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="checklist_verification_applicable">
                                        <option value="">--Select--</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                     <span class="text-danger is-invalid checklist_verification_applicable_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="challan_validity"> Challan Validity <span class="text-danger"></span></label>
                                    <input class="form-control" name="challan_validity" value="" type="text"  placeholder="Challan Validity"></input>
                                    <span class="text-danger is-invalid challan_validity_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="checklist_approval_applicable">Checklist Approval Applicable  <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="checklist_approval_applicable">
                                        <option value="">--Select--</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                    <span class="text-danger is-invalid checklist_approval_applicable_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approval"> Approval <span class="text-danger"></span></label>
                                    <input class="form-control" name="approval" value="" type="text" placeholder="Approval"></input>
                                    <span class="text-danger is-invalid approval_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rejection"> Rejection <span class="text-danger"></span></label>
                                    <input class="form-control" name="rejection" value="" type="text" placeholder="Rejection"></input>
                                    <span class="text-danger is-invalid rejection_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="printing_responsibility"> Printing Responsibility <span class="text-danger">*</span></label>
                                    <input class="form-control" name="printing_responsibility" value="" type="text" placeholder="Printing Responsibility"></input>
                                    <span class="text-danger is-invalid printing_responsibility_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark"> Remark <span class="text-danger"></span></label>
                                    <input class="form-control" name="remark" value="" type="text" placeholder="Remark"></input>
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fee_schedule">Fee Schedule <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="fee_schedule">
                                        <option value="">--Select--</option>
                                        <option value="free_service">Free Service</option>
                                        <option value="chargeable"> Chargeable</option>
                                    </select>
                                    <span class="text-danger is-invalid fee_schedule_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="select_applicable_option"> Rent per Month <span class="text-danger"></span></label><br>
                                    <input class="" name="select_applicable_option[]" value="1" type="checkbox"> Is Print Applicable?</input><br>
                                    <input class="" name="select_applicable_option[]" value="2" type="checkbox"> Is Actual Service?</input><br>
                                    <input class="" name="select_applicable_option[]" value="3" type="checkbox"> Is Digital Signature Applicable?</input><br>
                                    <input class="" name="select_applicable_option[]" value="4" type="checkbox"> Is Scrutiny Applicable?</input><br>
                                    <span class="text-danger is-invalid select_applicable_option_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bpm_process"> Bpm Process <span class="text-danger">*</span></label>
                                    <input class="form-control" name="bpm_process" value="" type="text" placeholder="Bpm Process" ></input>
                                    <span class="text-danger is-invalid bpm_process_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sla"> SLA <span class="text-danger"></span></label>
                                    <input class="form-control" name="sla" value="" type="text" placeholder="SLA"></input>
                                    <span class="text-danger is-invalid sla_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="units"> Units<span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="units">
                                        <option value="">--Select--</option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid units_err"></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm" enctype="multipart/form-data">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title">Edit Service</h4>
                        </header>

                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Department"> Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="department">
                                            <option value="">--Select--</option>
                                            <option value="1">one</option>
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="child_department"> Child Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="child_department">
                                            <option value="">--Select--</option>
                                            <option value="1">two</option>
                                    </select>
                                    <span class="text-danger is-invalid child_department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="name"> Name(English)  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" value="" type="text" placeholder="Name"></input>
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="regional"> Name(Regional) <span class="text-danger">*</span></label>
                                    <input class="form-control" name="regional" value="" type="text" placeholder="Regional"></input>
                                    <span class="text-danger is-invalid regional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="short_code"> Short Code <span class="text-danger">*</span></label>
                                    <input class="form-control" name="short_code" value="" type="text" placeholder="Short Code"></input>
                                    <span class="text-danger is-invalid short_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status"> Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="status">
                                        <option value="">--Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="checklist_verification_applicable"> Checklist Verification Applicable <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="checklist_verification_applicable">
                                        <option value="">--Select--</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                     <span class="text-danger is-invalid checklist_verification_applicable_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="challan_validity"> Challan Validity <span class="text-danger"></span></label>
                                    <input class="form-control" name="challan_validity" value="" type="text"  placeholder="Challan Validity"></input>
                                    <span class="text-danger is-invalid challan_validity_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="checklist_approval_applicable">Checklist Approval Applicable  <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="checklist_approval_applicable">
                                        <option value="">--Select--</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                    <span class="text-danger is-invalid checklist_approval_applicable_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approval"> Approval <span class="text-danger"></span></label>
                                    <input class="form-control" name="approval" value="" type="text" placeholder="Approval"></input>
                                    <span class="text-danger is-invalid approval_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rejection"> Rejection <span class="text-danger"></span></label>
                                    <input class="form-control" name="rejection" value="" type="text" placeholder="Rejection"></input>
                                    <span class="text-danger is-invalid rejection_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="printing_responsibility"> Printing Responsibility <span class="text-danger">*</span></label>
                                    <input class="form-control" name="printing_responsibility" value="" type="text" placeholder="Printing Responsibility"></input>
                                    <span class="text-danger is-invalid printing_responsibility_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark"> Remark <span class="text-danger"></span></label>
                                    <input class="form-control" name="remark" value="" type="text" placeholder="Remark"></input>
                                    <span class="text-danger is-invalid remark_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fee_schedule">Fee Schedule <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="fee_schedule">
                                        <option value="">--Select--</option>
                                        <option value="free_service">Free Service</option>
                                        <option value="chargeable"> Chargeable</option>
                                    </select>
                                    <span class="text-danger is-invalid fee_schedule_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="select_applicable_option"> Select Applicable Option <span class="text-danger"></span></label><br>
                                    <input class="" name="select_applicable_option[]" value="1" type="checkbox"> Is Print Applicable?</input><br>
                                    <input class="" name="select_applicable_option[]" value="2" type="checkbox"> Is Actual Service?</input><br>
                                    <input class="" name="select_applicable_option[]" value="3" type="checkbox"> Is Digital Signature Applicable?</input><br>
                                    <input class="" name="select_applicable_option[]" value="4" type="checkbox"> Is Scrutiny Applicable?</input><br>
                                    <span class="text-danger is-invalid select_applicable_option_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bpm_process"> Bpm Process <span class="text-danger">*</span></label>
                                    <input class="form-control" name="bpm_process" value="" type="text" placeholder="Bpm Process" ></input>
                                    <span class="text-danger is-invalid bpm_process_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sla"> SLA <span class="text-danger"></span></label>
                                    <input class="form-control" name="sla" value="" type="text" placeholder="SLA"></input>
                                    <span class="text-danger is-invalid sla_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="units"> Units<span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="units">
                                        <option value="">--Select--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <span class="text-danger is-invalid units_err"></span>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12">

                <!-------------------------- Search Start ------------------------------->
                 <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-sm-4">
                                <label>Department</label>
                                <select class="js-example-basic-single form-control col-sm-12" name="department_id" id="department_id">
                                    <option value="">--Select--</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"> {{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-3 col-sm-4">
                                <label>Service Name</label>
                                <select class="js-example-basic-single form-control col-sm-12" name="service_id" id="service_id">
                                  <option value="">--Select--</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"> {{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-3 col-sm-4" style="margin-top:45px;">
                                <button type="submit" class="btn btn-primary" id="searchButton">
                                    <i class="ri-equalizer-fill me-1 align-bottom"></i> Filters
                                </button>
                                <a href="" class="btn btn-warning">Reset</a>
                            </div>
                        </div>
                 </div><br>
                <!-------------------------- Search End --------------------------------->


                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Regional</th>
                                        <th>Short Code</th>
                                        <th>Checklist Verification</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $service->name }} </strong></td>
                                            <td><strong> {{ $service->regional }} </strong></td>
                                            <td><strong> {{ $service->short_code }} </strong></td>
                                            <td><strong> {{ Str::headline($service->checklist_verification_applicable) }} </strong></td>
                                            <td><strong> {{ $service->status == 1 ? 'Active' : 'Inactive' }}</strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit application" data-id="{{ $service->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete application" data-id="{{ $service->id }}"><i data-feather="trash-2"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>




</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('services.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('services.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

        function resetErrors() {
            var form = document.getElementById('addForm');
            var data = new FormData(form);
            for (var [key, value] of data) {
                $('.' + key + '_err').text('');
                $('#' + key).removeClass('is-invalid');
                $('#' + key).addClass('is-valid');
            }
        }

        function printErrMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
                $('#' + key).removeClass('is-valid');
            });
        }

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('services.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                // console.log(data.service.name);
                $("#addContainer").slideUp();
                $("#btnCancel").show();
                $("#addToTable").hide();
                $("#editContainer").slideDown();

                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.service.id);
                    // $("#editForm select[name='department']").html(data.zoneHtml);
                    // $("#editForm select[name='child_master']").html(data.propertyHtml);
                    $("#editForm input[name='name']").val(data.service.name);
                    $("#editForm input[name='regional']").val(data.service.regional);
                    $("#editForm input[name='short_code']").val(data.service.short_code);
                    $("#editForm select[name='status']").val(data.service.status);
                    $("#editForm select[name='checklist_verification_applicable']").val(data.service.checklist_verification_applicable);
                    $("#editForm input[name='challan_validity']").val(data.service.challan_validity);
                    $("#editForm select[name='checklist_approval_applicable']").val(data.service.checklist_approval_applicable);
                    $("#editForm input[name='approval']").val(data.service.approval);
                    $("#editForm input[name='rejection']").val(data.service.rejection);
                    $("#editForm input[name='printing_responsibility']").val(data.service.printing_responsibility);
                    $("#editForm input[name='remark']").val(data.service.remark);
                    $("#editForm select[name='fee_schedule']").val(data.service.fee_schedule);
                    var selectedOptions = data.service.select_applicable_option.split(',');
                    selectedOptions.forEach(function(option) {
                        $("#editForm input[name='select_applicable_option[]'][value='" + option + "']").prop('checked', true);
                    });
                    $("#editForm input[name='bpm_process']").val(data.service.bpm_process);
                    $("#editForm input[name='sla']").val(data.service.sla);
                    $("#editForm select[name='units']").val(data.service.units);
                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('services.update', ":model_id") }}";

            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('services.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

            function resetErrors() {
                var form = document.getElementById('editForm');
                var data = new FormData(form);
                for (var [key, value] of data) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text('');
                    $('#' + field).removeClass('is-invalid');
                    $('#' + field).addClass('is-valid');
                }
            }

            function printErrMsg(msg) {
                $.each(msg, function(key, value) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text(value);
                    $('#' + field).addClass('is-invalid');
                });
            }

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this service?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('services.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>


<!-- Search -->
<script>
    $(document).ready(function() {
        var table = $('#buttons-datatables').DataTable(); // Initialize DataTable

        $('#searchButton').click(function() {
            var departmentId = $('#department_id').val();
            var serviceId = $('#service_id').val();

            $.ajax({
                url: '{{ route('services.search') }}',
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    department_id: departmentId,
                    service_id: serviceId,
                },
                success: function(response) {
                    table.clear().draw();

                    $.each(response, function(index, service) {
                        var statusText = (service.status == 1) ? 'Active' : 'Inactive';

                        table.row.add([
                            index + 1,
                            '<strong>' + service.name + '</strong>',
                            '<strong>' + service.regional + '</strong>',
                            '<strong>' + service.short_code + '</strong>',
                            '<strong>' + service.checklist_verification_applicable + '</strong>',
                            '<strong>' + statusText + '</strong>',
                            '<button class="edit-element btn btn-primary px-2 py-1" title="Edit application" data-id="' + service.id + '"><i data-feather="edit"></i></button>   <button class="btn btn-dark rem-element px-2 py-1" title="Delete application" data-id="' + service.id + '"><i data-feather="trash-2"></i></button>',
                        ]).draw(false);
                    });

                    feather.replace(); // Reinitialize feather icons
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>








