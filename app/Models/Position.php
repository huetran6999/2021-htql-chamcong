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
        's_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
}
