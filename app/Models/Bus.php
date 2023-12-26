<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;


    protected $fillable = [
    // 'bus_number', 
    // 'departure_from', 
    // 'arrival_to',
     'date', 
     'time', 
     'duration',
     'seats',
     'price',
     'departure_location_id',
     'arrival_location_id'
    ];

     public function departureLocation()
     {
         return $this->belongsTo(Location::class, 'departure_location_id');
     }
 
     public function arrivalLocation()
     {
         return $this->belongsTo(Location::class, 'arrival_location_id');
     }

  
     public function trips()
     {
         return $this->hasMany(Trip::class);
     }


     
}
