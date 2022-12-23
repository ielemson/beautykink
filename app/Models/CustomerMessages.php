<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMessages extends Model
{
    use HasFactory;
    protected $fillable = ["customer_restock_message","customer_order_message"];
    protected $table = "customer_custom_messages";
}
