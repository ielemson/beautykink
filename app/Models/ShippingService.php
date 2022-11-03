<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingService extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'price', 'status','country_id','state_id','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
}
