<?php

namespace App\Http\Controllers\Admin\GrantLoansInvests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{GrantDetail, ReceiptDetailChild, PaymentDetail, RefundDetail};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\GrantLoansInvests\{StoreGrantDetailRequest, UpdateGrantDetailRequest};


class GrantDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grant_details = GrantDetail::latest()->get();
        return view('admin.grandloantsinvests.grant-details')->with(['grant_details' => $grant_details]);
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
    public function store(StoreGrantDetailRequest $request)
    {
        try {

            DB::beginTransaction();
            $input = $request->validated();
            $data = GrantDetail::create(Arr::only($input, GrantDetail::getFillables()));

            foreach ($request->receipt_number as $key => $receipt_number) {
                $createData = new ReceiptDetailChild([
                    'receipt_number' => $request->receipt_number[$key],
                    'received_from' => $request->received_from[$key],
                    'receipt_date' => $request->receipt_date[$key],
                    'receipt_amount' => $request->receipt_amount[$key],
                    'narration' => $request->narration[$key],
                ]);
                $data->receiptDetailChild()->save($createData);
            }

            foreach ($request->payment_number as $key => $payment_number) {
                $createData = new PaymentDetail([
                    'payment_number' => $request->payment_number[$key],
                    'payment_date' => $request->payment_date[$key],
                    'vendor_name' => $request->vendor_name[$key],
                    'payment_amount' => $request->payment_amount[$key],
                    'narration' => $request->narration[$key],
                ]);
                $data->paymentDetail()->save($createData);
            }

            foreach ($request->bill_number as $key => $bill_number) {
                $createData = new RefundDetail([
                    'bill_number' => $request->bill_number[$key],
                    'bill_date' => $request->bill_date[$key],
                    'vendor_name' => $request->vendor_name[$key],
                    'bill_amount' => $request->bill_amount[$key],
                    'narration' => $request->narration[$key],
                ]);
                $data->refundDetail()->save($createData);
            }

            DB::commit();
            return response()->json(['success' => 'GrantDetail created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'GrantDetail');
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
    public function edit(GrantDetail $grant_detail)
    {
        if ($grant_detail) {

            $receiptDetail = $grant_detail->receiptDetailChild;
            $paymentDetail = $grant_detail->paymentDetail;
            $refundDetail = $grant_detail->refundDetail;

            //--- data selected ---
            $tableRows = '';
            foreach ($receiptDetail as $index => $rowData):
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="receipt_number[]" value="' . $rowData->receipt_number . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="received_from[]" value="' . $rowData->received_from . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="receipt_date[]" value="' . $rowData->receipt_date . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="receipt_amount[]" value="' . $rowData->receipt_amount . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="narration[]" value="' . $rowData->narration . '" class="form-control" ></td>';
                $tableRows .= '<td style=""><a href="javascip:" data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;
            //--- data selected ---

            //--- data selected  Payment---
            $tableRows1 = '';
            foreach ($paymentDetail as $index => $rowData):
                $tableRows1 .= '<tr>';
                $tableRows1 .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';
                $tableRows1 .= '<td><input type="text" name="payment_number[]" value="' . $rowData->payment_number . '" class="form-control" ></td>';
                $tableRows1 .= '<td><input type="text" name="payment_date[]" value="' . $rowData->payment_date . '" class="form-control" ></td>';
                $tableRows1 .= '<td><input type="text" name="vendor_name[]" value="' . $rowData->vendor_name . '" class="form-control" ></td>';
                $tableRows1 .= '<td><input type="text" name="payment_amount[]" value="' . $rowData->payment_amount . '" class="form-control" ></td>';
                $tableRows1 .= '<td><input type="text" name="narration[]" value="' . $rowData->narration . '" class="form-control" ></td>';
                $tableRows1 .= '<td style=""><a href="javascip:" data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows1 .= '</tr>';
            endforeach;
            //--- data selected ---

            //--- data selected Refund ---
            $tableRows2 = '';
            foreach ($refundDetail as $index => $rowData):
                $tableRows2 .= '<tr>';
                $tableRows2 .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';
                $tableRows2 .= '<td><input type="text" name="bill_number[]" value="' . $rowData->bill_number . '" class="form-control" ></td>';
                $tableRows2 .= '<td><input type="text" name="bill_date[]" value="' . $rowData->bill_date . '" class="form-control" ></td>';
                $tableRows2 .= '<td><input type="text" name="vendor_name[]" value="' . $rowData->vendor_name . '" class="form-control" ></td>';
                $tableRows2 .= '<td><input type="text" name="bill_amount[]" value="' . $rowData->bill_amount . '" class="form-control" ></td>';
                $tableRows2 .= '<td><input type="text" name="narration[]" value="' . $rowData->narration . '" class="form-control" ></td>';
                $tableRows2 .= '<td style=""><a href="javascip:" data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows2 .= '</tr>';
            endforeach;
            //--- data selected ---


            $response = [
                'result' => 1,
                'grant_detail' => $grant_detail,
                'tableRows' => $tableRows,
                'tableRows1' => $tableRows1,
                'tableRows2' => $tableRows2,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantDetailRequest $request, GrantDetail $grant_detail)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $grant_detail->update(Arr::only($input, GrantDetail::getFillables()));

            foreach ($request->receipt_number as $key => $receipt_number) {
                $auto_id = $request->auto_id[$key] ?? null;
                $grant_detail->receiptDetailChild()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'receipt_number' => $request->receipt_number[$key],
                        'received_from' => $request->received_from[$key],
                        'receipt_date' => $request->receipt_date[$key],
                        'receipt_amount' => $request->receipt_amount[$key],
                        'narration' => $request->narration[$key],
                    ]
                );
            }

            foreach ($request->payment_number as $key => $payment_number) {
                $auto_id = $request->auto_id[$key] ?? null;
                $grant_detail->paymentDetail()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'payment_number' => $request->payment_number[$key],
                        'payment_date' => $request->payment_date[$key],
                        'vendor_name' => $request->vendor_name[$key],
                        'payment_amount' => $request->payment_amount[$key],
                        'narration' => $request->narration[$key],
                    ]
                );
            }

            foreach ($request->bill_number as $key => $bill_number) {
                $auto_id = $request->auto_id[$key] ?? null;
                $grant_detail->refundDetail()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'bill_number' => $request->bill_number[$key],
                        'bill_date' => $request->bill_date[$key],
                        'vendor_name' => $request->vendor_name[$key],
                        'bill_amount' => $request->bill_amount[$key],
                        'narration' => $request->narration[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success' => 'Grant Detail updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Grant Detail');
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
