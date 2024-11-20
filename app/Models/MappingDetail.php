<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MappingDetail extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'account_type',
        'dr_cr',
        'mode',
        'account_head',
    ];


    public static function booted()
    {
        static::created(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'created_by' => Auth::user()->id,
                    'created_ip' => Request::ip(),
                ]);
            }
        });
        static::updated(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'updated_by' => Auth::user()->id,
                    'updated_ip' => Request::ip(),
                ]);
            }
        });
        static::deleting(function (self $modelObj) {
            if (Auth::check()) {
                self::where('id', $modelObj->id)->update([
                    'deleted_by' => Auth::user()->id,
                    'deleted_ip' => Request::ip(),
                ]);
            }
        });
    }

    public function fund_master_child()
    {
        return $this->hasMany(FundMasterChild::class);
    }
}
