<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartAccount extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'component_id',
        'number_of_level',
        'level_one_description',
        'digit_of_level_one',
        'level_two_description',
        'digit_of_level_two',
        'default_flag',
    ];

    public function component_name()
    {
        return $this->belongsTo(ComponentName::class,'component_id')->withDefault('');
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
