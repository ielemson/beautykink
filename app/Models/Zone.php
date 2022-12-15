<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];
    protected $table = "zones";

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function states(){
        return $this->belongsToMany('state_id');
    }

}
