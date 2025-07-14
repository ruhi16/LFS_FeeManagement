<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee03Mandate extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }


    public function financialYear(){
        return $this->belongsTo(\App\Models\Fee00FinancialYear::class, 'financial_year_id', 'id');
    }


    public function myclass(){
        return $this->belongsTo(\App\Models\Myclass::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the 'fee_mandates' table
        // 'id' is the primary key in the 'myclasses' table
    }


    public function feeStructure(){
        return $this->hasOne(\App\Models\Fee06Structure::class, 'fee_mandate_id', 'id');
        // 'fee_structure_id' is the foreign key in the 'fee_mandates' table
        // 'id' is the primary key in the 'fee_structures' table
    }




    public function mandateDates(){
        return $this->hasMany(Fee04MandateDate::class, 'fee_mandate_id', 'id');
        // 'fee_mandate_id' is the foreign key in the 'fee_mandate_dates' table
        // 'id' is the primary key in the 'fee_mandates' table
    }




}
