<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    use HasFactory;

    protected $table = 'time_keeping';
    protected $fillable = [
        'u_id',
        'total',
        'month',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
