<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'firstname', 'lastname', 'contact', 'address', 'role_id',
    ];

    public function account() 
    {
        return $this->hasOne('App/Account', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('App/Role', 'role_id');
    }

    public function finance()
    {
        return $this->hasOne('App/Finance', 'finance_id');
    }

}
