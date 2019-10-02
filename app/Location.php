<?php

//namespace App;

// use Illuminate\Database\Eloquent\Model;

// class Location extends Model
// {
//     //
// }

/*use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;*/
namespace App;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{

    protected $guard = 'location';

    protected $fillable = [
        'location_name', 'first_name', 'last_name', 'email', 'password', 'account_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
}

