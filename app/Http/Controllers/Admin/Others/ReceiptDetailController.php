<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use App\Models\{Master, ReceiptDetail, ReceiptHead, ReceiptMode};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Others\{StoreReceiptDetailRequest, UpdateReceiptDetailRequest};
use Illuminate\Support\Facades\DB;

class ReceiptDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['receipt_detail'] = ReceiptDetail::latest()->get();
        $data['masters'] = Master::latest()->get();
        return view('admin.others.receipt-details', $data);
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
    public function store(StoreReceiptDetailRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $data = ReceiptDetail::create(Arr::only($input, ReceiptDetail::getFillables()));

            foreach ($request->receipt_head as $key => $receipt_head) {
                $createData = new ReceiptHead([
                    'receipt_head' => $request->receipt_head[$key],
                    'receipt_amount' => $request->receipt_amount[$key],
                ]);
                $data->receiptHead()->save($createData);
            }

            foreach ($request->mode as $key => $mode) {
                $createData = new ReceiptMode([
                    'mode' => $request->mode[$key],
                    'bank_name' => $request->bank_name[$key],
                    'instrument_no' => $request->instrument_no[$key],
                    'instrument_date' => $request->instrument_date[$key],
                    'total_amount' => $request->total_amount[$key],
                ]);
                $data->receiptMode()->save($createData);
            }

            DB::commit();
            return response()->json(['success' => 'Receipt Detail Entry created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Receipt Detail');
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
    public function edit(ReceiptDetail $receipt_detail)
    {
        $masters = Master::latest()->get();
        $receipt_head = $receipt_detail->receiptHead;


        if ($receipt_detail) {

            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($masters as $master):
                $is_select = $master->id == $master->id ? "selected" : "";
                $mastersHtml .= '<option value="' . $master->id . '" ' . $is_select . '>' . $master->description . '</option>';
            endforeach;
            $mastersHtml .= '</span>';


            //--- data selected ---
            $tableRows = '';
            foreach ($receipt_head as $index => $rowData):
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="receipt_head[]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                foreach ($masters as $master):
                    $is_select = $master->id == $rowData->receipt_head ? "selected" : "";
                    $tableRows .= '<option value="' . $master->id . '" ' . $is_select . '>' . $master->description . '</option>';
                endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td><input type="text" name="receipt_amount[]" value="' . $rowData->receipt_amount . '" class="form-control" ></td>';
                $tableRows .= '<td style=""><a href="javascip:" data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;
            //--- data selected ---

            $response = [
                'result' => 1,
                'receipt_detail' => $receipt_detail,
                'mastersHtml' => $mastersHtml,
                'tableRows' => $tableRows,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceiptDetailRequest $request, ReceiptDetail $receipt_detail)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $receipt_detail->update(Arr::only($input, ReceiptDetail::getFillables()));

            foreach ($request->receipt_head as $key => $receipt_head) {
                $auto_id = $request->auto_id[$key] ?? null;
                $receipt_detail->receiptHead()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'receipt_head' => $request->receipt_head[$key],
                        'receipt_amount' => $request->receipt_amount[$key],
                    ]
                );
            }
            foreach ($request->mode as $key => $mode) {
                $auto_id = $request->auto_id[$key] ?? null;
                $receipt_detail->receiptMode()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'mode' => $request->mode[$key],
                        'bank_name' => $request->bank_name[$key],
                        'instrument_no' => $request->instrument_no[$key],
                        'instrument_date' => $request->instrument_date[$key],
                        'total_amount' => $request->total_amount[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success' => 'ReceiptDetail updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'ReceiptDetail');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
