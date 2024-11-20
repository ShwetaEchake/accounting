<x-admin.layout>
    <x-slot name="title"> Organizations</x-slot>
    <x-slot name="heading">Organizations</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="description"> Description <span class="text-danger">*</span></label>
                                    <input class="form-control" id="description" name="description" type="text" placeholder="">
                                    <span class="text-danger is-invalid description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="regional"> Regional <span class="text-danger">*</span></label>
                                    <input class="form-control" id="regional" name="regional" type="text" placeholder="">
                                    <span class="text-danger is-invalid regional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="value">Value <span class="text-danger">*</span></label>
                                    <input class="form-control" id="value" name="value" type="text" placeholder="">
                                    <span class="text-danger is-invalid value_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="other_value"> Other value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="other_value" name="other_value" type="text" placeholder="">
                                    <span class="text-danger is-invalid other_value_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="default"> Default <span class="text-danger">*</span></label>
                                    <input class="form-control" id="default" name="default" type="text" placeholder="">
                                    <span class="text-danger is-invalid default_err"></span>
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
                            <h4 class="card-title">Edit Organization</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="description"> Description <span class="text-danger">*</span></label>
                                        <input class="form-control" id="description" name="description" type="text" placeholder="">
                                        <span class="text-danger is-invalid description_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                         <label class="col-form-label" for="regional"> Regional <span class="text-danger">*</span></label>
                                         <input class="form-control" id="regional" name="regional" type="text" placeholder="">
                                         <span class="text-danger is-invalid regional_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                         <label class="col-form-label" for="value">Value <span class="text-danger">*</span></label>
                                         <input class="form-control" id="value" name="value" type="text" placeholder="">
                                         <span class="text-danger is-invalid value_err"></span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                         <label class="col-form-label" for="other_value"> Other value<span class="text-danger">*</span></label>
                                         <input class="form-control" id="other_value" name="other_value" type="text" placeholder="">
                                         <span class="text-danger is-invalid other_value_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="default"> Default <span class="text-danger">*</span></label>
                                         <input class="form-control" id="default" name="default" type="text" placeholder="">
                                         <span class="text-danger is-invalid default_err"></span>
                                    </div>
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
                                        <th>Description </th>
                                        <th>Regional</th>
                                        <th>Value</th>
                                        <th>Other value</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $organization)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $organization->description }} </strong></td>
                                            <td><strong> {{ $organization->regional }} </strong></td>
                                            <td><strong> {{ $organization->value }} </strong></td>
                                            <td><strong> {{ $organization->other_value }} </strong></td>
                                            <td><strong> {{ $organization->default }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit organization" data-id="{{ $organization->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete organization" data-id="{{ $organization->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('organizations.store') }}',
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
                            window.location.href = '{{ route('organizations.index') }}';
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
        var url = "{{ route('organizations.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.organization.id);
                    $("#editForm input[name='description']").val(data.organization.description);
                    $("#editForm input[name='regional']").val(data.organization.regional);
                    $("#editForm input[name='value']").val(data.organization.value);
                    $("#editForm input[name='other_value']").val(data.organization.other_value);
                    $("#editForm input[name='default']").val(data.organization.default);
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
            var url = "{{ route('organizations.update', ":model_id") }}";

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
                                window.location.href = '{{ route('organizations.index') }}';
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
            title: "Are you sure to delete this demand classification?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('organizations.destroy', ":model_id") }}";

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
