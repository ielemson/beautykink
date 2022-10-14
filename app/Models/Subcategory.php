<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'slug', 'category_id', 'status' ];

    /**
     * Category
    */
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    /**
     * Child Categories
    */
    public function childcategories()
    {
        return $this->hasMany(ChildCategory::class)->orderBy('id', 'desc')->whereStatus(1);
    }

    /**
     * Items / Products
    */
    public function items()
    {
        return $this->hasMany(Item::class)->where('status', 1);
    }
}
