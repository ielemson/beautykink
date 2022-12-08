<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoZone extends Model
{
    use HasFactory;

    protected $fillable =['country_id','state_ids','shipping_status','status','shipping_cost','zone'];
    protected $table = "geozones";
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function zone_country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    
}
