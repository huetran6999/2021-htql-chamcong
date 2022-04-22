<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foreign_Language extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'foreign_language';
    protected $fillable = [
        'id',
        'f_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
