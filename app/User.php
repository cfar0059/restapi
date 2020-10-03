<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * Verifies if the User is a Verified User
     * @return string
     */
    public function isVerified(){
       return $this->verified = User::VERIFIED_USER;
    }

    /**
     * Verifies if the Users is an Admin User
     * @return string
     */
    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }

    /**
     * Generates a Verification Code
     * through STR class - random Function (Generate a more truly "random" alpha-numeric string.)
     * @return string
     */
    public function generateVerficationCode(){
        return Str::random(40);
    }

}
