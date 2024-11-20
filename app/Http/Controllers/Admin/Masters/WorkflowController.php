<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Workflow, Department , Event, Organization, Service, Unit, User, WorkflowMode, WorkflowStep};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Masters\{StoreWorkflowRequest,UpdateWorkflowRequest};


class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workflow = Workflow::latest()->get();
        $departments = Department::latest()->get();
        $services = Service::latest()->get();
        $work_flow_mode = WorkflowMode::latest()->get();
        $units = Unit::latest()->get();
        $users = User::latest()->get();
        $events = Event::latest()->get();
        $organizations = Organization::latest()->get();

        return view('admin.masters.workflow')->with([
            'workflow'=> $workflow,
            'departments'=> $departments,
            'services'=> $services,
            'work_flow_mode'=> $work_flow_mode,
            'units'=> $units,
            'users'=> $users,
            'events'=> $events,
            'organizations'=> $organizations,
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
    public function store(StoreWorkflowRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $data = Workflow::create( Arr::only( $input, Workflow::getFillables() ) );

            foreach($request->event_id as $key => $event_id){
                $createData = new WorkflowStep([
                    'event_id' => $request->event_id[$key],
                    'organization_id' => $request->organization_id[$key],
                    'department_id' => $request->department_ids[$key],
                    'role_id' => $request->role_id[$key],
                    'details' => $request->details[$key],
                    'sla' => $request->sla[$key],
                    'unit_id' => $request->unit_id[$key],
                    'no_of_approvers' => $request->no_of_approvers[$key],
                ]);
                $data->workflowStep()->save($createData);
            }

            DB::commit();
            return response()->json(['success'=> 'Workflow created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Workflow');
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
    public function edit(Workflow $workflow)
    {
        $departments = Department::latest()->get();
        $services = Service::latest()->get();
        $workflow_modes = WorkflowMode::latest()->get();
        $events = Event::latest()->get();
        $organizations = Organization::latest()->get();
        $units = Unit::latest()->get();
        $users = User::latest()->get();
        $workflow_steps = $workflow->workflowStep;


        if ($workflow)
        {
            $departmentsHtml = '<span>
                <option value="">--Select--</option>';
                foreach($departments as $department):
                    $is_select = $department->id == $workflow->department_id ? "selected" : "";
                    $departmentsHtml .= '<option value="'.$department->id.'" '.$is_select.'>'.$department->department_name.'</option>';
                endforeach;
            $departmentsHtml .= '</span>';

            $servicesHtml = '<span>
                <option value="">--Select--</option>';
                foreach($services as $service):
                    $is_select = $service->id == $workflow->service_id ? "selected" : "";
                    $servicesHtml .= '<option value="'.$service->id.'" '.$is_select.'>'.$service->name.'</option>';
                endforeach;
            $servicesHtml .= '</span>';

            $workflow_modeHtml = '<span>
                <option value="">--Select--</option>';
                foreach($workflow_modes as $workflow_mode):
                    $is_select = $workflow_mode->id == $workflow->workflow_mode_id ? "selected" : "";
                    $workflow_modeHtml .= '<option value="'.$workflow_mode->id.'" '.$is_select.'>'.$workflow_mode->description.'</option>';
                endforeach;
            $workflow_modeHtml .= '</span>';


             //--- data selected ---
             $tableRows = '';
             foreach ($workflow_steps as $index=> $rowData):
                 $tableRows .= '<tr>';
                 $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';

                 $tableRows .= '<td>';
                 $tableRows .= '<select name="event_id[]" class="js-example-basic-single form-control">';
                 $tableRows .='<option value="">--Select--</option>';
                     foreach($events as $event):
                         $is_select = $event->id == $rowData->event_id ? "selected" : "";
                         $tableRows .= '<option value="'.$event->id.'" '.$is_select.'>'.$event->description.'</option>';
                     endforeach;
                 $tableRows .= '</select>';
                 $tableRows .= '</td>';

                 $tableRows .= '<td>';
                 $tableRows .= '<select name="organization_id[]" class="js-example-basic-single form-control">';
                 $tableRows .='<option value="">--Select--</option>';
                     foreach($organizations as $organization):
                         $is_select = $organization->id == $rowData->organization_id ? "selected" : "";
                         $tableRows .= '<option value="'.$organization->id.'" '.$is_select.'>'.$organization->description.'</option>';
                     endforeach;
                 $tableRows .= '</select>';
                 $tableRows .= '</td>';

                 $tableRows .= '<td>';
                 $tableRows .= '<select name="department_ids[]" class="js-example-basic-single form-control">';
                 $tableRows .='<option value="">--Select--</option>';
                    foreach($departments as $department):
                        $is_select = $department->id == $rowData->department_id ? "selected" : "";
                        $tableRows .= '<option value="'.$department->id.'" '.$is_select.'>'.$department->department_name.'</option>';
                    endforeach;
                 $tableRows .= '</select>';
                 $tableRows .= '</td>';

                 $tableRows .= '<td>';
                 $tableRows .= '<select name="role_id[]" class="js-example-basic-single form-control">';
                 $tableRows .='<option value="">--Select--</option>';
                    foreach($users as $user):
                        $is_select = $user->id == $rowData->role_id ? "selected" : "";
                        $tableRows .= '<option value="'.$user->id.'" '.$is_select.'>'.$user->name.'</option>';
                    endforeach;
                 $tableRows .= '</select>';
                 $tableRows .= '</td>';

                 $tableRows .= '<td><input type="text" name="details[]" value="' . $rowData->details . '" class="form-control" ></td>';
                 $tableRows .= '<td><input type="text" name="sla[]" value="' . $rowData->sla . '" class="form-control" ></td>';

                 $tableRows .= '<td>';
                 $tableRows .= '<select name="unit_id[]" class="js-example-basic-single form-control">';
                 $tableRows .='<option value="">--Select--</option>';
                    foreach($units as $unit):
                        $is_select = $unit->id == $rowData->unit_id ? "selected" : "";
                        $tableRows .= '<option value="'.$unit->id.'" '.$is_select.'>'.$unit->description.'</option>';
                    endforeach;
                 $tableRows .= '</select>';
                 $tableRows .= '</td>';

                 $tableRows .= '<td><input type="text" name="no_of_approvers[]" value="' . $rowData->no_of_approvers . '" class="form-control" ></td>';

                 $tableRows .= '<td style=""><a href="javascip:" data-id="'.$rowData->id.'" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                 $tableRows .= '</tr>';
             endforeach;
             //--- data selected ---

            $response = [
                'result' => 1,
                'workflow' => $workflow,
                'departmentsHtml' => $departmentsHtml,
                'servicesHtml' => $servicesHtml,
                'workflow_modeHtml' => $workflow_modeHtml,
                'tableRows' => $tableRows,
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
    public function update(UpdateWorkflowRequest $request, Workflow $workflow)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $workflow->update( Arr::only( $input, Workflow::getFillables() ) );

            foreach ($request->event_id as $key => $event_id) {
                $auto_id = $request->auto_id[$key] ?? null;
                $workflow->workflowStep()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'event_id' => $request->event_id[$key],
                        'organization_id' => $request->organization_id[$key],
                        'department_id' => $request->department_ids[$key],
                        'role_id' => $request->role_id[$key],
                        'unit_id' => $request->unit_id[$key],
                        'sla' => $request->sla[$key],
                        'no_of_approvers' => $request->no_of_approvers[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success'=> 'Workflow updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Workflow');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workflow $workflow)
    {
        try
        {
            DB::beginTransaction();
            $workflow->workflowStep()->delete();
            $workflow->delete();
            DB::commit();
            return response()->json(['success'=> 'Workflow deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Workflow');
        }
    }
}
