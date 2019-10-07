<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeOrganize($query){
       return $query->orderBy('id', 'desc')->paginate(9);

    }

    public function scopeSearch($query,$search){
       
        return $query->where('title', 'LIKE', '%'.$search.'%');
    }

    public function scopeCategory($query, $category){
        return $query->where('category', '=', $category);
    }

    public function scopeBoth($query, $search, $category){
        return $query->where('title', 'LIKE', '%'.$search.'%')->where('category', '=', $category);
    }
}
