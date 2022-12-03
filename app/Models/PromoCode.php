<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'code_name', 'discount', 'status', 'no_of_times', 'no_of_times_per_user','type','shipping','start_date','end_date','product','category','customer_login'];
}
