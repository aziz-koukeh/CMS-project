<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table ='profile_users';
    protected $fillable = [

        'country', 'user_id', 'gender','bio', 'facebook', 'phone','photo'
      ];
    public function user()
        {
            return $this->belongsTo('App\User', 'user_id'); 
        }
}
