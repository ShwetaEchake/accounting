<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Service,Unit,Department};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Masters\{StoreServiceRequest,UpdateServiceRequest};

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Service::latest()->get();
        $departments = Department::latest()->get();
        $units = Unit::latest()->get();

        return view('admin.masters.services')->with([
            'services'=> $services,
            'departments'=> $departments,
            'units'=> $units,
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
    public function store(StoreServiceRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $selectedOptions = $request->input('select_applicable_option', []);
            $input['select_applicable_option'] = implode(',', $selectedOptions);
            Service::create( Arr::only( $input, Service::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Service created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Service');
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
    public function edit(Service $service)
    {
        if ($service)
        {
            $response = [
                'result' => 1,
                'service' => $service,
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
    public function update(UpdateServiceRequest $request, Service $service)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $selectedOptions = $request->input('select_applicable_option', []);
            $input['select_applicable_option'] = implode(',', $selectedOptions);
            $service->update( Arr::only( $input, Service::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Service updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Service');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try
        {
            DB::beginTransaction();
            $service->delete();
            DB::commit();
            return response()->json(['success'=> 'Service deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Service');
        }
    }


    public function search(Request $request)
    {
        $departmentId = $request->input('department_id');
        $serviceId = $request->input('service_id');

        $query = Service::query();

        if ($departmentId) {
            $query->where('department', $departmentId);
        }

        if ($serviceId) {
            $query->where('id', $serviceId);
        }

        $services = $query->get();

        return response()->json($services);
    }

}
