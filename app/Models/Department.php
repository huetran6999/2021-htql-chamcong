<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'department';
    protected $fillable = [
        'd_name',
        'd_phone',
        'e_id',
    ];
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'e_id', 'id');
    }
}
