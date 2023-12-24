<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    // one of them is required

    //unchangable 
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // changeable 
    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    public function comments() {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
