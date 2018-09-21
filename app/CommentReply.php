<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'author',
        'is_active',
        'email',
        'body',
        'comment_id'
    ];
    
    public function comments(){
        return $this->belongsTo('App\Comment');
    }
}
