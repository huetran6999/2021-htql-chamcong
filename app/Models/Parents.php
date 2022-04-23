<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'parents';
    protected $fillable = [
        're_name',
        're_gender',
        're_ship',
        're_phone',
        're_address',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'u_id', 'id');
    }
}
