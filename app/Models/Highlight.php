<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','status'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
