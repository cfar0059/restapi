<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';


    protected $date = ['deleted_at'];
    protected $table = 'users';

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
     * Mutator for name
     * Sets the Name Attribute to $name
     * @param $name
     */
    public function setNameAttribute($name){
        $this->attributes['name'] = strtolower($name);
    }


    /**
     * Transform each word within the name to use a capital letter
     * @param $name
     * @return string
     */
    public function getNameAttribute($name){
        return ucwords($name);
    }

    /**
     * Mutator for email
     * Sets the Name Attribute to $email
     * @param $email
     */
    public function setEmailAttribute($email){
        $this->attributes['email'] = strtolower($email);
    }

    /**
     * Verifies if the User is a Verified User
     * @return string
     */
    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * Verifies if the Users is an Admin User
     * @return string
     */
    public function isAdmin(){
        return $this->admin == User::ADMIN_USER;
    }

    /**
     * Generates a Verification Code
     * through STR class - random Function (Generate a more truly "random" alpha-numeric string.)
     * @return string
     */
    public static function generateVerificationCode(){
        return Str::random(40);
    }

}
