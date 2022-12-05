<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingService extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'status','zone_id','country_id'];

    public function zone()
    {
        return $this->belongsTo(GeoZone::class,'zone_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    // public function state()
    // {
    //     return $this->belongsTo(State::class,'state_id');
    // }
}
