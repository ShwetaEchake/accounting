<?php

namespace App\Models;

use App\Models\FunctionMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundMasterChild extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'fund_master_id',
        'fund_level',
        'fund_code',
        'fund_description',
        'fund_parent_level',
        'parent_code',
        'composite_code',
        'status',
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

    public function fund_master_parent()
    {
        return $this->belongsTo(FundMaster::class);
    }
}
