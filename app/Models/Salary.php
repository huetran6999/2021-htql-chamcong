<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salary';
    protected $fillable = [
        'level',
        'coefficient_salary',
    ];

    public function position()
    {
        return $this->hasMany(position::class);
    }
}
