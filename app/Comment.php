<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'user_id', 'post_id', 'parent_id','description'
    ];
    public function user()
        {
            return $this->belongsTo('App\User', 'user_id');
        }
    public function replies()
        {
            return $this->hasMany('App\comment' , 'parent_id');
        }
}
