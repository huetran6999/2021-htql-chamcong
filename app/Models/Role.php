<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = ['r_name'];
    protected $table = 'role';

    public function position(){
        return $this->belongsToMany(Position::class);
    }
}
