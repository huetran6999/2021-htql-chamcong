<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class working_hour_log extends Model
{
    use HasFactory;
    protected $table = 'working_hour_log';
    protected $fillable = [
        'u_id',
        'am_in',
        'am_out',
        'pm_in',
        'pm_out',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
