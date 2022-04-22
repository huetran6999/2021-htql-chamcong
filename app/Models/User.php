<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'user';
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        't_id',
        'l_id',
        'fl_id',
        'd_id',
        'p_id',
        's_id',
        'u_name',
        'u_gender',
        'u_dob',
        'u_pob',
        'u_IDcode',
        'u_IDcodedate',
        'u_IDcodeplace',
        'u_household',
        'u_address',
        'u_phone',
        'u_email',
        'u_nationality',
        'u_ethnic',
        'u_religion',
        'u_checkindate',
        'u_status',
        'u_avatar',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRole($roles){
        return null != $this->role()->whereIn('r_name', $roles) ->first();
    }
    public function hasRole($role){
        return null != $this->role()->whereIn('r_name', $role) ->first();
    }

    public function attendanceReports()
    {
        return $this->hasMany(AttendanceReport::class);
    }

    public function timeKeepings()
    {
        return $this->hasMany(TimeKeeping::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'p_id', 'id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 's_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'d_id', 'id');
    }

    public function literacy()
    {
        return $this->belongsTo(Literacy::class, 'u_id', 'id');
    }

    public function parents()
    {
        return $this->hasOne(Parents::class);
    }
}
