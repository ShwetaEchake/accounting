<x-admin.layout>
    <x-slot name="title">Tax </x-slot>
    <x-slot name="heading">Tax </x-slot>

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="live-preview">
                            <div class="accordion accordion-icon-none" id="accordionWithouticon">
                                <!-- First -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="accordionwithouticonExample1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_withouticoncollapse1" aria-expanded="true" aria-controls="accor_withouticoncollapse1">
                                            <i class="btn btn-success bx bx-plus-circle me-2"></i> <b>Tax Master</b>
                                        </button>
                                    </h2>
                                    <div id="accor_withouticoncollapse1" class="accordion-collapse collapse show" aria-labelledby="accordionwithouticonExample1" data-bs-parent="#accordionWithouticon">
                                        <!-- Tax Matser -->
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="tax_name">Tax Name <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="tax_name">
                                                        <option value="">--Select--</option>
                                                        @foreach($tax_masters as $tax_master)
                                                        <option value="{{$tax_master->id}}">{{$tax_master->tax_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid tax_name_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="department">Department <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="department">
                                                        <option value="">--Select--</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid department_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="applicable_at">Applicable at<span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="applicable_at">
                                                        <option value="">--Select--</option>
                                                        @foreach($applicable_at as $applicable)
                                                         <option value="{{$applicable->id}}">{{$applicable->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid applicable_at_err"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="calculation_method">Calculation method<span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="calculation_method">
                                                        <option value="">--Select--</option>
                                                        @foreach($calculation_methods as $calculation_method)
                                                        <option value="{{$calculation_method->id}}">{{$calculation_method->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid calculation_method_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="parent_tax_code">Parent tax code <span class="text-danger"></span></label>
                                                    <select class="js-example-basic-single form-control" name="parent_tax_code">
                                                        <option value="">--Select--</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="text-danger is-invalid parent_tax_code_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="tax_group">Tax group <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="tax_group">
                                                        <option value="">--Select--</option>
                                                        @foreach($tax_groups as $tax_group)
                                                        <option value="{{$tax_group->id}}">{{$tax_group->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid tax_group_err"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="tax_category">Tax category <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="tax_category">
                                                         <option value="">--Select--</option>
                                                        @foreach($tax_categories as $tax_category)
                                                         <option value="{{$tax_category->id}}">{{$tax_category->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid tax_category_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="	tax_sub_category">	Tax sub category <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="tax_sub_category">
                                                        <option value="">--Select--</option>
                                                        @foreach($tax_categories as $tax_category)
                                                         <option value="{{$tax_category->id}}">{{$tax_category->description}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid  tax_sub_category_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="services">Services <span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="services">
                                                        <option value="">--Select--</option>
                                                        @foreach($services as $service)
                                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger is-invalid services_err"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="print_on">Print on <span class="text-danger">*</span></label><br>
                                                    <input style="margin-left: 5px;" class="" name="print_on[]" value="bill" type="checkbox"> Bill</input>
                                                    <input style="margin-left: 15px;" class="" name="print_on[]" value="notice" type="checkbox"> Notice</input>
                                                    <input style="margin-left: 15px;" class="" name="print_on[]" value="receipt" type="checkbox"> Receipt</input><br>
                                                    <span class="text-danger is-invalid print_on_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="collection_sequence">Collection sequence <span class="text-danger"></span></label>
                                                    <input class="form-control" id="collection_sequence" name="collection_sequence" type="text" placeholder="Enter ">
                                                    <span class="text-danger is-invalid collection_sequence_err"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label" for="display_sequence">Display sequence <span class="text-danger"></span></label>
                                                    <input class="form-control" id="display_sequence" name="display_sequence" type="text" placeholder="Enter ">
                                                    <span class="text-danger is-invalid display_sequence_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tax Matser End -->
                                    </div>
                                </div>
                                <!-- Second -->
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="accordionwithouticonExample2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_withouticoncollapse2" aria-expanded="false" aria-controls="accor_withouticoncollapse2">
                                            <i class="ri-user-location-line me-2"></i> Depends On Factor
                                        </button>
                                    </h2>
                                    <div id="accor_withouticoncollapse2" class="accordion-collapse collapse" aria-labelledby="accordionwithouticonExample2" data-bs-parent="#accordionWithouticon">
                                        <div class="accordion-body">
                                         <!-- DualListBox -->
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <select name="customleave_from" id="customleave_select" class="form-control" size="5" multiple="multiple">
                                                        <option value="1">Bernardo Galaviz </option>
                                                        <option value="2">Jeffrey Warden</option>
                                                        <option value="2">John Doe</option>
                                                        <option value="2">John Smith</option>
                                                        <option value="3">Mike Litorus</option>
                                                    </select>
                                                </div>
                                                <div class="multiselect-controls col-lg-2 col-sm-2">
                                                    <button type="button" id="customleave_select_rightAll" class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                                    <button type="button" id="customleave_select_rightSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                                    <button type="button" id="customleave_select_leftSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" id="customleave_select_leftAll" class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                                                </div>
                                                <div class="col-lg-5 col-sm-5">
                                                    <select name="customleave_to" id="customleave_select_to" class="form-control" size="8" multiple="multiple"></select>
                                                </div>
                                            </div>
                                         <!-- DualListBox -->
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Third -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="accordionwithouticonExample3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_withouticoncollapse3" aria-expanded="false" aria-controls="accor_withouticoncollapse3">
                                            <i class="btn btn-success bx bx-plus-circle me-2"></i><b> Account Integration</b>
                                        </button>
                                    </h2>
                                    <div id="accor_withouticoncollapse3" class="accordion-collapse collapse" aria-labelledby="accordionwithouticonExample3" data-bs-parent="#accordionWithouticon">
                                        <div class="card-body">
                                            <!--------------------------------Add more Start----------------------------->
                                            <div class="panel panel-footer">
                                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                                    <thead>
                                                            <tr>
                                                                <th>Account Head <span class="text-danger">*</span></th>
                                                                <th>Demand Classification <span class="text-danger">*</span></th>
                                                                <th>Staus <span class="text-danger">*</span></th>
                                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                                            </tr>
                                                    </thead>
                                                    <tbody id="addMore">
                                                        <tr>
                                                            <td>
                                                                <select class="js-example-basic-single form-control" name="account_head[]" id="account_head" >
                                                                    <option value="">--Select--</option>
                                                                     @foreach ($data as $value)
                                                                      <option value="{{ $value['child_id'] }}">{{ $value['item_code'] }}</option>
                                                                     @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="js-example-basic-single form-control" name="demand_classification[]" id="demand_classification" >
                                                                    <option value="">--Select--</option>
                                                                     @foreach ($demand_classifications as $demand_classification)
                                                                      <option value="{{ $demand_classification->id }}">{{ $demand_classification->description }}</option>
                                                                     @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="js-example-basic-single form-control" name="status[]" id="status" >
                                                                    <option value="">--Select--</option>
                                                                    <option value="1">Active</option>
                                                                </select>
                                                            </td>
                                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                                        <tr>
                                                    </tbody>
                                                </table>
                                            </div><br>
                                            <!-------------------------------- End -------------------------------------->
                                        </div>
                                    </div>
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
                            <h4 class="card-title">Edit Tax</h4>
                        </header>

                        <div class="card-body py-2">

                            <div class="live-preview">
                                <div class="accordion accordion-icon-none" id="accordionWithouticon">
                                    <!-- First -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionwithouticonExample1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_withouticoncollapse1" aria-expanded="true" aria-controls="accor_withouticoncollapse1">
                                                <i class="btn btn-success bx bx-plus-circle me-2"></i> <b>Tax Master</b>
                                            </button>
                                        </h2>
                                        <div id="accor_withouticoncollapse1" class="accordion-collapse collapse show" aria-labelledby="accordionwithouticonExample1" data-bs-parent="#accordionWithouticon">
                                            <!-- Tax Matser -->
                                            <div class="card-body">
                                                <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="tax_name">Tax Name <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="tax_name">
                                                        </select>
                                                        <span class="text-danger is-invalid tax_name_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="department">Department <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="department">
                                                        </select>
                                                        <span class="text-danger is-invalid department_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="applicable_at">Applicable at<span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="applicable_at">
                                                        </select>
                                                            <span class="text-danger is-invalid applicable_at_err"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="calculation_method">Calculation method<span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="calculation_method">
                                                        </select>
                                                        <span class="text-danger is-invalid calculation_method_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="parent_tax_code">Parent tax code <span class="text-danger"></span></label>
                                                        <select class="js-example-basic-single form-control" name="parent_tax_code">
                                                        </select>
                                                        <span class="text-danger is-invalid parent_tax_code_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="tax_group">Tax group <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="tax_group">
                                                        </select>
                                                        <span class="text-danger is-invalid tax_group_err"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="tax_category">Tax category <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="tax_category">
                                                        </select>
                                                        <span class="text-danger is-invalid tax_category_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="	tax_sub_category">	Tax sub category <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="tax_sub_category">
                                                        </select>
                                                        <span class="text-danger is-invalid  tax_sub_category_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="services">Services <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single form-control" name="services">
                                                        </select>
                                                        <span class="text-danger is-invalid services_err"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="print_on">Print on <span class="text-danger">*</span></label><br>
                                                        <input style="margin-left: 5px;" class="" name="print_on[]" value="bill" type="checkbox"> Bill</input>
                                                        <input style="margin-left: 15px;" class="" name="print_on[]" value="notice" type="checkbox"> Notice</input>
                                                        <input style="margin-left: 15px;" class="" name="print_on[]" value="receipt" type="checkbox"> Receipt</input><br>
                                                        <span class="text-danger is-invalid print_on_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="collection_sequence">Collection sequence <span class="text-danger"></span></label>
                                                        <input class="form-control" id="collection_sequence" name="collection_sequence" type="text" placeholder="Enter ">
                                                        <span class="text-danger is-invalid collection_sequence_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="display_sequence">Display sequence <span class="text-danger"></span></label>
                                                        <input class="form-control" id="display_sequence" name="display_sequence" type="text" placeholder="Enter ">
                                                        <span class="text-danger is-invalid display_sequence_err"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tax Matser End -->
                                        </div>
                                    </div>

                                    <!-- Third -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionwithouticonExample3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_withouticoncollapse3" aria-expanded="false" aria-controls="accor_withouticoncollapse3">
                                                <i class="btn btn-success bx bx-plus-circle me-2"></i><b> Account Integration</b>
                                            </button>
                                        </h2>
                                        <div id="accor_withouticoncollapse3" class="accordion-collapse collapse show" aria-labelledby="accordionwithouticonExample3" data-bs-parent="#accordionWithouticon">
                                            <div class="card-body">
                                                <!--------------------------------Add more Start----------------------------->
                                                <div class="panel panel-footer">
                                                    <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                                        <thead>
                                                                <tr>
                                                                    <th style="visibility:hidden">Id</th>
                                                                    <th>Account Head <span class="text-danger">*</span></th>
                                                                    <th>Demand Classification <span class="text-danger">*</span></th>
                                                                    <th>Staus <span class="text-danger">*</span></th>
                                                                    <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFormEdit"><i class="fa fa-plus"></i> </a></th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id="addMoreEdit">

                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <!-------------------------------- End -------------------------------------->
                                            </div>
                                        </div>
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
                                        <th>Tax Code </th>
                                        <th>Tax Name </th>
                                        <th>Tax Group </th>
                                        <th>Tax Subcategory </th>
                                        <th>Service </th>
                                        <th>OrgStatus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taxes as $tax)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $tax->parent_tax_code }} </strong></td>
                                            <td><strong> {{ $tax->taxMaster->tax_name }} </strong></td>
                                            <td><strong> {{ $tax->taxGroup->description }} </strong></td>
                                            <td><strong> {{ $tax->tax_subcategory }} </strong></td>
                                            <td><strong> {{ $tax->service->name }} </strong></td>
                                            <td><strong> {{ $tax->services }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit tax" data-id="{{ $tax->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete tax" data-id="{{ $tax->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('taxes.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('taxes.index') }}';
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
        var url = "{{ route('taxes.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.tax.id);
                    $("#editForm select[name='tax_name']").html(data.taxmastersHtml);
                    $("#editForm select[name='department']").html(data.departmentsHtml);
                    $("#editForm select[name='applicable_at']").html(data.applicable_atHtml);
                    $("#editForm select[name='calculation_method']").html(data.calculation_methodsHtml);
                    $("#editForm select[name='parent_tax_code']").html(data.tax.parent_tax_code);
                    $("#editForm select[name='tax_group']").html(data.tax_groupsHtml);
                    $("#editForm select[name='tax_category']").html(data.tax_categoryHtml);
                    $("#editForm select[name='tax_subcategory']").html(data.tax_subcategory);
                    $("#editForm select[name='services']").html(data.servicesHtml);
                    var selectedOptions = data.tax.print_on.split(',');
                    selectedOptions.forEach(function(option) {
                        $("#editForm input[name='print_on[]'][value='" + option + "']").prop('checked', true);
                    });
                    $("#editForm input[name='collection_sequence']").val(data.tax.collection_sequence);
                    $("#editForm input[name='display_sequence']").val(data.tax.display_sequence);

                    //---  data selected ---
                    var tableBody = $('#addMoreEdit');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    tableBody.find('.js-example-basic-single').select2();
                    //---  data selected ---


                    //----------  Add More Form Edit ----------
                     var demandClassOptions = JSON.parse(data.demand_classificationJson);
                     var account_headOptions = JSON.parse(data.account_headJson);

                        $('.addMoreFormEdit').on('click',function(){
                            addMoreFormEdit();
                        });

                        var rowId = 1;
                        function addMoreFormEdit() {
                            var tr =
                            '<tr id="row_' + rowId + '">' +
                                '<td><input type="hidden" name="auto_id[]" class="form-control" multiple=""></td>' +
                                '<td><select class="js-example-basic-single form-control" name="account_head[]" id="account_head_' + rowId + '">' +
                                '<option value="">--Select--</option>';
                                    account_headOptions.forEach(function(option) {
                                        tr += '<option value="' + option.child_id + '">' + option.item_code + '</option>';
                                    });
                                 tr += '</select></td>' +
                                '<td><select class="js-example-basic-single form-control" name="demand_classification[]" id="demand_classification_' + rowId + '">' +
                                '<option value="">--Select--</option>';
                                    demandClassOptions.forEach(function(option) {
                                        tr += '<option value="' + option.id + '">' + option.description + '</option>';
                                    });
                                 tr += '</select></td>' +
                                '<td><select class="js-example-basic-single form-control" name="status[]" id="status_' + rowId + '">' +
                                '<option value="">--Select--</option>';
                                    demandClassOptions.forEach(function(option) {
                                        tr += '<option value="' + option.id + '">' + option.description + '</option>';
                                    });
                                 tr += '</select></td>' +
                                '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMoreEdit" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
                            '<tr>';

                            $('#addMoreEdit').append(tr);
                            $('#account_head_' + rowId + ', #demand_classification_' + rowId + ', #status_' + rowId).select2();   // Reinitialize Select2 for the new row
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
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('taxes.update', ":model_id") }}";

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
                                window.location.href = '{{ route('taxes.index') }}';
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
            title: "Are you sure to delete this tax?",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('taxes.destroy', ":model_id") }}";

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
         '<td><select class="js-example-basic-single form-control" name="account_head[]"  id="account_head_' + rowId + '" ><option value="">--Select--</option>@foreach ($data as $value)<option value="{{ $value['child_id'] }}">{{ $value['item_code'] }}</option>@endforeach</select></td>' +
         '<td><select class="js-example-basic-single form-control" name="demand_classification[]" id="demand_classification_' + rowId + '"><option value="">--Select--</option> @foreach ($demand_classifications as $demand_classification)<option value="{{ $demand_classification->id }}">{{ $demand_classification->description }}</option>@endforeach</select></td>' +
         '<td><select class="js-example-basic-single form-control" name="status[]" id="status_' + rowId + '"><option value="">--Select--</option><option value="1">Active</option></select></td>' +
         '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
         '<tr>';

      $('#addMore').append(tr);
      $('#account_head_' + rowId + ', #demand_classification_' + rowId + ', #status_' + rowId).select2();

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

