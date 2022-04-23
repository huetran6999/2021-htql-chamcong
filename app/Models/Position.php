<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $fillable = [
        'p_name',
        'basic_salary',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
}
