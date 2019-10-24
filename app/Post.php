<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable =[

       ' user_id','category_id','tag_id' ,'view_count' ,'image' ,'title' ,'body' ,'slug' ,'status' ,'is_approved'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function tag(){

        return $this->belongsTo('App\Tag');
    }
}
