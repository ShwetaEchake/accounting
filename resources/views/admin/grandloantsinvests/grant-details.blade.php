<x-admin.layout>
    <x-slot name="title">Grant Master</x-slot>
    <x-slot name="heading">Grant Master</x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3 row">
                                <h5> Grant Detail  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_type"> Grant Type <span class="text-danger">*</span></label><br>    
                                    <input type="radio" name="grant_type"  value="revenue">  Revenue 
                                    <input type="radio" name="grant_type"  value="capital" >  Capital
                                    <span class="text-danger is-invalid grant_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_name"> Grant Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_name" name="grant_name" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid grant_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_date"> Grant Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_date" name="grant_date" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid grant_date_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="nature_of_the_grant">Nature of the Grant <span class="text-danger">*</span></label>
                                    <input class="form-control" id="nature_of_the_grant" name="nature_of_the_grant" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid nature_of_the_grant_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_from_period">Grant From Period <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_from_period" name="grant_from_period" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid grant_from_period_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_to_period">Grant To Period <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="grant_to_period" name="grant_to_period" value="" type="text" placeholder="Enter" > 
                                    <span class="text-danger is-invalid grant_to_period_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_number">Sanction Number <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanction_number" name="sanction_number" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid sanction_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_amount">Sanction Amount <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanction_amount" name="sanction_amount" type="text" placeholder="Enter">
                                    <span class="text-danger is-invalid sanction_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_date">Sanction  Date <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="sanction_date" name="sanction_date" value="" type="text" placeholder="Enter" > 
                                    <span class="text-danger is-invalid sanction_date_err"></span>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanctioning_authority">Sanction Authority<span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanctioning_authority" name="sanctioning_authority" type="text" placeholder="">
                                    <span class="text-danger is-invalid sanction_authority_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="received_amount">Received Amount <span class="text-danger">*</span></label>
                                    <input class="form-control" id="received_amount" name="received_amount" type="text" placeholder="">
                                    <span class="text-danger is-invalid received_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fund">Fund <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="fund" name="fund" value="" type="text" placeholder="" > 
                                    <span class="text-danger is-invalid fund_err"></span>
                                </div>
                            </div>

                            <h5>Receipt Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Receipt Number  <span class="text-danger">*</span> </th>
                                                <th>Received From  <span class="text-danger">*</span> </th>
                                                <th>Receipt Date <span class="text-danger">*</span> </th>
                                                <th>Receipt Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFormRefund"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreRefund">
                                        <tr>
                                            <td>
                                                <input class="form-control" id="receipt_number" name="receipt_number[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid receipt_number_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="received_from" name="received_from[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid received_from_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="receipt_date" name="receipt_date[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid receipt_date_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="receipt_amount" name="receipt_amount[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid receipt_amount_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="narration[]" class="form-control" >
                                                <span class="text-danger is-invalid narration_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->



                            <h5>Payment Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Payment Number  <span class="text-danger">*</span> </th>
                                                <th>Payment Date  <span class="text-danger">*</span> </th>
                                                <th>Vendor Name <span class="text-danger">*</span> </th>
                                                <th>Payment Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFormPayment"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMorePayment">
                                        <tr>
                                            <td>
                                                <input class="form-control" id="payment_number" name="payment_number[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid payment_number_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="payment_date" name="payment_date[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid payment_date_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="vendor_name" name="vendor_name[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid vendor_name_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="payment_amount" name="payment_amount[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid payment_amount_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="narration[]" class="form-control" placeholder="" >
                                                <span class="text-danger is-invalid narration_err"></span>
                                            </td>
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->



                            <h5>Refund  Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Bill Number  <span class="text-danger">*</span> </th>
                                                <th>Bill Date  <span class="text-danger">*</span> </th>
                                                <th>Vendor Name <span class="text-danger">*</span> </th>
                                                <th>Bill Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <input class="form-control" id="bill_number" name="bill_number[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid bill_number_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="bill_date" name="bill_date[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid bill_date_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="vendor_name" name="vendor_name[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid vendor_name_err"></span>
                                            </td>
                                            <td>
                                                <input class="form-control" id="bill_amount" name="bill_amount[]" value="" type="text" placeholder="" > 
                                                <span class="text-danger is-invalid bill_amount_err"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="narration[]" class="form-control" placeholder="" >
                                                <span class="text-danger is-invalid narration_err"></span>
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
                            <h4 class="card-title">Edit </h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            

                            <div class="mb-3 row">
                                <h5> Grant Detail  : </h5><br>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_type"> Grant Type <span class="text-danger">*</span></label><br>    
                                    <input type="radio" name="grant_type" value="revenu" >  Revenu
                                    <input type="radio" name="grant_type" value="capital" >  Capital
                                    <span class="text-danger is-invalid grant_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_name"> Grant Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_name" name="grant_name" type="text" placeholder="">
                                    <span class="text-danger is-invalid grant_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_date"> Grant Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_date" name="grant_date" type="text" placeholder="">
                                    <span class="text-danger is-invalid grant_date_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="nature_of_the_grant">Nature of the Grant <span class="text-danger">*</span></label>
                                    <input class="form-control" id="nature_of_the_grant" name="nature_of_the_grant" type="text" placeholder="">
                                    <span class="text-danger is-invalid nature_of_the_grant_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_from_period">Grant From Period <span class="text-danger">*</span></label>
                                    <input class="form-control" id="grant_from_period" name="grant_from_period" type="text" placeholder="">
                                    <span class="text-danger is-invalid grant_from_period_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="grant_to_period">Grant To Period <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="grant_to_period" name="grant_to_period" value="" type="text" placeholder="" > 
                                    <span class="text-danger is-invalid grant_to_period_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_number">Sanction Number <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanction_number" name="sanction_number" type="text" placeholder="">
                                    <span class="text-danger is-invalid sanction_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_amount">Sanction Amount <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanction_amount" name="sanction_amount" type="text" placeholder="">
                                    <span class="text-danger is-invalid sanction_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanction_date">Sanction  Date <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="sanction_date" name="sanction_date" value="" type="text" placeholder="" > 
                                    <span class="text-danger is-invalid sanction_date_err"></span>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sanctioning_authority">Sanction Authority<span class="text-danger">*</span></label>
                                    <input class="form-control" id="sanctioning_authority" name="sanctioning_authority" type="text" placeholder="">
                                    <span class="text-danger is-invalid sanctioning_authority_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="received_amount">Received Amount <span class="text-danger">*</span></label>
                                    <input class="form-control" id="received_amount" name="received_amount" type="text" placeholder="">
                                    <span class="text-danger is-invalid received_amount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fund">Fund <span class="text-danger">*</span></label><br>
                                    <input class="form-control" id="fund" name="fund" value="" type="text" placeholder="" > 
                                    <span class="text-danger is-invalid fund_err"></span>
                                </div>
                            </div>

                            <h5>Receipt Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Receipt Number  <span class="text-danger">*</span> </th>
                                                <th>Received From  <span class="text-danger">*</span> </th>
                                                <th>Receipt Date <span class="text-danger">*</span> </th>
                                                <th>Receipt Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style="">
                                                    {{-- <a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a> --}}
                                                </th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEdit">
                                       
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->



                            <h5>Payment Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Payment Number  <span class="text-danger">*</span> </th>
                                                <th>Payment Date  <span class="text-danger">*</span> </th>
                                                <th>Vendor Name <span class="text-danger">*</span> </th>
                                                <th>Payment Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style="">
                                                    {{-- <a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a> --}}
                                                </th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEditPayment">
                                       
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->



                            <h5>Refund  Details : </h5><br>
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th style="visibility: hidden">Auto ID </th>
                                                <th>Bill Number  <span class="text-danger">*</span> </th>
                                                <th>Bill Date  <span class="text-danger">*</span> </th>
                                                <th>Vendor Name <span class="text-danger">*</span> </th>
                                                <th>Bill Amount <span class="text-danger">*</span></th>
                                                <th>Narration <span class="text-danger">*</span>  </th>
                                                <th style="">
                                                    {{-- <a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a> --}}
                                                </th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEditRefund">
                                       
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
                                        <th>Grant Type </th>
                                        <th>Grant Name</th>
                                        <th>Sanction Number</th>
                                        <th>Sanction Amount</th>
                                        <th>Sanction Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grant_details as $value)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td><strong> {{ $value->grant_type  }} </strong></td>
                                            <td><strong> {{ $value->grant_name  }} </strong></td>
                                            <td><strong> {{ $value->sanction_number }} </strong></td>
                                            <td><strong> {{ $value->sanction_number  }} </strong></td>
                                            <td><strong> {{ $value->sanction_date  }} </strong></td>
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
            url: '{{ route('grant-details.store') }}',
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
                            window.location.href = '{{ route('grant-details.index') }}';
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
        var url = "{{ route('grant-details.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.grant_detail.id);
                    $("#editForm input[name='grant_name']").val(data.grant_detail.grant_name);
                    $("#editForm input[name='grant_date']").val(data.grant_detail.grant_date);
                    $("#editForm input[name='nature_of_the_grant']").val(data.grant_detail.nature_of_the_grant);
                    $("#editForm input[name='grant_from_period']").val(data.grant_detail.grant_from_period);
                    $("#editForm input[name='grant_to_period']").val(data.grant_detail.grant_to_period);
                    $("#editForm input[name='sanction_number']").val(data.grant_detail.sanction_number);
                    $("#editForm input[name='sanction_amount']").val(data.grant_detail.sanction_amount);
                    $("#editForm input[name='sanction_date']").val(data.grant_detail.sanction_date);
                    $("#editForm input[name='sanctioning_authority']").val(data.grant_detail.sanctioning_authority);
                    $("#editForm input[name='received_amount']").val(data.grant_detail.received_amount);
                    $("#editForm input[name='fund']").val(data.grant_detail.fund);
                    var grantType = data.grant_detail.grant_type;
                    $("#editForm input[name='grant_type'][value='" + grantType + "']").prop("checked", true);
                    // $("#editForm input[name='to_amount']").val(data.workflow.to_amount);
                    
                    //---  data selected ---
                    var tableBody = $('#addMoreEdit');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    // tableBody.find('.js-example-basic-single').select2();
                    //---  data selected ---

                    //---  data selected ---
                    var tableBody = $('#addMoreEditPayment');
                    tableBody.empty();
                    tableBody.append(data.tableRows1);
                    // tableBody.find('.js-example-basic-single').select2();
                    //---  data selected ---

                    //---  data selected ---
                    var tableBody = $('#addMoreEditRefund');
                    tableBody.empty();
                    tableBody.append(data.tableRows2);
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
            var url = "{{ route('grant-details.update', ":model_id") }}";

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
                                window.location.href = '{{ route('grant-details.index') }}';
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
            title: "Are you sure to delete this grant-details?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('grant-details.destroy', ":model_id") }}";

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
         '<td><input type="text" class="form-control" name="receipt_number[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="received_from[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="receipt_date[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="receipt_amount[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="narration[]" value="" ></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMore').append(tr);
    }

    $(document).on('click', '.removeAddMore', function () {
      if ($(this).parents('table').find('.removeAddMore').length > 1) {
          $(this).parent().parent().remove();
      } else {
          alert("Cannot remove the last element.");
      }
    });
  </script>



  {{-------------  Refund Details --------------}}
  <script>
    $('.addMoreFormRefund').on('click',function(){
      addMoreFormRefund();
    });

    var rowId = 1;
    function addMoreFormRefund() {
      var tr = '<tr id="row_' + rowId + '">' +
         '<td><input type="text" class="form-control" name="payment_number[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="payment_date[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="vendor_name[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="payment_amount[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="narration[]" value="" ></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMoreRefund').append(tr);
    }

    $(document).on('click', '.removeAddMore', function () {
      if ($(this).parents('table').find('.removeAddMore').length > 1) {
          $(this).parent().parent().remove();
      } else {
          alert("Cannot remove the last element.");
      }
    });
  </script>




  {{-------------  Payment Details --------------}}
  <script>
    $('.addMoreFormPayment').on('click',function(){
      addMoreFormPayment();
    });

    var rowId = 1;
    function addMoreFormPayment() {
      var tr = '<tr id="row_' + rowId + '">' +
         '<td><input type="text" class="form-control" name="payment_number[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="payment_date[]" value="" ></td>' +
         '<td><input type="text" class="form-control" name="vendor_name[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="payment_amount[]" value="" ></td>' +
         '<td><input type="number" class="form-control" name="narration[]" value="" ></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMorePayment').append(tr);
    }

    $(document).on('click', '.removeAddMore', function () {
      if ($(this).parents('table').find('.removeAddMore').length > 1) {
          $(this).parent().parent().remove();
      } else {
          alert("Cannot remove the last element.");
      }
    });
  </script>
  

