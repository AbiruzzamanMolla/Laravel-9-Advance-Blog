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

            $adminEmail = "your_admin_email@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
