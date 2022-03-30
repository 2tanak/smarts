<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Entity\Model\SysUserType\SysUserType;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'type_id', 'name', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function getTypeNameAttribute(){
        if ($this->type_id == 1)
            return 'Администратор';
    }

    static function getAdminManager(){
        return User::where('id', 2)->first();
    }

    function relStudentData(){
        return $this->hasOne('Modules\Entity\Model\StudentData\StudentData', 'user_id');
    }


    function isUser(){
        return $this->type_id == SysUserType::USER;
    }
    
 
}
