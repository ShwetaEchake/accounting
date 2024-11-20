<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Tax extends BaseModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['tax_name', 'department','applicable_at','calculation_method',
                           'parent_tax_code','tax_group', 'tax_category','tax_sub_category',
                           'services','print_on','collection_sequence','display_sequence',
                           'data_in_left_side_box','data_in_right_side_box'
                          ];

    public function taxMaster()
    {
        return $this->belongsTo(TaxMaster::class,'tax_name','id')->withDefault();
    }

    public function taxGroup()
    {
        return $this->belongsTo(TaxGroup::class,'tax_group','id')->withDefault();
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'services')->withDefault();
    }

    public function calculationMethod()
    {
        return $this->belongsTo(CalculationMethod::class,'calculation_method')->withDefault();
    }

    public function accountIntegration()
    {
        return $this->hasMany(AccountIntegration::class,'tax_id');
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
