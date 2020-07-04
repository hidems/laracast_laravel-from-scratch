<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // You need to add item in $fillable, which are updatable items in DB. No need to add 'created_at', 'updated_at'
    protected $fillable = ['title', 'excerpt', 'body'];
    // Or
    //protected $guarded = [];


    // Return path of article you are access now.
    public function path()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
