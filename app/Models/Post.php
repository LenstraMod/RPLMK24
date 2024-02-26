<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        "title",
        "description",
        "image",
        "user_id",
        "album_id",
    ];

    public function albums(){
        return $this->belongsTo(Album::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class); 
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
