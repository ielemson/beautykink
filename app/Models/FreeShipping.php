<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeShipping extends Model
{
    use HasFactory;

    protected $fillable = ['reference_name', 'name','title','country_id','state_id','status','price','is_status'];
    
    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
}
