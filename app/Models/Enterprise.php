<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{

    protected $table='enterprise';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'e_name',
        'e_address',
        'e_phone'
    ];

    public function department(){
        return $this->hasMany('App\Models\Department', 'id', 'id');
    }
}
