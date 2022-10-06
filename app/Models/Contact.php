<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class Contact extends Model
{
    use HasFactory;

    public $fillable = ['first_name', 'email', 'last_name', 'subject', 'message'];

    public static function boot()
    {

        parent::boot();

        static::created(function ($item) {

            $adminEmail = website()->site_contact_email;
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }

    protected $appends = [
        'fill_name'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }
}
