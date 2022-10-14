<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'slug', 'status', 'category_id', 'subcategory_id' ];

    /**
     * Category
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Subcategory
    */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Items / Products
    */
    public function items()
    {
        return $this->hasMany(Item::class, 'childcategory_id')->where('status', 1);
    }
}
