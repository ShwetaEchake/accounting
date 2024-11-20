<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldMaster extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'field_level',
        'field_code',
        'field_description',
        'final_code',
    ];

    public function field_master_child()
    {
        return $this->hasMany(FieldMasterChild::class);
    }

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


}
