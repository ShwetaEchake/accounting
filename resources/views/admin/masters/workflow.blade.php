<x-admin.layout>
    <x-slot name="title">Workflow</x-slot>
    <x-slot name="heading">Workflow</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3 row">
                                <h5>Work Flow  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department_id">Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="department_id">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                         <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="service_id">Service <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="service_id">
                                        <option value="">--Select--</option>
                                        @foreach ($services as $service)
                                         <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid service_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="workflow_mode_id">Tax Flow mode <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="workflow_mode_id">
                                        <option value="">--Select--</option>
                                        @foreach ($work_flow_mode as $work_flow)
                                         <option value="{{ $work_flow->id }}">{{ $work_flow->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workflow_mode_id_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_amount">From Amount <span class="text-danger"></span></label>
                                    <input class="form-control" id="from_amount" name="from_amount" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid from_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_amount">To Amount <span class="text-danger"></span></label>
                                    <input class="form-control" id="to_amount" name="to_amount" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid to_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_type">Location Type <span class="text-danger">*</span></label><br>
                                    <input class="" id="location_type" name="location_type" value="all" type="radio" checked > All <br>
                                    <input class="" id="location_type" name="location_type" value="ward_zone" type="radio" > Ward-Zone
                                    <span class="text-danger is-invalid location_type_err"></span>
                                </div>
                            </div>

                            <h5>Work Flow Steps : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Event  <span class="text-danger">*</span> </th>
                                                <th>Organization  <span class="text-danger">*</span> </th>
                                                <th>Department <span class="text-danger">*</span> </th>
                                                <th>RoleDetail <span class="text-danger">*</span></th>
                                                <th>Details <span class="text-danger">*</span>  </th>
                                                <th>SLA </th>
                                                <th>Units </th>
                                                <th>No of Approvers <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="event_id[]" id="event_id" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($events as $event)
                                                    <option value="{{ $event->id }}">{{ $event->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid event_id_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="organization_id[]" id="organization_id" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($organizations as $organization)
                                                    <option value="{{ $organization->id }}">{{ $organization->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid organization_id_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="department_ids[]" id="department_ids" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid department_ids_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-multiple form-control" name="role_id[]" id="role_id" multiple>
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid role_id_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="details[]" class="form-control" multiple="">
                                                <span class="text-danger is-invalid details_err"></span>
                                            </td>
                                            <td>
                                                <input type="number" name="sla[]" class="form-control" multiple="">
                                                <span class="text-danger is-invalid sla_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="unit_id[]" id="unit_id" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid unit_id_err"></span>
                                            </td>
                                            <td>
                                                <input type="number" name="no_of_approvers[]" class="form-control" multiple="">
                                                <span class="text-danger is-invalid no_of_approvers_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->

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
                <form class="form-horizontal form-bordered" method="post" id="editForm">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title">Edit Workflow</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                <h5>Work Flow  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department_id">Department <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="department_id">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid department_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="service_id">Service <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="service_id">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid service_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="workflow_mode_id">Tax Flow mode <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="workflow_mode_id">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid workflow_mode_id_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_amount">From Amount <span class="text-danger"></span></label>
                                    <input class="form-control" id="from_amount" name="from_amount" type="number" placeholder="Enter">
                                    <span class="text-danger is-invalid from_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_amount">To Amount <span class="text-danger"></span></label>
                                    <input class="form-control" id="to_amount" name="to_amount" type="number" placeholder="Enter">
                                    <span class="text-danger is-invalid to_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_type">Location Type <span class="text-danger">*</span></label><br>
                                    <input class="" id="location_type" name="location_type" value="all" type="radio" checked > All <br>
                                    <input class="" id="location_type" name="location_type" value="ward_zone" type="radio" > Ward-zone
                                    <span class="text-danger is-invalid location_type_err"></span>
                                </div>
                            </div>

                            <h5>Work Flow Steps : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer" style="overflow-x:auto;">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Event  <span class="text-danger">*</span> </th>
                                                <th>Organization  <span class="text-danger">*</span> </th>
                                                <th>Department <span class="text-danger">*</span> </th>
                                                <th>Role <span class="text-danger">*</span></th>
                                                <th>Details <span class="text-danger">*</span>  </th>
                                                <th>SLA(Service Level Agreement) </th>
                                                <th>Units </th>
                                                <th>No of Approvers <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEdit">

                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->

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
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Department Name </th>
                                        <th>Service Name</th>
                                        <th>Complain Type</th>
                                        <th>Work flow mode</th>
                                        <th>Location Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workflow as $value)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td><strong> {{ $value->department->department_name  }} </strong></td>
                                            <td><strong> {{ $value->service->name  }} </strong></td>
                                            <td><strong> {{ $value->name  }} </strong></td>
                                            <td><strong> {{ $value->workflow_mode->description  }} </strong></td>
                                            <td><strong> {{ $value->location_type }} </strong></td>
                                            <td><strong> {{ $value->name ?? ''  }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit workflow" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete workflow" data-id="{{ $value->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('workflow.store') }}',
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
                            window.location.href = '{{ route('workflow.index') }}';
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

        // function resetErrors() {
        //     var form = document.getElementById('addForm');
        //     var data = new FormData(form);
        //     for (var [key, value] of data) {
        //         $('.' + key + '_err').text('');
        //         $('#' + key).removeClass('is-invalid');
        //         $('#' + key).addClass('is-valid');
        //     }
        // }

        // function printErrMsg(msg) {
        //     $.each(msg, function(key, value) {
        //         $('.' + key + '_err').text(value);
        //         $('#' + key).addClass('is-invalid');
        //         $('#' + key).removeClass('is-valid');
        //     });
        // }

        function resetErrors() {
            $('form').find('.is-invalid').removeClass('is-invalid');
            $('form').find('.is-valid').removeClass('is-valid');
            $('.text-danger').text('');
        }

        function printErrMsg(errors) {
            $.each(errors, function(key, value) {
                if (key.includes('[]')) {
                    // Handle array-based fields
                    let baseKey = key.replace('[]', ''); // Remove '[]' to get base key
                    let errorMessages = Array.isArray(value) ? value : [value]; // Ensure value is an array

                    $('select[name="' + key + '"]').each(function(index) {
                        $(this).next('.text-danger').text(errorMessages[index] || errorMessages[0]);
                        $(this).addClass('is-invalid');
                        $(this).removeClass('is-valid');
                    });
                } else {
                    $('.' + key + '_err').text(value);
                    $('#' + key).addClass('is-invalid');
                    $('#' + key).removeClass('is-valid');
                }
            });
        }

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('workflow.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                $("#addContainer").slideUp();
                $("#btnCancel").show();
                $("#addToTable").hide();
                $("#editContainer").slideDown();

                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.workflow.id);
                    $("#editForm select[name='department_id']").html(data.departmentsHtml);
                    $("#editForm select[name='service_id']").html(data.servicesHtml);
                    $("#editForm select[name='workflow_mode_id']").html(data.workflow_modeHtml);
                    $("#editForm input[name='from_amount']").val(data.workflow.from_amount);
                    $("#editForm input[name='to_amount']").val(data.workflow.to_amount);
                    var locationType = data.workflow.location_type;
                    $("#editForm input[name='location_type'][value='" + locationType + "']").prop("checked", true);

                    //---  data selected ---
                    var tableBody = $('#addMoreEdit');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    tableBody.find('.js-example-basic-single').select2();
                    //---  data selected ---

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
            var url = "{{ route('workflow.update', ":model_id") }}";

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
                                window.location.href = '{{ route('workflow.index') }}';
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
            title: "Are you sure to delete this workflow?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('workflow.destroy', ":model_id") }}";

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


{{-- Add More Form --}}
<script>
    $('.addMoreForm').on('click',function(){
      addMoreForm();
    });

    var rowId = 1;
    function addMoreForm() {
      var tr = '<tr id="row_' + rowId + '">' +
         '<td><select class="js-example-basic-single form-control" name="event_id[]"  id="event_id_' + rowId + '" ><option value="">--Select--</option>@foreach ($events as $event)<option value="{{ $event->id }}">{{ $event->description }}</option>@endforeach</select></td>' +
         '<td><select class="js-example-basic-single form-control" name="organization_id[]" id="organization_id_' + rowId + '"><option value="">--Select--</option>@foreach ($organizations as $organization)<option value="{{ $organization->id }}">{{ $organization->description }}</option>@endforeach </select></td>' +
         '<td><select class="js-example-basic-single form-control" name="department_ids[]" id="department_ids_' + rowId + '"><option value="">--Select--</option> @foreach ($departments as $department)<option value="{{ $department->id }}">{{ $department->department_name }}</option>@endforeach</select></td>' +
         '<td><select class="js-example-basic-multiple form-control" name="role_id[]" id="role_id_' + rowId + '" multiple>@foreach ($users as $user) <option value="{{ $user->id }}">{{ $user->name }}</option> @endforeach</select></td>' +
         '<td><input type="text" class="form-control" name="details[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="sla[]" value="" ></td>' +
         '<td><select class="js-example-basic-single form-control" name="unit_id[]" id="unit_id_' + rowId + '"><option value="">--Select--</option>@foreach ($units as $unit)<option value="{{ $unit->id }}">{{ $unit->description }}</option> @endforeach</select></td>' +
         '<td><input type="number" class="form-control" name="no_of_approvers[]" value="" ></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMore').append(tr);
      $('#event_id_' + rowId + ', #organization_id_' + rowId + ', #department_ids_' + rowId + ', #role_id_' + rowId + ', #unit_id_' + rowId).select2();


      rowId++;
    }

    $(document).on('click', '.removeAddMore', function () {
      if ($(this).parents('table').find('.removeAddMore').length > 1) {
          $(this).parent().parent().remove();
      } else {
        //   alert("Cannot remove the last element.");
      }
    });
  </script>


