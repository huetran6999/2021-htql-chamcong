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
        'd_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function salary()
    {
        return $this->belongsTo(salary::class, 's_id', 'id');
    }

    public function dep_pos()
    {
        return $this->belongsTo(Department::class, 'd_id', 'id');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function allowance()
    {
        return $this->hasMany(Allowance::class);
    }
}
