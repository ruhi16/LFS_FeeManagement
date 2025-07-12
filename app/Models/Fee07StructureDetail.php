<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee07StructureDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }


    public function financialYear(){
        return $this->belongsTo(\App\Models\Fee00FinancialYear::class, 'financial_year_id', 'id');
    }

    public function feeSturecture(){
        return $this->belongsTo(\App\Models\Fee06Structure::class, 'fee_structure_id', 'id');
        
    }


    public function feeCategory(){
        return $this->belongsTo(\App\Models\Fee01Category::class, 'fee_category_id', 'id');
    }


    public function feeParticular(){
        return $this->belongsTo(\App\Models\Fee02Particular::class, 'fee_particular_id', 'id');
    }




}
