<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_contract extends Model
{
    use HasFactory;
    protected $table = 'work_contract';
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class,'u_id','id');
    }

    public function allowance() {
        return $this->hasOne(Allowance::class, 'a_id', 'id');
    }
}
