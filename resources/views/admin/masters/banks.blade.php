<x-admin.layout>
    <x-slot name="title">Bank Master</x-slot>
    <x-slot name="heading">Bank Master</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_name">Bank Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="Enter Bank Name">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_branch">Bank Branch <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_branch" name="bank_branch" type="text" placeholder="Enter Bank Branch">
                                    <span class="text-danger is-invalid bank_branch_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="micr_code">MICR Code <span class="text-danger"></span></label>
                                    <input class="form-control" id="micr_code" name="micr_code" type="text" placeholder="Enter MICR Code">
                                    <span class="text-danger is-invalid micr_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_branch">Bank Branch <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_branch" name="bank_branch" type="text" placeholder="Enter Bank Branch">
                                    <span class="text-danger is-invalid bank_branch_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="city">City <span class="text-danger">*</span></label>
                                    <input class="form-control" id="city" name="city" type="text" placeholder="Enter City">
                                    <span class="text-danger is-invalid city_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="district">District <span class="text-danger">*</span></label>
                                    <input class="form-control" id="district" name="district" type="text" placeholder="Enter District">
                                    <span class="text-danger is-invalid district_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="state">State <span class="text-danger">*</span></label>
                                    <input class="form-control" id="state" name="state" type="text" placeholder="Enter State">
                                    <span class="text-danger is-invalid state_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="branch_address">Branch Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="branch_address" name="branch_address" type="text" placeholder="Enter Branch Address"></textarea>
                                    <span class="text-danger is-invalid branch_address_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contact_details">Contact Details <span class="text-danger"></span></label>
                                    <input class="form-control" id="contact_details" name="contact_details" type="text" placeholder="Enter contact details">
                                    <span class="text-danger is-invalid contact_details_err"></span>
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
                            <h4 class="card-title">Edit Bank</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="bank_name">Bank Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="Enter Bank Name">
                                        <span class="text-danger is-invalid bank_name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="bank_branch">Bank Branch <span class="text-danger">*</span></label>
                                        <input class="form-control" id="bank_branch" name="bank_branch" type="text" placeholder="Enter Bank Branch">
                                        <span class="text-danger is-invalid bank_branch_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
                                        <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" placeholder="Enter IFSC Code">
                                        <span class="text-danger is-invalid ifsc_code_err"></span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="micr_code">MICR Code <span class="text-danger"></span></label>
                                        <input class="form-control" id="micr_code" name="micr_code" type="text" placeholder="Enter MICR Code">
                                        <span class="text-danger is-invalid micr_code_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="bank_branch">Bank Branch <span class="text-danger">*</span></label>
                                        <input class="form-control" id="bank_branch" name="bank_branch" type="text" placeholder="Enter Bank Branch">
                                        <span class="text-danger is-invalid bank_branch_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="city">City <span class="text-danger">*</span></label>
                                        <input class="form-control" id="city" name="city" type="text" placeholder="Enter City">
                                        <span class="text-danger is-invalid city_err"></span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="district">District <span class="text-danger">*</span></label>
                                        <input class="form-control" id="district" name="district" type="text" placeholder="Enter District">
                                        <span class="text-danger is-invalid district_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="state">State <span class="text-danger">*</span></label>
                                        <input class="form-control" id="state" name="state" type="text" placeholder="Enter State">
                                        <span class="text-danger is-invalid state_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="branch_address">Branch Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="branch_address" name="branch_address" type="text" placeholder="Enter Branch Address"></textarea>
                                        <span class="text-danger is-invalid branch_address_err"></span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="text-danger is-invalid status_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="contact_details">Contact Details <span class="text-danger"></span></label>
                                        <input class="form-control" id="contact_details" name="contact_details" type="text" placeholder="Enter contact details">
                                        <span class="text-danger is-invalid contact_details_err"></span>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                                        Import File
                                    </button>
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
                                        <th>Banks </th>
                                        <th>Branch</th>
                                        <th>IFSC Code</th>
                                        <th>MICR Code</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banks as $bank)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $bank->bank_name }} </strong></td>
                                            <td><strong> {{ $bank->bank_branch }} </strong></td>
                                            <td><strong> {{ $bank->ifsc_code }} </strong></td>
                                            <td><strong> {{ $bank->micr_code }} </strong></td>
                                            <td><strong> {{ $bank->city }} </strong></td>
                                            <td><strong> {{ $bank->status == 1 ? 'Active' : 'Inactive' }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit Bank" data-id="{{ $bank->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete Bank" data-id="{{ $bank->id }}"><i data-feather="trash-2"></i> </button>
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


        <!-- Modal for file upload -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('banks.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose file to import</label>
                                <input type="file" name="file" class="form-control" id="file" required>
                            </div>

                            <div class="mb-3">
                                <p>Download a sample file to see the required format:</p>
                                <a href="{{ asset('storage/samples/banks.xlsx') }}" class="btn btn-sm btn-info">
                                    Download Sample Excel File
                                </a>
                            </div>

                            <button type="submit" class="btn btn-success">Import</button>
                        </form>
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
            url: '{{ route('banks.store') }}',
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
                            window.location.href = '{{ route('banks.index') }}';
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
        var url = "{{ route('banks.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.bank.id);
                    $("#editForm input[name='bank_name']").val(data.bank.bank_name);
                    $("#editForm input[name='bank_branch']").val(data.bank.bank_branch);
                    $("#editForm input[name='ifsc_code']").val(data.bank.ifsc_code);
                    $("#editForm input[name='micr_code']").val(data.bank.micr_code);
                    $("#editForm input[name='city']").val(data.bank.city);
                    $("#editForm input[name='district']").val(data.bank.district);
                    $("#editForm input[name='state']").val(data.bank.state);
                    $("#editForm input[name='branch_address']").val(data.bank.branch_address);
                    $("#editForm input[name='status']").val(data.bank.status);
                    $("#editForm input[name='contact_details']").val(data.bank.contact_details);
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
            var url = "{{ route('banks.update', ":model_id") }}";

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
                                window.location.href = '{{ route('banks.index') }}';
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
            title: "Are you sure to delete this bank?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('banks.destroy', ":model_id") }}";

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
