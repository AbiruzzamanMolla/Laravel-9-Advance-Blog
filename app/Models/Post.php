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

    protected $appends = [
        'image_url'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        if (is_null($this->cover)) {
            return asset('backend/images/imgs/1.jpg');
        }

        return asset($this->cover);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($title){
        return $this->tags()->where('title', $title)->exists();
    }
}
