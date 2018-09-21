<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author',
        'is_active',
        'email',
        'body',
        'post_id'
    ];
    
     public function posts(){
        return $this->belongsTo('App\Post');
    }
    
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }
}
