<?php

namespace App\Models;

use Carbon\Carbon;
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
        'total_time',
    ];

    public function getYears() {
        $dt = new Carbon(strtotime($this->date));
        $years = $dt->year;
        $months = $dt->month;
        $days = $dt->day;
        return $years;
    }

    public function getMonths() {
        $dt = new Carbon(strtotime($this->date));
        $years = $dt->year;
        $months = $dt->month;
        $days = $dt->day;
        return $months;
    }

    public function getDays() {
        $dt = new Carbon(strtotime($this->date));
        $years = $dt->year;
        $months = $dt->month;
        $days = $dt->day;
        return $days;
    }

    public function user_log()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
