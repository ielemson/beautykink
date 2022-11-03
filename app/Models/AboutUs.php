<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'details','meta_keywords','meta_descriptions'];
    protected $table = 'about_us_page';
}
