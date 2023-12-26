<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id', 
        'user_id',
        'trip_name',
        'no_of_tickets', 
        'seat_number',
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
  
  public function bus()
  {
      return $this->belongsTo(Bus::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
