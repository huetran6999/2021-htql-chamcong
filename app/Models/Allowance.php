<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;
    protected $table = 'allowance';

    public function position(){
        return $this->hasOne(Position::class,'p_id','id');
    }
    public function tbl_phongban(){
        return $this->hasManyThrough(Department::class, Position::class,'id','p_id','d_id');
    }

    public function contract(){
        return $this->belongsTo(Work_contract::class);
    }
}
