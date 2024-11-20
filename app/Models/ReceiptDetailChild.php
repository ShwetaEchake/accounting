<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ReceiptDetailChild extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'receipt_number',
        'received_from',
        'receipt_date',
        'receipt_amount',
        'narration',
    ];

    protected $table = "receipt_detail_child";

    public static function booted()
    {
        static::created(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'created_by' => Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'updated_by' => Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'deleted_by' => Auth::user()->id,
                ]);
            }
        });
    }
}
