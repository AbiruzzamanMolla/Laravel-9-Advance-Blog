<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($job) {
    //         $job->slug = Str::slug($job->title) . '-' . time() . '-' . uniqid();
    //     });
    // }
}
