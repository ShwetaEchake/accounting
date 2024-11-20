<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Workflow extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['department_id','service_id','workflow_mode_id','from_amount','to_amount','location_type'];

    protected $table ="workflow";

    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
    public function workflow_mode()
    {
        return $this->belongsTo(WorkflowMode::class)->withDefault();
    }

    public function workflowStep()
    {
        return $this->hasMany(WorkflowStep::class);
    }

    public static function booted()
    {
        static::created(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'created_by'=> Auth::user()->id,
                    'created_ip'=> Request::ip(),
                ]);
            }
        });
        static::updated(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'updated_by'=> Auth::user()->id,
                    'updated_ip'=> Request::ip(),
                ]);
            }
        });
        static::deleting(function (self $modelObj)
        {
            if(Auth::check())
            {
                self::where('id', $modelObj->id)->update([
                    'deleted_by'=> Auth::user()->id,
                    'deleted_ip'=> Request::ip(),
                ]);
            }
        });
    }
}
