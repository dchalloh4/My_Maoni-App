<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Lecturer extends Model implements Authenticatable
// {
//     use HasFactory;


//     protected $fillable = [
    //         'name',
    //         'email',
    //         'password',
    //         'Contact'
//     ];

//     protected $hidden = [
    //         'password',
//         'remember_token',
//     ];

//     /**
//      * The attributes that should be cast.
//      *
//      * @var array<string, string>
//      */
//     protected $casts = [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed'
    //     ];

//     public function units()
//     {
    //         return $this->belongsToMany(Unit::class);
    //     }
    // }

    class Lecturer extends Model implements Authenticatable
    {
        use HasFactory;
        protected $table = 'Lecturers_DB2';

    // ...

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // ...
}
