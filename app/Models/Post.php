<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = "id";
    protected $table = 'post';
    public $incrementing = true;

    protected $fillable = [
        'title',
        'body',
        'published',
        // 'author',
        "user_id"
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}