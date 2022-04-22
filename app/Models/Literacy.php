<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literacy extends Model
{
    use HasFactory;
    protected $table = 'literacy';
    protected $fillable = [
        'l_name',
        'l_major',
        'l_grading',
        'l_graduation_school',
        'l_graduation_year',
        'l_ohter_major',
        'u_id',
        'l_note',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
