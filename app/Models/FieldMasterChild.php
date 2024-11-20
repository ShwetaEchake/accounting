<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\FieldMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldMasterChild extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'field_master_id',
        'field_level',
        'field_code',
        'field_description',
        'field_parent_level',
        'parent_code',
        'composite_code',
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

    public function field_master_parent()
    {
        return $this->belongsTo(FieldMaster::class);
    }
}
