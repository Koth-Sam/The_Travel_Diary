<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function comments()
        {
         return $this->hasMany(Comment::class);
        }

    public function user()
        {
            return $this->belongsTo(User::class);
        }

    public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }

    public function photos()
        {
         return $this->hasMany(Photo::class);
        }
}
