<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function replies()
    {
        return $this->hasMany('App\ReplyComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
