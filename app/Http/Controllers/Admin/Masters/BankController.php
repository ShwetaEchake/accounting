<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Masters\{StoreBankRequest,UpdateBankRequest};
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BanksImport;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::latest()->get();
        return view('admin.masters.banks')->with(['banks'=> $banks]);
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
    public function store(StoreBankRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Bank::create( Arr::only( $input, Bank::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Bank created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Bank');
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
    public function edit(Bank $bank)
    {
        if ($bank)
        {
            $response = [
                'result' => 1,
                'bank' => $bank,
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
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $bank->update( Arr::only( $input, Bank::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Bank updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Bank');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        try
        {
            DB::beginTransaction();
            $bank->delete();
            DB::commit();
            return response()->json(['success'=> 'Bank deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Bank');
        }
    }

    public function importBanks(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new BanksImport, $request->file('file'));

        return back()->with('success', 'Banks imported successfully.');
    }
}
