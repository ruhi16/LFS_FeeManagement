<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee00FinancialYear extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true);
    }

    public function categories(){
        return $this->hasMany(\App\Models\Fee01Category::class, 'financial_year_id', 'id');

    }

    public function particulars(){
        return $this->hasMany(\App\Models\Fee02Particular::class, 'financial_year_id', 'id');
    }

    public function mandates(){
        return $this->hasMany(\App\Models\Fee03Mandate::class, 'financial_year_id', 'id');
    }

    public function structures(){
        return $this->hasMany(\App\Models\Fee06Structure::class, 'financial_year_id', 'id');
    }

    public function getActiveParticularsAttribute(){
        return $this->particulars()->currentlyActive()->get();
    }

    public function getActiveCategoriesAttribute(){
        return $this->categories()->currentlyActive()->get();
    }

    public function getActiveMandatesAttribute(){
        return $this->mandates()->currentlyActive()->get();
    }

    public function getActiveStructuresAttribute(){
        return $this->structures()->currentlyActive()->get();
    }

    public function getActiveCategoriesWithParticularsAttribute(){
        return $this->categories()->currentlyActive()->with('structureParticulars')->get();
    }



}
