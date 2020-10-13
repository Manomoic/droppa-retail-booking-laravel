<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        "pickup_address", 
        "client_name", 
        "client_phone_number", 
        "pickup_date", 
        "pickup_time", 
        "number_of_labour", 
        "vehicle", 
        "dropoff_address", 
        "courier_name", 
        "courier_phone_number", 
        "comments", 
        "price"];
}
