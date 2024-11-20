<x-admin.layout>
    <x-slot name="title">Voucher Template Entry</x-slot>
    <x-slot name="heading">Voucher Template Entry</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3 row">
                                <h5>Voucher Template  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="template_type">Template Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="template_type">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                         <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_year">Financial Year <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="financial_year">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                          <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid financial_year_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="voucher_type">Voucher Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="voucher_type">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                          <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid voucher_type_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control" name="department">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                         <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="template_for">Template For <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control" name="template_for">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                         <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid template_for_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label><br>
                                    <select class="js-example-basic-single form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid location_type_err"></span>
                                </div>
                            </div>

                            <h5> Mapping Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Account Type  <span class="text-danger">*</span> </th>
                                                <th>Dr/Cr  <span class="text-danger">*</span> </th>
                                                <th>Mode <span class="text-danger">*</span> </th>
                                                <th>Account head <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="account_type[]" id="account_type" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                      <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid account_type_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="dr_cr[]" id="dr_cr" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                     <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid dr_cr_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="mode[]" id="mode" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                     <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid mode_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-multiple form-control" name="account_head[]" id="account_head">
                                                    @foreach ($masters as $master)
                                                     <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid account_head_err"></span>
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
                            <h4 class="card-title">Edit Voucher Template Entry</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                <h5>Voucher Template  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="template_type">Template Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="template_type">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid department_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_year">Financial Year <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="financial_year">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid financial_year_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="voucher_type">Voucher Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="voucher_type">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid voucher_type_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control" name="department">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                         <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="template_for">Template For <span class="text-danger"></span></label>
                                    <select class="js-example-basic-single form-control" name="template_for">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                         <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid template_for_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label><br>
                                    <select class="js-example-basic-single form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid location_type_err"></span>
                                </div>
                            </div>

                            <h5> Mapping Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Account Type  <span class="text-danger">*</span> </th>
                                                <th>Dr/Cr  <span class="text-danger">*</span> </th>
                                                <th>Mode <span class="text-danger">*</span> </th>
                                                <th>Account head <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="account_type[]" id="account_type" >
                                                    <option value="">--Select--</option>
                                                </select>
                                                <span class="text-danger is-invalid account_type_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="dr_cr[]" id="dr_cr" >
                                                    <option value="">--Select--</option>
                                                </select>
                                                <span class="text-danger is-invalid dr_cr_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="mode[]" id="mode" >
                                                    <option value="">--Select--</option>
                                                </select>
                                                <span class="text-danger is-invalid mode_err"></span>
                                            </td>
                                            <td>
                                                <select class="js-example-basic-multiple form-control" name="account_head[]" id="account_head">
                                                   <option value="">--Select--</option>
                                                </select>
                                                <span class="text-danger is-invalid account_head_err"></span>
                                            </td>

                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
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
                                        <th>Template Type </th>
                                        <th>Voucher Type</th>
                                        <th>Template For</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voucher_templates as $value)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td><strong> {{ $value->template_type  }} </strong></td>
                                            <td><strong> {{ $value->voucher_type  }} </strong></td>
                                            <td><strong> {{ $value->template_for  }} </strong></td>
                                            <td><strong> {{ $value->status }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete" data-id="{{ $value->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('voucher_template_entry.store') }}',
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
                            window.location.href = '{{ route('voucher_template_entry.index') }}';
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
        var url = "{{ route('voucher_template_entry.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.voucher_template_entry.id);
                    $("#editForm select[name='department_id']").html(data.departmentsHtml);
                    // $("#editForm select[name='service_id']").html(data.servicesHtml);
                    // $("#editForm select[name='workflow_mode_id']").html(data.workflow_modeHtml);
                    // $("#editForm input[name='from_amount']").val(data.workflow.from_amount);
                    // $("#editForm input[name='to_amount']").val(data.workflow.to_amount);
                    // var locationType = data.workflow.location_type;
                    // $("#editForm input[name='location_type'][value='" + locationType + "']").prop("checked", true);

                    //---  data selected ---
                        // var tableBody = $('#addMoreEdit');
                        // tableBody.empty();
                        // tableBody.append(data.tableRows);
                        // tableBody.find('.js-example-basic-single').select2();
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
            var url = "{{ route('voucher_template_entry.update', ":model_id") }}";

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
                var url = "{{ route('voucher_template_entry.destroy', ":model_id") }}";

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
         '<td><select class="js-example-basic-single form-control" name="event_id[]"  id="event_id_' + rowId + '" ><option value="">--Select--</option></select></td>' +
         '<td><select class="js-example-basic-single form-control" name="organization_id[]" id="organization_id_' + rowId + '"><option value="">--Select--</option> </select></td>' +
         '<td><select class="js-example-basic-single form-control" name="department_ids[]" id="department_ids_' + rowId + '"><option value="">--Select--</option> </select></td>' +
         '<td><select class="js-example-basic-multiple form-control" name="role_id[]" id="role_id_' + rowId + '" multiple></select></td>' +

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



