<x-admin.layout>
    <x-slot name="title">Field Master</x-slot>
    <x-slot name="heading">Field Master</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="mb-3 row">
                            <h5>Field Master : </h5><br>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_level">Field Level <span class="text-danger">*</span></label>
                                <input class="form-control" id="master_field_level" name="master_field_level" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_field_level_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_code">Field Code <span class="text-danger">*</span></label>
                                <input class="form-control" id="master_field_code" name="master_field_code" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_field_code_err"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_description">Field Description <span class="text-danger"></span></label>
                                <input class="form-control" id="master_field_description" name="master_field_description" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_field_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_final_code">Final Code <span class="text-danger"></span></label>
                                <input class="form-control" id="master_final_code" name="master_final_code" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_final_code_err"></span>
                            </div>
                        </div>

                        <h5>Work Flow Steps : </h5><br>
                        <!--------------------------------Add more Start----------------------------->
                        <div class="panel panel-footer">
                            <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                <thead>
                                    <tr>
                                        <th>Field Level <span class="text-danger">*</span> </th>
                                        <th>Field Code <span class="text-danger">*</span> </th>
                                        <th>Field Description <span class="text-danger">*</span> </th>
                                        <th>Field Parent Level <span class="text-danger">*</span></th>
                                        <th>Parent Code </th>
                                        <th>Composite Code </th>
                                        <th style="">
                                            <a href="javascript:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="addMore">
                                    <tr>
                                        <td>
                                            <select class="js-example-basic-single form-control" name="field_level[]" id="field_level">
                                                <option value="">--Select--</option>
                                                <option value="1">Test</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="field_code[]" class="form-control" multiple=""></td>
                                        <td><input type="text" name="field_description[]" class="form-control"  multiple=""></td>
                                        <td>
                                            <select class="js-example-basic-single form-control" name="field_parent_level[]" id="field_parent_level">
                                                <option value="">--Select--</option>
                                                <option value="1">Test</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="js-example-basic-single form-control" name="parent_code[]" id="field_parent_code">
                                                <option value="">--Select--</option>
                                                <option value="1">Test</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="composite_code[]" class="form-control" multiple=""></td>
                                        <td style="">
                                            <a href="javascript:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a>
                                        </td>
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
                        <h4 class="card-title">Edit Field Master</h4>
                    </header>

                    <div class="card-body py-2">
                        <div class="mb-3 row">
                            <input type="hidden" id="edit_field_master_id" name="edit_field_master_id" value="">
                            <h5>Edit Field Master : </h5><br>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_level">Field Level <span class="text-danger">*</span></label>
                                <input class="form-control" id="master_field_level" name="master_field_level" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_field_level_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_code">Field Code <span class="text-danger">*</span></label>
                                <input class="form-control" id="master_field_code" name="master_field_code" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid edit_field_code_err"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_field_description">Field Description <span class="text-danger"></span></label>
                                <input class="form-control" id="master_field_description" name="master_field_description" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_field_description_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="master_final_code">Final Code <span class="text-danger"></span></label>
                                <input class="form-control" id="master_final_code" name="master_final_code" type="text" placeholder="Enter">
                                <span class="text-danger is-invalid master_final_code_err"></span>
                            </div>
                        </div>

                        <h5>Work Flow Steps : </h5><br>
                        <!--------------------------------Add more Start----------------------------->
                        <div class="panel panel-footer">
                            <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                <thead>
                                    <tr>
                                        <th style="visibility:hidden">Id</th>
                                        <th>Field Level <span class="text-danger">*</span> </th>
                                        <th>Field Code <span class="text-danger">*</span> </th>
                                        <th>Field Description <span class="text-danger">*</span> </th>
                                        <th>Field Parent Level <span class="text-danger">*</span></th>
                                        <th>Parent Code </th>
                                        <th>Composite Code </th>
                                        <th style="">
                                            <a href="javascript:" class="btn btn-sm btn-success addMoreFormEdit"><i class="fa fa-plus"></i>  </a>
                                        </th>
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
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Field Code </th>
                                    <th>Field Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($field_masters as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong> {{ $value->field_code }} </strong></td>
                                        <td><strong> {{ $value->field_description }} </strong></td>
                                        <td>
                                            <button class="edit-element btn btn-primary px-2 py-1" title="Edit workflow" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                            <button class="btn btn-dark rem-element px-2 py-1" title="Delete workflow" data-id="{{ $value->id }}"><i data-feather="trash-2"></i></button>
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
            url: '{{ route('field-master.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('field-master.index') }}';
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
        var url = "{{ route('field-master.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_field_master_id']").val(data.field_master.id);
                    $("#editForm input[name='master_field_level']").val(data.field_master.field_level);
                    $("#editForm input[name='master_field_code']").val(data.field_master.field_code);
                    $("#editForm input[name='master_field_description']").val(data.field_master.field_description);
                    $("#editForm input[name='master_final_code']").val(data.field_master.final_code);

                    //---  data selected ---
                    var tableBody = $('#addMoreEdit');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    tableBody.find('.js-example-basic-single').select2();
                    //---  data selected ---


                    //----------  Add More Form Edit ----------
                        $('.addMoreFormEdit').on('click',function(){
                            addMoreFormEdit();
                        });

                        var rowId = 1;
                        function addMoreFormEdit() {
                            var tr =
                            '<tr id="row_' + rowId + '">' +
                                '<td><input type="hidden" name="field_master_child_id[]" class="form-control" multiple=""></td>' +
                                '<td><select class="js-example-basic-single form-control" name="field_level[]" id="field_level' + rowId + '">' +
                                '<option value="">--Select--</option><option value="1">Test</option></select></td>' +
                                '<td><input type="text" name="field_code[]" class="form-control"></td>' +
                                '<td><input type="text" name="field_description[]" class="form-control" ></td>' +
                                '<td><select class="js-example-basic-single form-control" name="field_parent_level[]" id="field_parent_level' + rowId + '">' +
                                '<option value="">--Select--</option><option value="1">Test</option></select></td>' +
                                '<td><select class="js-example-basic-single form-control" name="parent_code[]" id="parent_code' + rowId + '">' +
                                '<option value="">--Select--</option><option value="1">Test</option></select></td>' +
                                '<td><input type="text" name="composite_code[]" class="form-control"></td>' +
                                '<td><a href="javascript:" class="btn btn-sm btn-danger removeAddMoreEdit" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
                            '<tr>';

                            $('#addMoreEdit').append(tr);
                            $('#field_level' + rowId + ', #field_parent_level' + rowId + ', #parent_code' + rowId).select2();   // Reinitialize Select2 for the new row
                            rowId++;
                        }

                        $(document).on('click', '.removeAddMoreEdit', function () {
                                $(this).parent().parent().remove();
                        });
                    //------------------ End --------------------

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
            var model_id = $('#edit_field_master_id').val();
            var url = "{{ route('field-master.update',':model_id') }}";

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
                            window.location.href = '{{ route('field-master.index') }}';
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
                title: "Are you sure to delete this field master?",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('field-master.destroy', ':model_id') }}";

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
    $('.addMoreForm').on('click', function() {
        addMoreForm();
    });

    var rowId = 1;

    function addMoreForm() {
        var tr = '<tr id="row_' + rowId + '">' +
            '<td><select class="js-example-basic-single form-control" name="field_level[]"  id="field_level_' + rowId +'" ><option value="">--Select--</option><option value="test">Test</option></select></td>' +
            '<td><input type="text" class="form-control" name="field_code[]" value=""></td>' +
            '<td><input type="text" class="form-control" name="field_description[]" value="" ></td>' +
            '<td><select class="js-example-basic-single form-control" name="field_parent_level[]" id="field_parent_level_' + rowId +'"><option value="">--Select--</option><option value="test">Test</option></select></td>' +
            '<td><input type="text" class="form-control" name="parent_code[]" value="" ></td>' +
            '<td><input type="text" class="form-control" name="composite_code[]" value="" ></td>' +
            '<td><a href="javascript:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId +'"><i class="fa fa-remove"></i></a></td>' +
            '<tr>';

        $('#addMore').append(tr);
        $('#field_level_' + rowId + ', #field_parent_level_' + rowId + ', #parent_code_' + rowId).select2();


        rowId++;
    }

    $(document).on('click', '.removeAddMore', function() {
        if ($(this).parents('table').find('.removeAddMore').length > 1) {
            $(this).parent().parent().remove();
        } else {
            alert("Cannot remove the last element.");
        }
    });
</script>
