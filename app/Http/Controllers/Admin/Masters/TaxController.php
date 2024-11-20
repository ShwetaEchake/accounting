<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AccountIntegration, ApplicableAt, CalculationMethod, DemandClassification, Department, Tax,Service, TaxCategory, TaxGroup, TaxMaster};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Masters\{StoreTaxRequest,UpdateTaxRequest};
use Illuminate\Support\Facades\Http;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = Tax::latest()->get();
        $services = Service::latest()->get();
        $departments = Department::latest()->get();
        $tax_masters = TaxMaster::latest()->get();
        $tax_groups = TaxGroup::latest()->get();
        $tax_categories = TaxCategory::latest()->get();
        $calculation_methods = CalculationMethod::latest()->get();
        $demand_classifications = DemandClassification::latest()->get();
        $applicable_at = ApplicableAt::latest()->get();

        $response = Http::timeout(60)->get('https://bcr.ulberp.com/api/data');
        $data = $response->json();

        return view('admin.masters.taxes')->with([
          'departments'=> $departments,
          'taxes'=> $taxes,'services'=> $services,
          'tax_masters'=> $tax_masters,
          'tax_groups'=> $tax_groups,
          'tax_categories'=> $tax_categories,
          'calculation_methods'=> $calculation_methods,
          'demand_classifications'=>$demand_classifications,
          'applicable_at'=>$applicable_at,
          'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretaxRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $selectedOptions = $request->input('print_on', []);
            $input['print_on'] = implode(',', $selectedOptions);
            $data = Tax::create( Arr::only( $input, Tax::getFillables() ) );

            foreach($request->account_head as $key => $account_head){
                $createData = new AccountIntegration([
                    'account_head' => $request->account_head[$key],
                    'demand_classification' => $request->demand_classification[$key],
                    'status' => $request->status[$key],
                ]);
                $data->accountIntegration()->save($createData);
            }

            DB::commit();
            return response()->json(['success'=> 'Tax created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Tax');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        $taxmasters = TaxMaster::latest()->get();
        $departments = Department::latest()->get();
        $calculation_methods = CalculationMethod::latest()->get();
        $tax_groups = TaxGroup::latest()->get();
        $services = Service::latest()->get();
        $applicable_at = ApplicableAt::latest()->get();
        $tax_category = TaxCategory::latest()->get();


        $response = Http::timeout(60)->get('https://bcr.ulberp.com/api/data');
        $account_heads = $response->json();
        $demand_classifications = DemandClassification::latest()->get();
        $account_integartion = $tax->accountIntegration;


        if ($tax)
        {
            $taxmastersHtml = '<span>
                <option value="">--Select--</option>';
                foreach($taxmasters as $taxmaster):
                    $is_select = $taxmaster->id == $tax->tax_name ? "selected" : "";
                    $taxmastersHtml .= '<option value="'.$taxmaster->id.'" '.$is_select.'>'.$taxmaster->tax_name.'</option>';
                endforeach;
            $taxmastersHtml .= '</span>';

            $departmentsHtml = '<span>
                <option value="">--Select--</option>';
                foreach($departments as $department):
                    $is_select = $department->id == $tax->department ? "selected" : "";
                    $departmentsHtml .= '<option value="'.$department->id.'" '.$is_select.'>'.$department->department_name.'</option>';
                endforeach;
            $departmentsHtml .= '</span>';

            $calculation_methodsHtml = '<span>
                <option value="">--Select--</option>';
                foreach($calculation_methods as $calculation_method):
                    $is_select = $calculation_method->id == $tax->calculation_method ? "selected" : "";
                    $calculation_methodsHtml .= '<option value="'.$calculation_method->id.'" '.$is_select.'>'.$calculation_method->description.'</option>';
                endforeach;
            $calculation_methodsHtml .= '</span>';

            $tax_groupsHtml = '<span>
                <option value="">--Select--</option>';
                foreach($tax_groups as $tax_group):
                    $is_select = $tax_group->id == $tax->tax_group ? "selected" : "";
                    $tax_groupsHtml .= '<option value="'.$tax_group->id.'" '.$is_select.'>'.$tax_group->description.'</option>';
                endforeach;
            $tax_groupsHtml .= '</span>';

            $servicesHtml = '<span>
                <option value="">--Select--</option>';
                foreach($services as $service):
                    $is_select = $service->id == $tax->services ? "selected" : "";
                    $servicesHtml .= '<option value="'.$service->id.'" '.$is_select.'>'.$service->name.'</option>';
                endforeach;
            $servicesHtml .= '</span>';

            $applicable_atHtml = '<span>
                <option value="">--Select--</option>';
                foreach($applicable_at as $applicable):
                    $is_select = $applicable->id == $tax->applicable_at ? "selected" : "";
                    $applicable_atHtml .= '<option value="'.$applicable->id.'" '.$is_select.'>'.$applicable->description.'</option>';
                endforeach;
            $applicable_atHtml .= '</span>';

            $tax_categoryHtml = '<span>
                <option value="">--Select--</option>';
                foreach($tax_category as $category):
                    $is_select = $category->id == $tax->tax_category ? "selected" : "";
                    $tax_categoryHtml .= '<option value="'.$category->id.'" '.$is_select.'>'.$category->description.'</option>';
                endforeach;
            $tax_categoryHtml .= '</span>';


            //--- data selected ---
            $tableRows = '';
            foreach ($account_integartion as $index=> $rowData):
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="account_head[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                    foreach($account_heads as $account_head):
                        $is_select = $account_head['child_id'] == $rowData->account_head ? "selected" : "";
                        $tableRows .= '<option value="'.$account_head['child_id'].'" '.$is_select.'>'.$account_head['item_code'].'</option>';
                    endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="demand_classification[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                    foreach($demand_classifications as $demand_classification):
                        $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                        $tableRows .= '<option value="'.$demand_classification->id.'" '.$is_select.'>'.$demand_classification->description.'</option>';
                    endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="status[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                    foreach($demand_classifications as $demand_classification):
                        $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                        $tableRows .= '<option value="'.$demand_classification->id.'" '.$is_select.'>'.$demand_classification->description.'</option>';
                    endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td style=""><a href="javascip:" data-id="'.$rowData->id.'" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;
            //--- data selected ---


            $account_headJson = json_encode($account_heads);
            $demand_classificationJson = json_encode($demand_classifications);

            $response = [
                'result' => 1,
                'tax' => $tax,
                'taxmastersHtml' => $taxmastersHtml,
                'departmentsHtml' => $departmentsHtml,
                'calculation_methodsHtml' => $calculation_methodsHtml,
                'tax_groupsHtml' => $tax_groupsHtml,
                'servicesHtml' => $servicesHtml,
                'applicable_atHtml' => $applicable_atHtml,
                'tax_categoryHtml' => $tax_categoryHtml,
                'tableRows' =>$tableRows,
                'account_headJson' => $account_headJson,
                'demand_classificationJson' => $demand_classificationJson,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $selectedOptions = $request->input('print_on', []);
            $input['print_on'] = implode(',', $selectedOptions);
            $tax->update( Arr::only( $input, Tax::getFillables() ) );

            foreach ($request->demand_classification as $key => $demand_classification) {
                $auto_id = $request->auto_id[$key] ?? null;
                $tax->accountIntegration()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'account_head' => $request->account_head[$key],
                        'demand_classification' => $request->demand_classification[$key],
                        'status' => $request->status[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success'=> 'Tax updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Tax');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        try
        {
            DB::beginTransaction();
            $tax->accountIntegration()->delete();
            $tax->delete();
            DB::commit();
            return response()->json(['success'=> 'Tax deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Tax');
        }
    }
}
