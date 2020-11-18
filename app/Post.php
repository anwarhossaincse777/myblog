<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['created_at','updated_at'];

    protected $dates=['published_at'];


    //relationship

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }
 public function tag(){

        return $this->belongsToMany(Tag::class);

    }


}
