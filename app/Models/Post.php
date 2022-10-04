<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'body',
        'description',
        'status',
        'cover'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
