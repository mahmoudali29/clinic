<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;
use App\Model\File;


class User extends Authenticatable
{
    //use Notifiable;
    protected $guard = "user";
    protected $table = 'tblusers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//override to original one from illuminate/auth/passwords/canreset
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    public function file()
    {
        return $this->hasOne(File::class,'fkTableID')->where('fldType',File::TYPE_ADMIN);
    }
}
