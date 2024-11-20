<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrantDetail extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'grant_type',
        'grant_name',
        'grant_date',
        'nature_of_the_grant',
        'grant_from_period',
        'grant_to_period',
        'sanction_number',
        'sanction_amount',
        'sanction_date',
        'sanctioning_authority',
        'received_amount',
        'fund',
    ];


    public function receiptDetailChild()
    {
        return $this->hasMany(ReceiptDetailChild::class);
    }

    public function paymentDetail()
    {
        return $this->hasMany(PaymentDetail::class);
    }

    public function refundDetail()
    {
        return $this->hasMany(RefundDetail::class);
    }


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
