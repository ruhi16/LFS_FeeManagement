<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee01Category extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }

    public function financialYear(){
        return $this->belongsTo(\App\Models\Fee00FinancialYear::class, 'financial_year_id', 'id');
    }


    public function structureCategories(){
        return $this->hasMany(\App\Models\Fee06Structure::class, 'fee_category_id', 'id');
    }


}
