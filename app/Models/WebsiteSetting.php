<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'site_subscribe_text',
        'site_contact_email',
        'site_image_bio',
        'site_short_bio',
        'site_long_bio',
        'site_social_link_facebook',
        'site_social_link_twitter',
        'site_social_link_instagram',
        'site_social_link_linkedin',
    ];

    protected $appends = [
        'image_url',
        'about_image_url'
    ];

    public function getImageUrlAttribute()
    {
        if (is_null($this->site_logo)) {
            return asset('backend/images/imgs/1.jpg');
        }

        return asset($this->site_logo);
    }

    public function getAboutImageUrlAttribute()
    {
        if (is_null($this->site_image_bio)) {
            return asset('backend/images/imgs/1.jpg');
        }

        return asset($this->site_image_bio);
    }
}
