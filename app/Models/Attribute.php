<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [ 'item_id', 'name', 'keyword','type'];

    /**
     * Options
    */
    public function options()
    {
        return $this->hasMany(AttributeOption::class, 'attribute_id', 'id');
    }
}
