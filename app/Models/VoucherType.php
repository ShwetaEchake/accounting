<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class VoucherType extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $table ="voucher_type";

    protected $fillable = ['description','regional','value','other_value','default'];

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
