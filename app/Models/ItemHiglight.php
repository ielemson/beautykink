<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemHiglight extends Model
{
    use HasFactory;
    protected $fillable = ['highlight_id','item_id'];
    protected $table = "highlight_item";
    
}
