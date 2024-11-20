<x-admin.layout>
    <x-slot name="title">Receipts</x-slot>
    <x-slot name="heading">Receipts</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3 row">
                                <h5>Receipt Details  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="receipt_date"> Receipt Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="receipt_date" name="receipt_date" type="date" placeholder="Enter">
                                    <span class="text-danger is-invalid receipt_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="service_id">Receipt Category <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="receipt_category">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                          <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid service_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="received_from">Receipt From <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="received_from">
                                        <option value="">--Select--</option>
                                        @foreach ($masters as $master)
                                            <option value="{{ $master->id }}">{{ $master->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid received_from_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="payer_name">Payer Name <span class="text-danger"></span></label>
                                    <input class="form-control" id="payer_name" name="payer_name" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid payer_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile No <span class="text-danger"></span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email Id <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="email_id" name="email_id"  type="text" placeholder="Enter" >
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="manual_receipt_no">Manual Receipt No <span class="text-danger"></span></label>
                                    <input class="form-control" id="manual_receipt_no" name="manual_receipt_no" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid manual_receipt_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="narration">Narration <span class="text-danger"></span></label>
                                    <input class="form-control" id="narration" name="narration" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid narration_err"></span>
                                </div>
                            </div>


                            <br><h5>Receipt Heads : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Receipt Head  <span class="text-danger">*</span> </th>
                                                <th>Receipt Amount <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="receipt_head[]" id="receipt_head" >
                                                   <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                      <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid receipt_head_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="receipt_amount[]" value="" >
                                                <span class="text-danger is-invalid receipt_amount_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->
                            
                            
                            
                            <h5>Receipt Mode : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Mode  <span class="text-danger">*</span> </th>
                                                <th>Bank Name <span class="text-danger">*</span></th>
                                                <th>Instrument No <span class="text-danger">*</span></th>
                                                <th>Instrument Date <span class="text-danger">*</span></th>
                                                <th>Total Amount<span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFormMode"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreMode">
                                        <tr>
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
                                                <select class="js-example-basic-single form-control" name="bank_name[]" id="bank_name" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                      <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid bank_name_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="instrument_no" name="instrument_no[]" type="text" placeholder="">
                                               <span class="text-danger is-invalid instrument_no_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="instrument_date" name="instrument_date[]" type="text" placeholder="">
                                               <span class="text-danger is-invalid instrument_date_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="total_amount" name="total_amount[]" type="text" placeholder="">
                                               <span class="text-danger is-invalid total_amount_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMoreMode"><i class="fa fa-remove"></i></a></td>
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
                            <h4 class="card-title">Edit Receipt Details</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                <h5>Receipt Details  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="receipt_date"> Receipt Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="receipt_date" name="receipt_date" type="date" placeholder="Enter">
                                    <span class="text-danger is-invalid receipt_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="receipt_category">Receipt Category <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="receipt_category">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid receipt_category_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="received_from">Receipt From <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="received_from">
                                        <option value="">--Select--</option>
                                    </select>
                                    <span class="text-danger is-invalid received_from_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="payer_name">Payer Name <span class="text-danger"></span></label>
                                    <input class="form-control" id="payer_name" name="payer_name" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid payer_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile No <span class="text-danger"></span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email Id <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="email_id" name="email_id"  type="text" placeholder="Enter" >
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="manual_receipt_no">Manual Receipt No <span class="text-danger"></span></label>
                                    <input class="form-control" id="manual_receipt_no" name="manual_receipt_no" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid manual_receipt_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="narration">Narration <span class="text-danger"></span></label>
                                    <input class="form-control" id="narration" name="narration" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid narration_err"></span>
                                </div>
                            </div>


                            <br><h5>Receipt Heads : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Receipt Head  <span class="text-danger">*</span> </th>
                                                <th>Receipt Amount <span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEdit">
                                        {{-- <tr>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="receipt_head[]" id="receipt_head" >
                                                   <option value="">--Select--</option>
                                                   @foreach ($masters as $master)
                                                     <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                   @endforeach
                                                </select>
                                                <span class="text-danger is-invalid receipt_head_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="receipt_amount[]" value="" >
                                                <span class="text-danger is-invalid receipt_amount_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr> --}}
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->
                            
                            
                            
                            <h5>Receipt Mode : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Mode  <span class="text-danger">*</span> </th>
                                                <th>Bank Name <span class="text-danger">*</span></th>
                                                <th>Instrument No <span class="text-danger">*</span></th>
                                                <th>Instrument Date <span class="text-danger">*</span></th>
                                                <th>Total Amount<span class="text-danger">*</span></th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        {{-- <tr>
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
                                                <select class="js-example-basic-single form-control" name="bank_name[]" id="bank_name" >
                                                    <option value="">--Select--</option>
                                                    @foreach ($masters as $master)
                                                     <option value="{{ $master->id }}">{{ $master->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger is-invalid bank_name_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="instrument_no" name="instrument_no[]" type="text" placeholder="Enter">
                                               <span class="text-danger is-invalid instrument_no_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="instrument_date" name="instrument_date[]" type="text" placeholder="Enter">
                                               <span class="text-danger is-invalid instrument_date_err"></span>
                                            </td>
                                            <td>
                                               <input class="form-control" id="total_amount" name="total_amount[]" type="text" placeholder="Enter">
                                               <span class="text-danger is-invalid total_amount_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr> --}}
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
                                        <th>Receipt Number </th>
                                        <th>Receipt Date</th>
                                        <th>Payer Name</th>
                                        {{-- <th>Receipt Amount</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($receipt_detail as $value)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td><strong> {{ $value->receipt_date  }} </strong></td>
                                            <td><strong> {{ $value->receipt_date  }} </strong></td>
                                            <td><strong> {{ $value->payer_name  }} </strong></td>
                                            {{-- <td><strong> {{ $value->receiptHead->isNotEmpty() ? $value->receiptHead->first()->receipt_amount : 'N/A' }}</strong></td> --}}
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
            url: '{{ route('receipt-details.store') }}',
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
                            window.location.href = '{{ route('receipt-details.index') }}';
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
        var url = "{{ route('receipt-details.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.receipt_detail.id);
                    $("#editForm input[name='receipt_date']").val(data.receipt_detail.receipt_date);
                    $("#editForm select[name='receipt_category']").html(data.mastersHtml);
                    $("#editForm select[name='received_from']").html(data.mastersHtml);
                    $("#editForm input[name='payer_name']").val(data.receipt_detail.payer_name);
                    $("#editForm input[name='mobile_no']").val(data.receipt_detail.mobile_no);
                    $("#editForm input[name='email_id']").val(data.receipt_detail.email_id);
                    $("#editForm input[name='manual_receipt_no']").val(data.receipt_detail.manual_receipt_no);
                    $("#editForm input[name='narration']").val(data.receipt_detail.narration);

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
            var url = "{{ route('receipt-details.update', ":model_id") }}";

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
                                window.location.href = '{{ route('receipt-details.index') }}';
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
            title: "Are you sure to delete this receipt details?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('receipt-details.destroy', ":model_id") }}";

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
         '<td><select class="js-example-basic-single form-control" name="receipt_head[]"  id="receipt_head_' + rowId + '" ><option value="">--Select--</option>@foreach ($masters as $master) <option value="{{ $master->id }}">{{ $master->description }}</option>@endforeach</select></td>' +
         '<td><input type="text" class="form-control" name="receipt_amount[]" value="" ></td>' +
         
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMore').append(tr);
      $('#receipt_head_' + rowId + ', #receipt_amount_' + rowId).select2();


      rowId++;
    }

    $(document).on('click', '.removeAddMore', function () {
      if ($(this).parents('table').find('.removeAddMore').length > 1) {
          $(this).parent().parent().remove();
      } else {
          alert("Cannot remove the last element.");
      }
    });
  </script>






{{-- Add More Form Mode --}}
<script>
    $('.addMoreFormMode').on('click',function(){
      addMoreFormMode();
    });

    var rowId = 1;
    function addMoreFormMode() {
      var tr = '<tr id="row_' + rowId + '">' +
         '<td><select class="js-example-basic-single form-control" name="mode[]"  id="mode_' + rowId + '" ><option value="">--Select--</option>@foreach ($masters as $master)<option value="{{ $master->id }}">{{ $master->description }}</option>@endforeach</select></td>' +
         '<td><select class="js-example-basic-single form-control" name="bank_name[]" id="bank_name_' + rowId + '"><option value="">--Select--</option>@foreach ($masters as $master)<option value="{{ $master->id }}">{{ $master->description }}</option>@endforeach</select></td>' +
         '<td><input type="text" class="form-control" name="instrument_no[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="instrument_date[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="total_amount[]" value="" ></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMoreMode').append(tr);
      $('#mode_' + rowId + ', #bank_name_' + rowId).select2();


      rowId++;
    }

    $(document).on('click', '.removeAddMoreMode', function () {
      if ($(this).parents('table').find('.removeAddMoreMode').length > 1) {
          $(this).parent().parent().remove();
      } else {
          alert("Cannot remove the last element.");
      }
    });
  </script>


