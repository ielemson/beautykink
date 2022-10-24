<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockReminder extends Model
{
    use HasFactory;
    protected $fillable = ['email','prod_id'];
}
