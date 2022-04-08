<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    public $timestamps = false;
    protected $table = 'enterprise';
    protected $fillable = [
        'e_name',
        'e_address',
        'e_phone'
    ];

    public function department()
    {
        return $this->hasMany(Department::class);
    }
}
