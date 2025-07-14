<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee06Structure extends Model{

    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }


    public function structureDetails(){
        return $this->hasMany(Fee07StructureDetail::class, 'fee_structure_id', 'id');
        // 'fee_structure_id' is the foreign key in the 'fee_structure_details' table
        // 'id' is the primary key in the 'fee_structures' table
    }

    public function myclass(){
        return $this->belongsTo(\App\Models\Myclass::class, 'myclass_id', 'id');
    }

    public function feeMandate(){
        return $this->belongsTo(\App\Models\Fee03Mandate::class, 'fee_mandate_id', 'id');
        // 'fee_mandate_id' is the foreign key in the 'fee_structures' table
        // 'id' is the primary key in the 'fee_mandates' table
    }


    public function financialYear(){
        return $this->belongsTo(\App\Models\Fee00FinancialYear::class, 'financial_year_id', 'id');
    }


    public function category(){
        return $this->belongsTo(\App\Models\Fee01Category::class, 'fee_category_id', 'id');
    }

    public function particular(){
        return $this->belongsTo(\App\Models\Fee02Particular::class, 'fee_particular_id', 'id');
    }

}
