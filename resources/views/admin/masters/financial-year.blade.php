<x-admin.layout>
    <x-slot name="title">Financial Year</x-slot>
    <x-slot name="heading">Financial Year</x-slot>


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <h5> Details</h5>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="from_date" type="date" placeholder="">
                                    <span class="text-danger is-invalid from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="to_date" type="date" placeholder="">
                                    <span class="text-danger is-invalid to_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="status">
                                        <option value="">--Select--</option>
                                        <option value="open"> Open </option>
                                        <option value="hard_close"> Hard Close</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            </div>


                            <h5>Month Details</h5>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="start_month">Start Month<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="start_month">
                                        <option value="">--Select--</option>
                                        @foreach ($months as $month)
                                          <option value="{{ $month['id'] }}">{{ $month['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid start_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="end_month">End Month<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="end_month">
                                        <option value="">--Select--</option>
                                        @foreach ($months as $month)
                                          <option value="{{ $month['id'] }}">{{ $month['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid end_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="month_status">Month Status<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="month_status">
                                        <option value="">--Select--</option>
                                        <option value="open"> Open </option>
                                        <option value="soft_close"> Soft Close</option>
                                    </select>
                                    <span class="text-danger is-invalid month_status_err"></span>
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
                            <h4 class="card-title">Edit Financial Year</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <h5> Details</h5>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="edit_from_date" type="date" placeholder="">
                                    <span class="text-danger is-invalid from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="edit_to_date" type="date" placeholder="">
                                    <span class="text-danger is-invalid to_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="edit_status">
                                        <option value="">--Select--</option>
                                        <option value="open"> Open </option>
                                        <option value="hard_close"> Hard Close</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            </div>

                            <h5>Month Details</h5>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="start_month">Start Month<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="edit_start_month">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid start_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="end_month">End Month<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="edit_end_month">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid end_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="month_status">Month Status<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control col-sm-12" name="edit_month_status">
                                        <option value="">--Select--</option>
                                        <option value="open"> Open </option>
                                        <option value="soft_close"> Soft Close</option>
                                    </select>
                                    <span class="text-danger is-invalid month_status_err"></span>
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
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Status</th>
                                        {{-- <th>Start Month</th>
                                        <th>End Month</th> --}}
                                        <th>Month Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($financial_years as $financial_year)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $financial_year->from_date }} </strong></td>
                                            <td><strong> {{ $financial_year->to_date }} </strong></td>
                                            <td><strong> {{ $financial_year->status }} </strong></td>
                                            {{-- <td><strong> {{ $financial_year->start_month }} </strong></td>
                                            <td><strong> {{ $financial_year->end_month }} </strong></td> --}}
                                            <td><strong> {{ $financial_year->month_status }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit Property type" data-id="{{ $financial_year->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete Property type" data-id="{{ $financial_year->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('financial-year.store') }}',
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
                            window.location.href = '{{ route('financial-year.index') }}';
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
        var url = "{{ route('financial-year.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.financial_year.id);
                    $("#editForm input[name='edit_from_date']").val(data.financial_year.from_date);
                    $("#editForm input[name='edit_to_date']").val(data.financial_year.to_date);
                    $("#editForm select[name='edit_status']").val(data.financial_year.status);
                    $("#editForm select[name='edit_start_month']").html(data.startmonthHtml);
                    $("#editForm select[name='edit_end_month']").html(data.endmonthHtml);
                    $("#editForm select[name='edit_month_status']").val(data.financial_year.month_status);
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
            var url = "{{ route('financial-year.update', ":model_id") }}";

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
                                window.location.href = '{{ route('financial-year.index') }}';
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
            title: "Are you sure to delete this financial year?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('financial-year.destroy', ":model_id") }}";

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
