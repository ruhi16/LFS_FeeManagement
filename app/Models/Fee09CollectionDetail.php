<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee09CollectionDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }

    public function financialYear(){
        return $this->belongsTo(\App\Models\Fee00FinancialYear::class, 'financial_year_id', 'id');
    }

    public function feeCollection(){
        return $this->belongsTo(\App\Models\Fee08Collection::class, 'fee_collection_id', 'id');
    }

    

    public function feeCategory(){
        return $this->belongsTo(\App\Models\Fee05Catelog::class, 'fee_category_id', 'id');
    }

    public function feeParticular(){
        return $this->belongsTo(\App\Models\Fee02Particular::class, 'fee_particular_id', 'id');
    }


    

    public function feeStructure(){
        return $this->belongsTo(\App\Models\Fee06Structure::class, 'fee_structure_id', 'id');
    }

    public function feeStructureDetail(){
        return $this->belongsTo(\App\Models\Fee07StructureDetail::class, 'fee_structure_detail_id', 'id');
    }




}
