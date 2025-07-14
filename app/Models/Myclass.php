<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeCurrentlyActive($query){
        return $query->where('is_active', true)->get();
    }

    public function studentdb(){
        return $this->hasMany(Studentdb::class, 'myclass_id', 'id');
        // 'myclass_id' is the foreign key in the 'studentdbs' tablet
        // 'id' is the primary key in the 'myclasses' table
    }

    public function studentcrs(){
        return $this->hasMany(Studentcr::class,'myclass_id','id');
        // 'myclass_id' is the foreign key in the 'studentcrs' tablet
        // 'id' is the primary key in the 'myclasses' table
    }

    public function myclass_sections(){
        return $this->hasMany(MyclassSection::class,'myclass_id','id');
        // 'myclass_id' is the foreign key in the 'myclass_sections' tablet
        // 'id' is the primary key in the 'myclasses' table
    }   


    public function feeStructures(){
        return $this->hasMany(Fee06Structure::class,'myclass_id','id');
        // 'myclass_id' is the foreign key in the 'fee_structures' tablet
        // 'id' is the primary key in the 'myclasses' table
    }

    public function mandates(){
        return $this->hasMany(Fee03Mandate::class,'myclass_id','id');
        // 'myclass_id' is the foreign key in the 'fee_mandates' tablet
        // 'id' is the primary key in the 'myclasses' table
    }


}
