<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class Service extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['department','child_department','name','regional','short_code','status',
                           'checklist_verification_applicable','challan_validity','checklist_approval_applicable',
                           'approval','rejection','printing_responsibility','remark',
                           'fee_schedule','select_applicable_option','bpm_process','sla','units'
                          ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subDay());
    }



    public static function booted()
    {
        static::created(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'created_by'=> Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }

}
