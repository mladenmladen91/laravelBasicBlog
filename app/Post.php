<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
       'category_id',
        'image',
        'title',
        'body'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
