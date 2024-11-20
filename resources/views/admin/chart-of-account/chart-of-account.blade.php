<x-admin.layout>
    <x-slot name="title">Chart Of Account </x-slot>
    <x-slot name="heading">Chart Of Account</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <h5>Chart Of Account</h5>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="component_name">Component Name <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single form-control" name="component_id">
                                    <option value="">--Select--</option>
                                    @foreach ($component_names as $component_name)
                                        <option value="{{ $component_name->id }}"> {{ $component_name->description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid component_id_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="number_of_level">No of levels Required<span class="text-danger">*</span></label>
                                <input class="form-control" id="number_of_level" name="number_of_level" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid number_of_level_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="level_one_description">Level 1 Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="level_one_description" name="level_one_description" type="text"  placeholder="Enter Level 1 Description"></textarea>
                                <span class="text-danger is-invalid level_one_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="digit_of_level_one">No of digit for 1 level<span class="text-danger">*</span></label>
                                <input class="form-control" id="digit_of_level_one" name="digit_of_level_one" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid digit_of_level_one_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="level_two_description">Level 2  Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="level_two_description" name="level_two_description" type="text" placeholder="Enter Level 2 Description"></textarea>
                                <span class="text-danger is-invalid level_two_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="digit_of_level_one">No of digit for 2 level<span class="text-danger">*</span></label>
                                <input class="form-control" id="digit_of_level_two" name="digit_of_level_two" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid digit_of_level_two_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="default_flag">Default Flag</label><br>
                                <input style="margin-left: 5px;" class="" name="default_flag" value="1" type="checkbox"></input>
                                <span class="text-danger is-invalid default_flag_err"></span>
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
            <form class="form-horizontal form-bordered" method="post" id="editForm">
                @csrf
                <section class="card">
                    <header class="card-header">
                        <h4 class="card-title">Edit Chart Of Account</h4>
                    </header>
                    <input type="hidden" id="edit_chart_account_id" name="edit_chart_account_id" value="">

                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_component_name">Component Name <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single form-control" name="edit_component_id" id="edit_component_name">
                                    <option value="">--Select--</option>
                                </select>
                                <span class="text-danger is-invalid edit_component_id_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_number_of_level">No of levels Required<span class="text-danger"></span></label>
                                <input class="form-control" id="edit_number_of_level" name="edit_number_of_level" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid edit_number_of_level_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_level_one_description">Level 1 Description <span class="text-danger"></span></label>
                                <textarea class="form-control" id="edit_level_one_description" name="edit_level_one_description" type="text" placeholder="Enter Level 1 Description"></textarea>
                                <span class="text-danger is-invalid edit_level_one_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_digit_of_level_one">No of digit for 1 level<span class="text-danger"></span></label>
                                <input class="form-control" id="edit_digit_of_level_one" name="edit_digit_of_level_one" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid edit_digit_of_level_one_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_level_two_description">Level 2 Description <span class="text-danger"></span></label>
                                <textarea class="form-control" id="edit_level_two_description" name="edit_level_two_description" type="text" placeholder="Enter Level 2 Description"></textarea>
                                <span class="text-danger is-invalid edit_level_two_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="edit_digit_of_level_one">No of digit for 2 level<span class="text-danger"></span></label>
                                <input class="form-control" id="edit_digit_of_level_two" name="edit_digit_of_level_two" type="number" placeholder="Enter ">
                                <span class="text-danger is-invalid edit_digit_of_level_two_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="edit_default_flag">Default Flag</label><br>
                                <input style="margin-left: 5px;" class="" name="edit_default_flag" value="1" type="checkbox"></input>
                                <span class="text-danger is-invalid edit_default_flag_err"></span>
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <button id="addToTable" class="btn btn-primary">Add <i
                                        class="fa fa-plus"></i></button>
                                <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Component Name</th>
                                    <th>No of level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chart_accounts as $chart_account)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong> {{ $chart_account->component_name->description }} </strong></td>
                                        <td><strong> {{ $chart_account->number_of_level }} </strong></td>
                                        <td><strong> {{ $chart_account->default_flag == 1 ? 'Active' : 'Inactive' }}</strong></td>
                                        <td>
                                            <button class="edit-element btn btn-primary px-2 py-1" title="Edit chart account" data-id="{{ $chart_account->id }}"><i data-feather="edit"></i></button>
                                            <button class="btn btn-dark rem-element px-2 py-1" title="Delete chart account" data-id="{{ $chart_account->id }}"><i data-feather="trash-2"></i></button>
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
            url: '{{ route('chart-of-account.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('chart-of-account.index') }}';
                    });
            },
            error: function(xhr, textStatus, errorThrown) {
                $("#addSubmit").prop('disabled', false);
                if (xhr.status == 422) {
                    resetErrors();
                    printErrMsg(xhr.responseJSON.errors);
                } else {
                    swal("Error!", "Something went wrong, please try again", "error");
                }
            }
        });

        function resetErrors() {
            $('.is-invalid').removeClass('is-invalid');
            $('.text-danger').text('');
        }

        function printErrMsg(errors) {
            $.each(errors, function(key, value) {
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
            });
        }
    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('chart-of-account.edit',':model_id') }}";

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

                if (!data.error) {
                    console.log(data.chartaccount);
                    $("#editForm input[name='edit_chart_account_id']").val(data.chartaccount.id);
                    $("#editForm select[name='edit_component_id']").html(data.componentnameHtml);
                    $("#editForm input[name='edit_number_of_level']").val(data.chartaccount.number_of_level);
                    $("#editForm textarea[name='edit_level_one_description']").val(data.chartaccount.level_one_description);
                    $("#editForm input[name='edit_digit_of_level_one']").val(data.chartaccount.digit_of_level_one);
                    $("#editForm textarea[name='edit_level_two_description']").val(data.chartaccount.level_two_description);
                    $("#editForm input[name='edit_digit_of_level_two']").val(data.chartaccount.digit_of_level_two);
                    if (data.chartaccount.default_flag == true) {
                        $("#editForm input[name='edit_default_flag']").prop('checked', true);
                    } else {
                        $("#editForm input[name='edit_default_flag']").prop('checked', false);
                    }
                } else {
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
            var model_id = $('#edit_chart_account_id').val();
            var url = "{{ route('chart-of-account.update', ':model_id') }}";

            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('chart-of-account.index') }}';
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
                        swal("Error occured!", "Something went wrong please try again",
                            "error");
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
                title: "Are you sure to delete this chart of account?",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('chart-of-account.destroy', ':model_id') }}";

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
